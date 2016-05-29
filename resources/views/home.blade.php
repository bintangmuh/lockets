@extends('master')

@section('title')
  Lockets
@stop

@section('content')

  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="{{URL::asset('image/about.jpg')}}"></div>
    <div class="container valign white-text center-align">
      <img class="responsive-img" src="{{URL::asset('image/logo.png')}}" alt="" />
      <p class="flow-text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <a href="{{ url('login') }}" class="waves-effect waves-light btn">Login</a> or <a href="{{ URL::route('signupView') }}" class="waves-effect waves-light btn">Sign Up</a>

    </div>
  </div>
    <div class="container">
    </div>
    <div class="container">
      <h5>Event</h5>
      <div class="row">
        @foreach($event as $acara)
          <div class="col s12 m4">
            <div class="card">
              <div class="card-image">
                <img src="{{ URL::asset('image/about.jpg') }}">
                <span class="card-title truncate">{{ $acara->name }}</span>
              </div>
              <!-- <div class="card-content">

              </div> -->
              <div class="card-action">
                <a href="{{ URL::route('showEvent', ['id' => $acara->id ]) }}">view</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@stop

@section('scriptjs')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.parallax').parallax();
    });
  </script>
@stop
