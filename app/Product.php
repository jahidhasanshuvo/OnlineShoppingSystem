<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name','category_id','short_description','long_description',
        'price','qty','image','image1','size','color','publication_status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
