<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
  protected $fillable = ['gun'];
  public function aktiviteler() {
    return $this->hasMany('App\Aktivite');
  }
}
