<div class="tablosatiri">
   <div class="tablohucresi">
      <div id="gun_{{$gun->id}}" class="gun">{{$gun->gun}}</div>
   </div>
   @foreach ($saatler as $saat)
      <div class="tablohucresi">
         <div id="ders_{{$gun->id}}_{{$saat->id}}" class="ders">
            @if ($nesne->aktvt_sayisi($gun->id, $saat->id) > 0)
               @if (Auth::user()->bolum->id == $nesne->aktvt_sec($gun->id, $saat->id)->ders->sinif->program->bolum->id)
                  @include('aktivitekarti.aktif', ['nesne' => $nesne, 'salonlar'=>$salonlar, 'gun'=>$gun, 'saat'=>$saat])
               @else
                  @include('aktivitekarti.pasif', ['nesne' => $nesne, 'salonlar'=>$salonlar, 'gun'=>$gun, 'saat'=>$saat])
               @endif
            @endif
         </div>
      </div>
   @endforeach
</div>



