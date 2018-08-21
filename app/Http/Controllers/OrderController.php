<?php

namespace App\Http\Controllers;

use App\DeliveryMan;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Order;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    private $order;

    public function __construct()
    {
        $this->middleware('CheckUser');
        $this->order = new Order();
    }

    public function index()
    {
        $this->order = Order::all();
        return view('order.all_orders', ['orders' => $this->order]);
    }

    public function ajaxOrder()
    {
        $order = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.payment_id', '=', 'payments.id')
            ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
            ->select('orders.id', 'orders.status as order_status', 'customers.name', 'customers.mobile_number', 'payments.status as payment_status', 'shippings.city', 'shippings.address');
        return DataTables::of($order)->addColumn('action', function ($order) {
            return $order->id;
        })->make(true);
    }

    public function order_details($id)
    {
        $this->order = Order::find($id);
        return view('order.order_details', ['order' => $this->order]);
    }

    public function edit_order($id)
    {
        $this->order = Order::find($id);
        $delivery_man = DeliveryMan::all();
        return view('order.edit_order', ['order' => $this->order, 'delivery_man' => $delivery_man]);
    }

    public function update_order(Request $request, $id)
    {
        $this->order = Order::find($id);
        $this->order->status = $request->order_status;
        $this->order->delivery_man_id = $request->delivery_man;
        $payment = Payment::find($this->order->payment_id);
        $payment->status = $request->payment_status;
        $payment->save();
        $this->order->save();
        Session::put('message', 'Order updated successfully');
        return redirect(route('all_orders'));
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        if ($order->payment->status == "done" || $order->status == "done") {
            return redirect()->back()->with([
                'message' => 'Order have already completed. You cannot delete it.'
            ]);
        }
        $shipping = Shipping::find($order->shipping_id);
        $payments = Payment::find($order->payment_id);
        $details = $order->order_details;
        foreach ($details as $detail) {
            $product = Product::find($detail->product_id);
            $product->qty += $detail->qty;
            $product->save();
            $detail->delete();
        }
        $order->delete();
        $shipping->delete();
        $payments->delete();
        return redirect(route('all_orders'))->with(
            [
                'message' => 'Order Request Canceled Successfully'
            ]
        );
    }
}
