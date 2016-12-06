<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name_id', 'lat', 'lng', 'address'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function name()
    {
        return $this->hasOne('App\MarketName', 'id', 'name_id');
    }

}
