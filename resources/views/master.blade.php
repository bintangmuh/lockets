<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('css/materialdesignicons.min.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('style.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('image/icon.png')}}"/>
  </head>
  <body>
    @yield('content')


    <script src="{{ URL::asset('js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/materialize.min.js') }}" charset="utf-8"></script>
    @yield('scriptjs')
  </body>
</html>
