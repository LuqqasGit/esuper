<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
  protected $fillable = ['name_id', 'latitude', 'longitude', 'address'];

  public function products()
  {
    return $this->hasMany('App\Product');
  }
}
