<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id'];

  protected $dates = ['deleted_at'];

  public function products()
  {
    return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('product_qty');
  }

}
