<div class="baskabolum"><!-- Başka bölüm için aktivite kartı başlangıç -->
   <div class="front"><!-- Başka bölüm için aktivite kartı ön -->
      <div class="derskodu">{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->derskodu}}</div>
      <div class="ogretmen">{{$nesne->aktvt_sec($gun->id, $saat->id)->ogretmen->adsoyadi}}</div>
      <div class="salon">
         <a href="#/">{{$nesne->aktvt_sec($gun->id, $saat->id)->salon_cek()['salonadi']}}</a>
      </div>
   </div>
   <div class="back"><!-- Aktivite kartı arka -->
      <div class="derskodu">{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->derskodu}}</div>
      <div class="dersadi">{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->dersadi}}</div>
   </div>
</div><!-- Başka bölüm için aktivite kartı sonu -->

