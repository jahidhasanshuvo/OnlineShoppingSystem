<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    private $rules=[
        'name'=>'required',
        'password'=>'required',
        'phone'=>'required',
        'access_level'=>'required',
        'email'=>'required|email|unique:admins'
    ];
    protected $fillable=[
        'name','email','phone','password','access_level'
    ];

    protected $hidden=[
        'password'
    ];

    public function validate(){
        $v = \Validator::make($this->attributes,$this->rules);
        if($v->passes())
            return true;
        $this->errors=$v->messages();
        return false;
    }
}
