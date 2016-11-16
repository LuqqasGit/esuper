<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketName extends Model
{
  protected $table = 'market_names';

  protected $fillable = ['name'];

  public $timestamps = false;

  public function market()
  {
    return $this->hasMany('App\Market', 'name_id');
  }
}
