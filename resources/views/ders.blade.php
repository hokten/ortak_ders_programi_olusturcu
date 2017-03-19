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
               <div class="tablobaslikhucresi">Dersin Kodu</div>
               <div class="tablobaslikhucresi">Dersin Kodu</div>
               <div class="tablobaslikhucresi">Dersin Saati</div>
               <div class="tablobaslikhucresi">Olay</div>
            </div>

         </div>
         <div id="2" class="tablogovdesi">
            <div class="tablosatiri">
               <div class="tablohucresi">BIL202</div>
               <div class="tablohucresi">İNTERNET PROGRAMCILIĞI-II</div>
               <div class="tablohucresi">4</div>
               <div class="tablohucresi">SİL</div>
            </div>
         </div>
         <div id="3" class="tablogovdesi">
            <div class="tablosatiri">
               <div class="tablohucresi">BIL202</div>
               <div class="tablohucresi">İNTERNET PROGRAMCILIĞI-II</div>
               <div class="tablohucresi">4</div>
               <div class="tablohucresi">SİL</div>
            </div>
         </div>

      </div>
   </body>
</html>
