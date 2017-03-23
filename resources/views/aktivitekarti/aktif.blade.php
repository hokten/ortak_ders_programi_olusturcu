<div class="aktivite" id="subject_{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->id}}-aktivite_{{$nesne->aktvt_sec($gun->id, $saat->id)->id}}">
   <!-- Aktivite kartı ön -->
   <div class="front {{$nesne->ders_rengi($nesne->aktvt_sec($gun->id, $saat->id)->ders->id)}}">
      <div class="derskodu">{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->derskodu}}</div>
      <div class="ogretmen">{{$nesne->aktvt_sec($gun->id, $saat->id)->ogretmen->adsoyadi}}</div>
      <div class="salon">
         <a href="#/">{{$nesne->aktvt_sec($gun->id, $saat->id)->salon_cek()['salonadi']}}</a>
         <select id="salon_secim_{{$nesne->aktvt_sec($gun->id, $saat->id)->id}}">
            @foreach ($salonlar as $salon)
               <option value="{{$salon->id}}">{{$salon->salonadi}}</option>
            @endforeach
         </select>
      </div>
   </div>

   <!-- Aktivite kartı arka -->
   <div class="back {{$nesne->ders_rengi($nesne->aktvt_sec($gun->id, $saat->id)->ders->id)}}">
      <div class="derskodu">{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->derskodu}}</div>
      <div class="dersadi">{{$nesne->aktvt_sec($gun->id, $saat->id)->ders->dersadi}}</div>
   </div>

</div>

