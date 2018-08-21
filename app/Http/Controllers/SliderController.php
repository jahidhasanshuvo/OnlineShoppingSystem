<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class SliderController extends Controller
{
    private $slider;
    public function __construct()
    {
        $this->middleware('CheckUser');
        $this->slider = new Slider();
    }

    public function index(){
       $sliders= $this->slider->orderBy('position')->paginate(5);
       return view('slider.all_sliders',['sliders' => $sliders]);
    }
    public function ajaxSlider(){
        $sliders= Slider::all();
        return DataTables::of($sliders)->addColumn('action', function ($slider) {
            return $slider->id;
        })->make(true);
    }

    public function addSlider(){
        return view('slider.add_slider');
    }
    public function saveSlider(Request $request){

        $this->slider->title=$request->title;
        $this->slider->description=$request->description;
        $this->slider->publication_status=$request->publication_status == null?0:1;
        $this->slider->position=$request->position ;

        $image=$request->file('image');
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path = 'slider/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_url);
        if($success){
            $this->slider->image=$image_url;
            $this->slider->save();
            Session::put('message','Slider saved with image');
            return redirect(route('add_slider'));
        }
        $this->slider->image='';
        $this->slider->save();
        Session::put('message','Slider saved without image');
        return redirect(route('add_slider'));
    }
    public  function  activeSlider($id){
        $this->slider = Slider::find($id);
        $this->slider->publication_status=1;
        $this->slider->save();
        Session::put('message','Slider activated successfully');
        return redirect(route('all_sliders'));
    }
    public  function  inactiveSlider($id){
        $this->slider = Slider::find($id);
        $this->slider->publication_status=0;
        $this->slider->save();
        Session::put('message','Slider inactivated successfully');
        return redirect(route('all_sliders'));
    }

    public function deleteSlider($id){
        $this->slider = Slider::find($id);
        $this->slider->delete();
        Session::put('message','Slider deleted successfully');
        return redirect(route('all_sliders'));
    }

    public function editSlider($id){
        $this->slider=Slider::find($id);
        return view('slider.edit_slider',['slider'=>$this->slider]);
    }
    public function updateSlider(Request $request,$id){
        $this->slider=Slider::find($id);
        $this->slider->title=$request->title;
        $this->slider->description=$request->description;
        $this->slider->position=$request->position;
        if($request->file('image')!= null){
            $image=$request->file('image');
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path = 'slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_url);
            if($success){
                $this->slider->image=$image_url;
                $this->slider->save();
                Session::put('message','Slider updated Successfully');
                return redirect(route('all_sliders'));
            }
            $this->slider->image='';
            $this->slider->save();
            Session::put('message','Slider updated Successfully without image');
            return redirect(route('all_sliders'));
        }
        else{
            $this->slider->save();
            Session::put('message','Slider updated Successfully');
            return redirect(route('all_sliders'));
        }

    }
}
