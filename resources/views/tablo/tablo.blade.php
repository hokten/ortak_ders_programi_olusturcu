<div class="tablo">
   <div class="tablogovdesi">
      <div class="tablosatiri"><!-- Saatler için tablo başlık satırı başlangıç -->
         <div class="tablohucresi"></div>
         @each('tablo.saatler', $saatler, 'saat')
      </div><!-- Saatler için tablo başlık satırı son -->
      @foreach ($gunler as $gun)
         @include('tablo.satiri', ['gun'=>$gun, 'saatler'=>$saatler, 'nesne' => $nesne, 'salonlar'=>$salonlar])
      @endforeach
   </div>
</div>

