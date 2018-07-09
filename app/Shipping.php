<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=[
      'name','city','address','mobile_number'
    ];
    public function order(){
        return $this->hasOne(Order::class);
    }
}
