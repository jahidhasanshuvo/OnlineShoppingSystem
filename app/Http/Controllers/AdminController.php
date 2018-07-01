<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function showDashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result=DB::table('tbl_admin')
            ->where('email','=',$email)
            ->where('password','=',$password)
            ->first();
        if($result){
            Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
            return redirect(route('dashboard'));

        }
        else{

            Session::put('message','Invalid email or password');
            return redirect(route('admin'));
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect(route('admin'));
    }
}
