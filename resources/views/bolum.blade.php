<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="_token" content="{!! csrf_token() !!}" />
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
      <script src="{{asset('js/bolum.js')}}"></script>

      <title>Laravel</title>
   </head>
   <body>
      <input type="text" id="frm_bolum" name="bolum" placeholder="Bölüm Ekle" />
      <select id="frm_baskan">
      @foreach ($baskanlar as $baskan)
      <option value="{{$baskan->id}}">{{$baskan->id}}</option>
      @endforeach
   </select>
      <input type="button" id="frm_ekle" value="EKLE">
   </form>
   @if (count($bolumler) > 0)
   <ul id="lst_bolumler">
      @foreach ($bolumler as $bolum)
      <li id="{{$bolum->id}}">{{$bolum->bolum}}<a href="#">SİL</a></li>
      @endforeach
      @endif

   </ul>
</body>
</html>
