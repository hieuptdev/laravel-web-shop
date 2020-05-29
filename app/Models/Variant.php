<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class variant extends Model
{
    protected $table='variant';
    public $timestamps =false;
    public function values()
    {
        return $this->belongsToMany('App\Models\Values', 'variant_values', 'variant_id', 'values_id');
    }

    
}

