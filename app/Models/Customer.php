<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = "customer";

   public function order()
   {
      return $this->hasMany('App\Models\Order', 'customer_id', 'id');
   }
}
