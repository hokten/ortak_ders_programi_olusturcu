<?php
   use App\Aktivite;

   namespace App;

   use Illuminate\Database\Eloquent\Model;

   class Salon extends Model
   {
      protected $fillable = ['salonadi'];
      public function aktiviteler() {
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
         $tum_dersler = $this->ayrik();
         foreach($tum_dersler as $ders) {
            $ders_renk_dizisi[$ders->id] = "dersrenk".$i;
            $i++;
         }
         return $ders_renk_dizisi[$ders_id];
      }

      public function ayrik() {
         $c = collect();
         $aktiviteler = $this->aktiviteler()->distinct()->get(['ders_id']);
         foreach($aktiviteler as $aktivite) {
            $c->push(Ders::find($aktivite->ders_id));
         }
         return $c;

         /*
         $c = collect();
         $aktiviteler =  Aktivite::distinct()->where('salon_id',2)->get(['ders_id']);
         foreach($aktiviteler as $aktivite) {
            $c->push(Ders::find($aktivite->ders_id));
         }
         return $c;
         */
      }

   }
