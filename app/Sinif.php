<?php

   namespace App;

   use Illuminate\Database\Eloquent\Model;

   class Sinif extends Model
   {
      protected $fillable = ['sinif','ogretim', 'program_id'];
      public function program() {
         return $this->belongsTo('App\Program');
      }
      public function dersler()
      {
         return $this->hasMany('App\Ders');
      }
      public function aktiviteler()
      {
         return $this->hasMany('App\Aktivite');
      }
      public function aktvt_sayisi($gun, $saat)
      {
         return $this->aktiviteler()->where([['gun_id','=',$gun], ['saat_id', '=', $saat]])->count();
      }
      public function aktvt_sec($gun, $saat)
      {
         return $this->aktiviteler()->where([['gun_id','=',$gun], ['saat_id', '=', $saat]])->first();
      }
      public function ders_rengi($ders_id)
      {
         $i=1;
         $ders_renk_dizisi = array();
         foreach($this->dersler as $ders) {
            $ders_renk_dizisi[$ders->id] = "dersrenk".$i;
            $i++;
         }
         return $ders_renk_dizisi[$ders_id];
      }





   }
