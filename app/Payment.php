<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
        'method','status','tID'
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }
}
