<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'market_id', 'brand_id', 'type_id', 'description'];

    public function market()
    {
        return $this->belongsTo('App\Market');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\Product_Types');
    }
}
