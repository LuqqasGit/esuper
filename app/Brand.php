<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand_names';

    protected $fillable = [

    ];

    public $timestamps = false;

//    public function products()
//    {
//        return $this->hasMany('App\Product');
//    }
}