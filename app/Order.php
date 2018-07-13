<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'customer_id','payment_id','shipping_id','total','status','delivery_man_id'
    ];
    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    public function delivery_man(){
        return $this->belongsTo(DeliveryMan::class);
    }
}
