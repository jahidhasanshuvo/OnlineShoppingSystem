<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function product(){
        return $this->hasOne(Product::class);
    }
    public function order(){
        return $this->hasOne(Order::class);
    }
}
