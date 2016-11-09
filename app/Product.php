<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name', 'price'];

  public function market()
  {
    return $this->belongsTo('App\Market');
  }
}
