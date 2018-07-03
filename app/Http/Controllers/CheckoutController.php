<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function login(){
        return view('checkout/login');
    }
    public function register_customer(Request $request){
        $customer =  new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=md5($request->password);
        $customer->mobile_number=$request->mobile_number;

        $customer->save();
        Session::put('customer_id',$customer->id);
        Session::put('customer_name',$customer->name);
        exit();
    }
    public function checkout(){
        return view('checkout/checkout');
    }
}
