<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    private $rules=[
        'name'=>'required',
        'email'=>'required|email|unique:customers'
    ];
    protected $fillable=[
        'name','email','mobile_number','password'
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
    public function order(){
        return $this->hasMany(Order::class);
    }
}
