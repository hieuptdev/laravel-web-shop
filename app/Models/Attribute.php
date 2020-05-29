<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = "attribute";
    public $timestamps = false;
    public function values()
    {
        return $this->hasMany('App\Models\Values', 'attr_id', 'id');
    }
}
