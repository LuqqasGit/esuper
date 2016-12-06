<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'amount', 'market_id', 'brand_id', 'type_id', 'description'];

    protected $dates = ['deleted_at'];

    public function market()
    {
        return $this->belongsTo('App\Market');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function type()
    {
        return $this->belongsTo('App\Product_Types');
    }

    public function orders()
    {
      return $this->belongsToMany('App\Order', 'order_products', 'product_id', 'order_id');
    }
}
