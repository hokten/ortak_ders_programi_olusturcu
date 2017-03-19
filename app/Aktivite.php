<?php

   namespace App;

   use Illuminate\Database\Eloquent\Model;

   class Aktivite extends Model
   {
      protected $fillable = ['gun_id', 'saat_id', 'salon_id', 'sinif_id', 'ogretmen_id', 'ders_id'];
      public function gun() {
         return $this->belongsTo('App\Gun');
      }
      public function saat() {
         return $this->belongsTo('App\Saat');
      }
      public function salon() {
         return $this->belongsTo('App\Salon');
      }
      public function sinif() {
         return $this->belongsTo('App\Sinif');
      }
      public function ogretmen() {
         return $this->belongsTo('App\Ogretmen');
      }
      public function ders() {
         return $this->belongsTo('App\Ders');
      }
      public function butun_aktiviteler() {
         return Aktivite::all();
      }
      public function salon_cek() {
         $salon_id = 0;
         $salon_adi = "SEÇ";
         if(!is_null($this->salon_id)) {
            $salon_id = $this->salon->id;
            $salon_adi = $this->salon->salonadi;

         }
         return array('salonid' => $salon_id, 'salonadi' => $salon_adi);
      }
         
      
   }
