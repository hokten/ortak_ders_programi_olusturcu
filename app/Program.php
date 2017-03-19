<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  protected $fillable = ['program', 'bolum_id'];

  public function bolum()
  {
    return $this->belongsTo('App\Bolum');
  }
  public function siniflar()
  {
    return $this->hasMany('App\Sinif');
  }
}
