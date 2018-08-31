<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use Session;

class ShoppingCartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $qty = 0;
        $product = Product::find($request->product_id);
        foreach(Cart::content() as $cartItem){
            if($cartItem->id == $request->product_id){
                $qty = $cartItem->qty + $request->qty;
            }
            else{
                $qty = $request->qty;
            }
        }
        if(Cart::content()->count()<1){
            $qty =$request->qty;
        }
        if ($qty > $product->qty) {
            return redirect()->back()->with([
                'message' => 'Sorry We do not have that much product',
                'status' => 'danger'
            ]);
        }
        else{
            $qty = $request->qty;
        }
        $description = $request->order_description;
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['options']['image'] = $product->image;
        $data['options']['description'] = $description;
        Cart::add($data);
        Session::save();
        return redirect(route('shopping_cart'));
    }

    public function shopping_cart()
    {
        return view('cart.shopping_cart');
    }

    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return redirect(route('shopping_cart'));
    }

    public function update_cart(Request $request)
    {
        $product = Product::find($request->productId);
        $rowId = $request->rowId;
        $qty = $request->qty;
        if ($qty > $product->qty) {
            return redirect()->back()->with([
                'message' => 'Sorry We do not have that much product',
                'status' => 'danger'
            ]);
        }
        $data['options']['description'] = $request->order_description;
        $data['options']['image'] = $request->image;
        Cart::update($rowId, $qty);
        Cart::update($rowId, $data);
        return redirect(route('shopping_cart'));
    }
}
