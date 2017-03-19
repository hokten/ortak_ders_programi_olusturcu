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
         <table border="0">
            <tr>
               <td>Program</td>
               <td>:</td>
               <td><input type="text" id="frm_program" name="frm_program" /></td>
            </tr>
            <tr>
               <td>Bölüm</td>
               <td>:</td>
               <td>
                  <select id="frm_bolum" name="frm_bolum">
                     @foreach ($bolumler as $blm)
                     <option  value="{{$blm->id}}">{{$blm->bolum}}</option>
                     @endforeach
                  </select>
               </td>
            </tr>
            <tr>
               <td colspan="3"><input id="frm_ekle" type="button" value="EKLE"></td>
            </tr>
         </table>
      @if (count($bolumler) > 0)
      <ul id="lst_bolumler">
         @foreach ($bolumler as $bolum)
         <li id="bolum_{{$bolum->id}}">{{$bolum->bolum}}
         @if (count($bolum->programlar))
         <ul class="lst_programlar">
            @foreach ($bolum->programlar as $program)
            <li id="program_{{$program->id}}">{{$program->program}}<a href="#">SİL</a></li>
            @endforeach
         </ul>
         @endif
      </li>
      @endforeach
      @endif
   </ul>
</body>
</html>
