<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function login()
    {
        if (Session::get('customer_id')) {
            return view('checkout.checkout');
        } else {
            return view('checkout.login');
        }
    }

    public function customer_login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = Customer::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('customer_id', $result->id);
            Session::put('customer_name', $result->name);
            return redirect()->back();
        } else {
            Session::put('message', 'Invalid Username or Password');
            return redirect(route('login'));
        }
        return redirect(route('checkout'));
    }

    public function customer_logout()
    {
        Session::put('customer_id', null);
        Session::put('customer_name', null);
        return redirect(route('home'));
    }


    public function register_customer(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = md5($request->password);
        $customer->mobile_number = $request->mobile_number;

        $customer->save();
        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);
        return redirect(route('checkout'));
    }

    public function checkout()
    {
        if (Session::get('customer_id')) {
            return view('checkout.checkout');
        } else {
            return redirect(route('login'));
        }

    }

    public function save_shipping_details(Request $request)
    {
        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->city = $request->city;
        $shipping->address = $request->address;
        $shipping->mobile_number = $request->mobile_number;
        $shipping->save();
        $payment = new Payment();
        $payment->method = $request->payment_method;
        $payment->status = 'pending';
        $payment->tID = $request->tID ? $request->tID : 0;
        $payment->save();
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->payment_id = $payment->id;
        $order->shipping_id = $shipping->id;
        $total = floatval(str_replace('.', ',', str_replace(',', '', Cart::total())));
        $order->total = floatval($total);
        $order->status = 'pending';
        $order->save();
        foreach (Cart::content() as $content) {
            $order_details = new OrderDetail();
            $order_details->order_id = $order->id;
            $order_details->product_id = $content->id;
            $order_details->qty = $content->qty;
            $order_details->description = $content->options->description ? $content->options->description : "";
            $subtotal = floatval(str_replace('.', ',', str_replace(',', '', $content->total())));
            $order_details->subtotal = floatval($subtotal);
            $order_details->save();
        }
        Cart::destroy();
        return redirect(route('home'));
    }
}
