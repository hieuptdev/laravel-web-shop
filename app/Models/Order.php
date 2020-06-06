<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="order";
    public $timestamps=false;

   public function attr()
   {
       return $this->hasMany('App\Models\attr', 'order_id', 'id');
   }
}
