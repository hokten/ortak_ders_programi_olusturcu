<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="_token" content="{!! csrf_token() !!}" />
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
      <script src="{{asset('js/program.js')}}"></script>

      <title>Laravel</title>
   </head>
   <body>
      <div class="tablo">
         <div class="tablobasligi">
            <div class="tablosatiri">
               <div class="tablobaslikhucresi">Bölüm</div>
               <div class="tablobaslikhucresi">Program</div>
               <div class="tablobaslikhucresi">Sinif</div>
               <div class="tablobaslikhucresi">Öğretim</div>
               <div class="tablobaslikhucresi">Olay</div>
            </div>
         </div>
         @foreach ($bolumler as $bolum)
         @foreach ($bolum->programlar as $program)
         <div id="program_{{$program->id}}" class="tablogovdesi">
            @foreach ($program->siniflar as $sinif)
            <div class="tablosatiri">
               <div class="tablohucresi">{{$bolum->bolum}}</div>
               <div class="tablohucresi">{{$program->program}}</div>
               <div class="tablohucresi">{{$sinif->sinif}}</div>
               <div class="tablohucresi">{{$sinif->ogretim}}</div>
               <div class="tablohucresi"><a href="sinif/{{$sinif->id}}">DERS EKLE</a></div>
            </div>
            @endforeach
         </div>
         @endforeach
         @endforeach
      </body>
   </html>
