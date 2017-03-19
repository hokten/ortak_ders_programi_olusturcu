<?php

   namespace App;

   use Illuminate\Database\Eloquent\Model;

   class Ders extends Model
   {
      protected $fillable = ['derskodu','dersadi', 'derssaati'];
      public function sinif() {
         return $this->belongsTo('App\Sinif');
      }
      public function ogretmen() {
         return $this->belongsTo('App\Ogretmen');
      }
      public function aktiviteler()
      {
         return $this->hasMany('App\Aktivite');
      }
      public function derse_gore_bos_aktiviteler()
      {
         return $this->aktiviteler()->whereNull('gun_id')->whereNull('saat_id')->get();
      }

   }
