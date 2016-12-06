<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'market_id', 'brand_id', 'type_id', 'description'];

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
}
