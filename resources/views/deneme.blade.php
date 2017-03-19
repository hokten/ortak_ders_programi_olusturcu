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
      {{app('request')->input('tip')}}
   </body>
</html>
