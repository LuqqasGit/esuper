<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{

  protected $fillable = ['name_id', 'lat', 'lng', 'address'];

  public function products()
  {
    return $this->hasMany('App\Product');
  }

  public function name()
    {
      return $this->belongsTo('App\MarketName','id');
    }

}
