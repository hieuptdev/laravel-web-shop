<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function values()
    {
        return $this->belongsToMany('App\Models\Values', 'values_product', 'product_id', 'values_id');
    }

    public function variant()
    {
        return $this->hasMany('App\Models\Variant', 'product_id', 'id');
    }
}
