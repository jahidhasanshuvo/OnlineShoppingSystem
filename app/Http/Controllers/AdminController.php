<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function error(){
        return view('admin.error');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('admins')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();
        if ($result) {
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id);
            Session::put('access_level', $result->access_level);
            return redirect(route('dashboard'));

        } else {

            Session::put('message', 'Invalid email or password');
            return redirect(route('admin'));
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect(route('admin'));
    }

    public function add_admin()
    {
        return view('admin.add_admin');
    }

    public function save_admin(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->access_level = $request->access_level;
        $admin->password = md5($request->password);
        if (!$admin->validate()) {
            Session::put('errors', $admin->errors);
            return redirect(route('add_admin'));
        } else {
            $admin->save();
            Session::put('message', 'New Admin Saved');
            return redirect(route('add_admin'));
        }
    }

    public function all_admin()
    {
        $admins = Admin::paginate(8);
        return view('admin.all_admins',['admins'=>$admins]);
    }
    public function delete_admin($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        Session::put('message','Admin Deleted Successfully');
        return view('admin.all_admins');
    }

}
