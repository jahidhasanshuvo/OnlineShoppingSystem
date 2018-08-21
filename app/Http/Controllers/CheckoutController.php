<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
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
            return redirect(url(Session::get('url')));
        } else {
            Session::put('message', 'Invalid Username or Password');
            return redirect(route('login'));
        }
        return redirect(url(Session::get('url')));
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
        if (!$customer->validate()) {
            Session::put('errors', $customer->errors);
            //Session::put('errors',null);
            return redirect(route('login'));
        } else {
            $customer->save();
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->name);
            return redirect(route('login'));
        }
    }

    public function checkout()
    {
        if (Cart::content()->count() < 1) {
            return redirect(route('shopping_cart'));
        }
        return view('checkout.checkout');
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
            $product = Product::find($content->id);
            $product->qty = $product->qty - $content->qty;
            $product->save();
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
        return redirect(route('delivery_man'));
    }

    public function delivery_man()
    {
        $customer = Customer::find(Session::get('customer_id'));
        $order = $customer->order->sortByDesc('id')->first();
        if ($order) {
            $delivery_man = $order->delivery_man;
        } else {
            $delivery_man = "No Order";
        }
        return view('home.delivery_man', ['delivery_man' => $delivery_man]);
    }
}
