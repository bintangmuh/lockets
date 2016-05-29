@extends('master')
@section('title')
  Beranda - LocketOnline
@stop

@section('content')
  @include('partial.navbar')
  <div class="row">
    <header class="beranda teal white-text">
      <div class="container">
        <!-- <img src="{{URL::asset('image/logo.png')}}" alt="" /> -->
      </div>
      <!-- <h3 class="center-align teal-text"><i class="mdi mdi-certificate"></i> Sign Up</h3> -->
    </header>
    <div class="container">
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-content">
              <h5>Profil</h5>
              <p>
                <i class="mdi mdi-account-box"></i> {{ $user->username }} <br>
                <i class="mdi mdi-face"></i> {{ $user->name }} <br>
                <i class="mdi mdi-email"></i> {{ $user->email  }} <br>
              </p>
            </div>
            <div class="card-action">
              <a href="#" class="teal-text"><i class="mdi mdi-pencil"></i> Edit Profil</a> <br>
            </div>
          </div>
        </div>
        <div class="col s12 m8">
          @foreach($events as $acara)
            <div class="col s6 m6">
              <div class="card">
                <div class="card-image">
                  <img src="{{ URL::asset('image/about.jpg') }}">
                  <span class="card-title">{{ $acara->name }}</span>
                </div>
                <!-- <div class="card-content">
                </div> -->
                <div class="card-action">
                  <a href="{{ URL::asset('event/'. $acara-> id .'') }}">view</a>
                </div>
              </div>
            </div>
          @endforeach
            <div class="col s6 m6">
              <div class="card">
                <div class="card-content center-align">
                  <p>
                    Have an Event? Why you don't try sell your ticket here?
                  </p>
                  <a href="{{ URL::route('createEventView') }}" class="btn-floating btn-large waves-effect waves-light red"><i class="mdi mdi-calendar-plus"></i></a>
                </div>
              </div>
            </div>
      </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('scriptjs')
<script type="text/javascript">
  $(".button-collapse").sideNav();
</script>
@stop
