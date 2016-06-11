@extends('master')
@section('title')
  Forbidden Lockets
@stop

@section('content')
  <header class="beranda teal center-align valign-wrapper" style="height: 100vh">
    <div class="center-align white-text valign" style="margin:auto">
      <h1 class="center-align white-text"><i class="mdi mdi-security"></i></h1>
      <h1 class="center-align white-text">Forbidden</h1>
      <p class="center-align white-text">
        Sorry, the page that you requested is forbidden, try login with another account
      </p>
      <a href="{{ URL::route('homeUrl') }}" class="btn waves-light waves-effect">Back To Home</a>
    </div>
  </header>

@stop
