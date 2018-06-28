<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id'); //get parent category
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');// get child category
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
