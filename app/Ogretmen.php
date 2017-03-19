<?php

   namespace App;

   use Illuminate\Database\Eloquent\Model;
   use App\Traits\GenelMethodlar;

   class Ogretmen extends Model
   {
      use GenelMethodlar;
      protected $fillable = ['unvani','adsoyadi', 'bolum_id'];
      public function bolum() {
         return $this->belongsToMany('App\Bolum');
      }
      public function dersler() {
         return $this->hasMany('App\Ders');
      }
      public function aktiviteler() {
         return $this->hasMany('App\Aktivite');
      }
      
      public function ogrt_aktvt_mstlk_dntl($gun, $saat)
      {
         return $this->aktiviteler()->where([['gun_id','=',$gun], ['saat_id', '=', $saat]])->count();
      }
   }
