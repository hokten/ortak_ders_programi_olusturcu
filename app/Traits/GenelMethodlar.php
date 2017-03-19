<?php
   namespace App\Traits;

   trait GenelMethodlar {
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



