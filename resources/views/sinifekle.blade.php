<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
<form action="/programekle" method="post" enctype="application/x-www-form-urlencoded">
<table border="0">
<tr>
  <td>Sınıf</td>
  <td>:</td>
  <td>
    <select name="frm_sinif">
      <option value="1">Birinci Sınıf</option>
      <option value="2">İkinci Sınıf</option>
    </select>
  </td>
</tr>
<tr>
  <td>Öğretim</td>
  <td>:</td>
  <td>
    <select name="frm_ogretim">
      <option value="1">Birinci Öğretim</option>
      <option value="2">İkinci Öğretim</option>
    </select>
  </td>
</tr>

<tr>
  <td>Bölüm</td>
  <td>:</td>
  <td>
    <select name="frm_bolum">
      @foreach ($bolumler as $blm)
        <option  value="{{$blm->id}}">{{$blm->bolum}}</option>
      @endforeach
    </select>
  </td>
</tr>
<tr>
  <td colspan="3"><input type="submit" value="EKLE"></td>
</tr>
</table>
<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
@if (isset($bolum))
  <ul>
    <li>{{$bolum->bolum}}
      <ul>
        @foreach ($bolum->programlar as $program)
          <li id="{{$program->id}}">{{$program->program}}</li>
        @endforeach
      </ul>
    </li>
  </ul>
@endif


</form>

    </body>
</html>
