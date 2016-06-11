@extends('master')
@section('title')
  Event Manager
@stop

@section('content')
  @include('partial.navbar')
  <header class="beranda teal">

  </header>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h5 class="white-text">Event Manager</h5>
        <p class="white-text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          <a href="{{URL::route('createEventView')}}" class="btn waves-effect waves-light"><i class="mdi mdi-plus"></i> Add New Event</a>
        </p>
        @foreach($event as $acara)
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s6 m3">
                  <img class="responsive-img" src="{{ URL::route('imgup', ['filename' => $acara->image])}}" alt="{{ $acara->name }}" />
                </div>
                <div class="col s6 m9">
                  <h5>{{ $acara->name }}</h5>
                  <p>
                    <i class="mdi mdi-calendar "></i> {{ $acara->timeheld->format('d M Y')}}
                    <i class="mdi mdi-clock "></i> {{ $acara->timeheld->format('H:i')}} <br>
                    {{--*/ $counter = 0 /*--}}
                    @foreach($acara->type as $type)
                    {{--*/ $counter += $type->tickets()->unpaid()->count() /*--}}
                    @endforeach

                    @if($counter <= 0)
                      <i class="mdi mdi-check-all "></i> everything clear
                    @else
                      <i class="mdi mdi-alert-octagon red-text"></i> {{ $counter }} need approval
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="card-action right-align">
              <a href="{{ URL::route('reportview', ['id' => $acara->id]) }}" class="btn waves-effect waves-light"><i class="mdi mdi-playlist-check"></i> Report</a>
              <a href="{{ URL::route('approveView', ['id' => $acara->id]) }}" class="btn {{ $counter > 0 ? "orange":"blue" }} waves-effect waves-light">Approval</a>
              <a href="{{ URL::route('addseat', ['id' => $acara->id]) }}"><i class="mdi mdi-plus"></i><i class="mdi mdi-seat-legroom-normal"></i> Seat Manage</a>
              <a href="{{ URL::route('editEvent', ['id' => $acara->id]) }}" ><i class="mdi mdi-pencil"></i> Edit</a>
              <a href="{{ URL::route('showEvent', ['id' => $acara->id ]) }}" ><i class="mdi mdi-eye"></i> View</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @section('scriptjs')
  <script type="text/javascript">
    $(".button-collapse").sideNav();
  </script>
  @stop
@stop
