<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="_token" content="{!! csrf_token() !!}" />
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
      <script src="{{asset('js/sinif.js')}}"></script>

      <title>Laravel</title>
   </head>
   <body>
      <input type="hidden" id="frm_sinif" value="{{$sinif->id}}" />
      <div class="tablo">
         <div class="tablobasligi">
            <div class="tablosatiri">
               <div class="tablobaslikhucresi">Ders Kodu</div>
               <div class="tablobaslikhucresi">Ders Adı</div>
               <div class="tablobaslikhucresi">Öğretmen</div>
               <div class="tablobaslikhucresi">Ders Saati</div>
               <div class="tablobaslikhucresi">Program</div>
               <div class="tablobaslikhucresi">Sinif</div>
               <div class="tablobaslikhucresi">Öğretim</div>
               <div class="tablobaslikhucresi">Olay</div>
            </div>
         </div>
         <div id="tumdersler" class="tablogovdesi">
            @foreach ($sinif->dersler as $ders)
            <div class="tablosatiri">
               <div class="tablohucresi">{{$ders->derskodu}}</div>
               <div class="tablohucresi">{{$ders->dersadi}}</div>
               <div class="tablohucresi">{{$ders->ogretmen->adsoyadi}}</div>
               <div class="tablohucresi">{{$ders->derssaati}}</div>
               <div class="tablohucresi">{{$ders->sinif->program->program}}</div>
               <div class="tablohucresi">{{$ders->sinif->sinif}}</div>
               <div class="tablohucresi">{{$ders->sinif->ogretim}}</div>
               <div class="tablohucresi" id="ders_{{$ders->id}}"><input type="button" class="frm_sil" value="SİL" /></div>
            </div>
            @endforeach
         </div>
         <!-- Ders ekleme satiri baslangici -->
         <div id="derseklemeformu" class="tablosatiri">
            <div class="tablohucresi"><input type="text" id="frm_derskodu" /></div>
            <div class="tablohucresi"><input type="text" id="frm_dersadi" /></div>
            <div class="tablohucresi">
               <select id="frm_ogretmen">
                  @foreach ($sinif->program->bolum->ogretmenler as $ogretmen)
                  <option value="ogretmen_{{$ogretmen->id}}">{{$ogretmen->adsoyadi}}</option>
                  @endforeach
               </select>                  
            </div>
            <div class="tablohucresi"><input type="text" id="frm_derssaati" /></div>
            <div class="tablohucresi">{{$sinif->program->program}}</div>
            <div class="tablohucresi">{{$sinif->sinif}}</div>
            <div class="tablohucresi">{{$sinif->ogretim}}</div>
            <div class="tablohucresi"><input type="button" id="frm_ekle" value="EKLE" /></div>
         </div>
      </div>
   </body>
</html>
