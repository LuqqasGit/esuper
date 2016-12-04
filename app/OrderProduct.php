<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  protected $table = 'order_products';
  
  protected $fillable = ['order_id', 'product_id', 'product_qty'];

  public $timestamps = false;

  public function orders()
  {
      return $this->belongsToMany('App\Order');
  }
}
