<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketName extends Model
{
  protected $table = 'market_names';

  protected $fillable = ['name'];

  public $timestamps = false;

  public function markets()
  {
    return $this->belongsToMany('App\Market', 'name_id');
  }
}
