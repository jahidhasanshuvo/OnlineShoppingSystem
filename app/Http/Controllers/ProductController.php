<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function allProducts(){
        $this->product = Product::all();
        return view('product.all_product',['products'=>$this->product]);
    }

    public function addProduct(){
        $categories=Category::all()->where('category_id','!=',null);
        return view('product.add_product',['categories'=>$categories]);
    }

    public function saveProduct(Request $request){

        $this->product->name=$request->name;
        $this->product->long_description=$request->long_description;
        $this->product->short_description=$request->short_description;
        $this->product->category_id=$request->category_id;
        $this->product->price=$request->price;
        $this->product->size=$request->size;
        $this->product->color=$request->color;
        $this->product->color=$request->color;
        $this->product->publication_status=$request->publication_status == null?0:1;

        $image=$request->file('image');
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path = 'image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_url);
        if($success){
            $this->product->image=$image_url;
            $this->product->save();
            Session::put('message','Product saved with image');
            return redirect(route('add_products'));
        }
        $this->product->image='';
        $this->product->save();
        Session::put('message','Product saved without image');
        return redirect(route('add_products'));
    }
    public  function  activeProduct($product_id){
        $this->product = Product::find($product_id);
        $this->product->publication_status=1;
        $this->product->save();
        Session::put('message','Product activated successfully');
        return redirect(route('all_products'));
    }
    public  function  inactiveProduct($product_id){
        $this->product = Product::find($product_id);
        $this->product->publication_status=0;
        $this->product->save();
        Session::put('message','Product inactivated successfully');
        return redirect(route('all_products'));
    }

    public function deleteProduct($product_id){
        $this->product = Product::find($product_id);
        $this->product->delete();
        Session::put('message','Product deleted successfully');
        return redirect(route('all_products'));
    }
    public function editProduct($product_id){
        $categories=Category::all()->where('category_id','!=',null);
        $this->product=Product::find($product_id);
        return view('product.edit_product',['product'=>$this->product,'categories'=>$categories]);
    }
    public function updateProduct(Request $request,$product_id){
        $this->product=Product::find($product_id);
        $this->product->name=$request->name;
        $this->product->long_description=$request->long_description;
        $this->product->short_description=$request->short_description;
        $this->product->category_id=$request->category_id;
        $this->product->price=$request->price;
        $this->product->size=$request->size;
        $this->product->color=$request->color;
        if($request->file('image')!= null){
            $image=$request->file('image');
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_url);
            if($success){
                $this->product->image=$image_url;
                $this->product->save();
                Session::put('message','Product updated Successfully');
                return redirect(route('all_products'));
            }
            $this->product->image='';
            $this->product->save();
            Session::put('message','Product updated Successfully without image');
            return redirect(route('all_products'));
        }
        else{
            $this->product->save();
            Session::put('message','Product updated Successfully');
            return redirect(route('all_products'));
        }

    }

    public function productDetails($id){
        $this->product = Product::find($id);
        return view('product.product_details',['product'=>$this->product]);
    }

}
