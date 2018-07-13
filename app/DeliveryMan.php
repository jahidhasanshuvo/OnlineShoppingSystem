<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    protected $fillable=[
      'name','mobile','zone','image'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
