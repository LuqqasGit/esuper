<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
  protected $fillable = [];

  public function genero()
  {
    return $this->belongsTo('App\Genero', 'id_genero');
  }

  public function actores()
  {
    return $this->belongsToMany('App\Actor', 'actor_pelicula', 'id_pelicula', 'id_actor');
  }
}
