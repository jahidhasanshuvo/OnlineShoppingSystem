<?php

namespace App\Http\Controllers;
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
            ->join('payments','orders.payment_id','=','payments.id')
            ->join('shippings','orders.shipping_id','=','shippings.id')
            ->select('orders.id', 'orders.status as order_status', 'customers.name','customers.mobile_number','payments.status as payment_status','shippings.city','shippings.address');
        return DataTables::of($order)->addColumn('action', function ($order) {
            return $order->id;
        })->make(true);

       /* return DataTables::eloquent($order)->addColumn('customer_name',function ($order) {
            return ['customer_name'=>$order->customer->name];
        })->addColumn('mobile_number',function ($order) {
            return $order->customer->mobile_number;
        })->addColumn('payment_status',function ($order) {
            return $order->payment->status;
        })->addColumn('city',function ($order) {
            return $order->shipping->city;
        })->addColumn('address',function ($order) {
            return [$order->shipping->address];
        })->addColumn('action', function ($order) {
            return $order->id;
        })->make(true); */
    }

    public function order_details($id)
    {
        $this->order = Order::find($id);
        return view('order.order_details', ['order' => $this->order]);
    }

    public function edit_order($id)
    {
        $this->order = Order::find($id);
        return view('order.edit_order', ['order' => $this->order]);
    }

    public function update_order(Request $request, $id)
    {
        $this->order = Order::find($id);
        $this->order->status = $request->order_status;
        $payment = Payment::find($this->order->payment_id);
        $payment->status = $request->payment_status;
        $payment->save();
        $this->order->save();
        Session::put('message', 'Order updated successfully');
        return redirect(route('all_orders'));
    }
}
