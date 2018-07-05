<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function shipping(){
        return $this->hasOne(Shipping::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function customer(){
        return $this->hasOne(Customer::class);
    }
    public function order_details(){
        return $this->belongsToMany(OrderDetail::class);
    }
}
