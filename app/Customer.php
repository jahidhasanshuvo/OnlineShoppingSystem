<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'name','email','mobile_number','password'
    ];

    protected $hidden=[
        'password'
    ];
    public function order(){
        return $this->belongsToMany(Order::class);
    }
}
