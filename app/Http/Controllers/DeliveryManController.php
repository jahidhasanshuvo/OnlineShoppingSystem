<?php

namespace App\Http\Controllers;

use App\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class DeliveryManController extends Controller
{
    private $delivery_man;
    public function __construct()
    {
        $this->middleware('CheckUser');
        $this->delivery_man =new DeliveryMan();
    }


    public function index(){
        return view('delivery_man.all_delivery_men');
    }
    public function ajax_delivery_man(){
        $this->delivery_man = DeliveryMan::all();
        return DataTables::of($this->delivery_man)->addColumn('action', function ($delivery_man) {
            return $delivery_man->id;
        })->make(true);
    }


    public function add_delivery_man(){
        return view('delivery_man.add_delivery_man');
    }
    public function save_delivery_man(Request $request){

        $this->delivery_man->name=$request->name;
        $this->delivery_man->mobile=$request->mobile;
        $this->delivery_man->zone=$request->zone;

        $image=$request->file('image');
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path = 'delivery_man/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_url);
        if($success){
            $this->delivery_man->image=$image_url;
            $this->delivery_man->save();
            Session::put('message','Delivery Man saved with image');
            return redirect(route('add_delivery_man'));
        }
        $this->delivery_man->image='';
        $this->delivery_man->save();
        Session::put('message','Delivery Man saved without image');
        return redirect(route('add_delivery_man'));
    }

    public function delete_delivery_man($id){
        $this->delivery_man = DeliveryMan::find($id);
        $this->delivery_man->delete();
        Session::put('message','Delivery Man deleted successfully');
        return redirect(route('all_delivery_men'));
    }

    public function edit_delivery_man($id){
        $this->delivery_man=DeliveryMan::find($id);
        return view('delivery_man.edit_delivery_man',['delivery_man'=>$this->delivery_man]);
    }

    public function update_delivery_man(Request $request,$id){
        $this->delivery_man = DeliveryMan::find($id);
        $this->delivery_man->name=$request->name;
        $this->delivery_man->mobile=$request->mobile;
        $this->delivery_man->zone=$request->zone;
        if($request->file('image')!= null){
            $image=$request->file('image');
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path = 'delivery_man/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_url);
            if($success){
                $this->delivery_man->image=$image_url;
                $this->delivery_man->save();
                Session::put('message','Delivery Man updated with image');
                return redirect(route('all_delivery_men'));
            }
            $this->delivery_man->image='';
            $this->delivery_man->save();
            Session::put('message','Delivery Man updated with image');
            return redirect(route('all_delivery_men'));
        }
        else{
            $this->delivery_man->save();
            Session::put('message','Delivery Man updated with image');
            return redirect(route('all_delivery_men'));
        }

    }

}

/*
<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;



class SliderController extends Controller
{
    private $slider;
    public function __construct()
    {
        $this->slider = new Slider();
    }

    public function index(){
       $sliders= $this->slider::all();
       return view('slider.all_sliders',['sliders' => $sliders]);
    }



    public  function  inactiveSlider($id){
        $this->slider = Slider::find($id);
        $this->slider->publication_status=0;
        $this->slider->save();
        Session::put('message','Slider inactivated successfully');
        return redirect(route('all_sliders'));
    }





}