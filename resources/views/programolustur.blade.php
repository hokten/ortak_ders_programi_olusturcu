<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="_token" content="{!! csrf_token() !!}" />
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link href="{{asset('css/renksema.css')}}" rel="stylesheet">
      <link href="{{asset('css/dragula.min.css')}}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js" type="text/javascript"></script>
      <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
      <script type="text/javascript" src="{{asset('js/noty/packaged/jquery.noty.packaged.min.js')}}"></script>
      <script src="{{asset('js/program.js')}}"></script>
      <script src="{{asset('js/flip.js')}}"></script>

      <title>Laravel</title>
   </head>
   <body>
      <div class="tablo">
         <div class="tablogovdesi">
            <div class="tablosatiri">
               <div class="tablohucresi"></div>
               @foreach ($saatler as $saat)
               <div class="tablohucresi"><div id="saat_{{$saat->id}}" class="saat">{{$saat->saat}}</div></div>
               @endforeach
            </div>
            @foreach ($gunler as $gun)
            <div class="tablosatiri">
               <div class="tablohucresi"><div id="gun_{{$gun->id}}" class="gun">{{$gun->gun}}</div></div>
               @foreach ($saatler as $saat)
               <div class="tablohucresi">
                  <div id="ders_{{$gun->id}}_{{$saat->id}}" class="ders">
                     @if ($sinif->aktvt_sayisi($gun->id, $saat->id) > 0)
                     <!-- Aktivite kartı başı -->
                     <div class="aktivite" id="subject_{{$sinif->aktvt_sec($gun->id, $saat->id)->ders->id}}-aktivite_{{$sinif->aktvt_sec($gun->id, $saat->id)->id}}">
                        <!-- Aktivite kartı ön -->
                        <div class="front {{$sinif->ders_rengi($sinif->aktvt_sec($gun->id, $saat->id)->ders->id)}}">
                           <div class="derskodu">{{$sinif->aktvt_sec($gun->id, $saat->id)->ders->derskodu}}</div>
                           <div class="ogretmen">{{$sinif->aktvt_sec($gun->id, $saat->id)->ogretmen->adsoyadi}}</div>
                           <div class="salon">
                              <a href="#/">{{$sinif->aktvt_sec($gun->id, $saat->id)->salon_cek()['salonadi']}}</a>
                              <select id="salon_secim_{{$sinif->aktvt_sec($gun->id, $saat->id)->id}}">
                                 @foreach ($salonlar as $salon)
                                 <option value="{{$salon->id}}">{{$salon->salonadi}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <!-- Aktivite kartı arka -->
                        <div class="back {{$sinif->ders_rengi($sinif->aktvt_sec($gun->id, $saat->id)->ders->id)}}">
                           <div class="derskodu">{{$sinif->aktvt_sec($gun->id, $saat->id)->ders->derskodu}}</div>
                           <div class="dersadi">{{$sinif->aktvt_sec($gun->id, $saat->id)->ders->dersadi}}</div>
                        </div>
                     </div>
                     <!-- Aktivite kartı sonu -->
                     @endif
                  </div>
               </div>
               @endforeach
            </div>
            @endforeach
         </div>
      </div>
      <div class="bostadersler">
         @foreach ($sinif->dersler as $ders)
         <ul class="bostaderslerlistesi" id="subject_{{$ders->id}}">
            @foreach ($ders->aktiviteler as $aktivite)
            <li class="avt_container">
            @if (is_null($aktivite->gun_id) && is_null($aktivite->saat_id))
            <div class="aktivite" id="subject_{{$ders->id}}-aktivite_{{$aktivite->id}}">
               <div class="front {{$sinif->ders_rengi($ders->id)}}">
                  <div class="derskodu">{{$ders->derskodu}}</div>
                  <div class="ogretmen">{{$ders->ogretmen->adsoyadi}}</div>
                  <div class="salon">
                     <a href="#/">{{$aktivite->salon_cek()['salonadi']}}</a>
                     <select id="salon_secim_{{$aktivite->id}}">
                        @foreach ($salonlar as $salon)
                        <option value="{{$salon->id}}">{{$salon->salonadi}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="back {{$sinif->ders_rengi($ders->id)}}">
                  <div class="derskodu">{{$ders->derskodu}}</div>
                  <div class="dersadi">{{$ders->dersadi}}</div>
               </div>
            </div>
            @endif
            </li>
            @endforeach
         </ul>
         @endforeach
      </div>
   </body>
</html>
