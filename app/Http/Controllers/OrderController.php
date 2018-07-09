<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('order.all_orders',['orders'=>$this->order]);
    }

    public function order_details($id){
        $this->order = Order::find($id);
        return view('order.order_details',['order'=>$this->order]);
    }
    public function edit_order($id){
        $this->order = Order::find($id);
        return view('order.edit_order',['order'=>$this->order]);
    }
    public function update_order(Request $request,$id){
        $this->order = Order::find($id);
        $this->order->status = $request->order_status;
        $payment = Payment::find($this->order->payment_id);
        $payment->status = $request->payment_status;
        $payment->save();
        $this->order->save();
        Session::put('message','Order updated successfully');
        return redirect(route('all_orders'));
    }
}
