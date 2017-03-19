<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saat extends Model
{
  protected $fillable = ['saat'];
  public function aktiviteler() {
    return $this->hasMany('App\Aktivite');
  }
}
