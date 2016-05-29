@extends('master')

@section('title')
  {{ $event->name }} - Event - Lockets
@stop

@section('content')
  <header class="parallax-container">
    <div class="parallax">
      <img  src="{{ URL::asset('image/about.jpg')}}" class="responsive-img" alt="" />
    </div>
    <div class="span-title white-text">
      <div class="container">
        <span>
          <h5>{{ $event->name }}</h5>
        </span>
        <div class="row">
          <div class="col s12 m4">
            <i class="mdi mdi-map-marker"></i> {{ $event->place }} <br>
          </div>
          <div class="col s12 m4">
            <i class="mdi mdi-calendar"></i> {{ $event->timeheld->format('d M Y') }} <br>
          </div>
          <div class="col s12 m4">
            <i class="mdi mdi-clock"></i> {{ $event->timeheld->format('H:i') }} <br>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <p>
      Author: {{ $event->author->name }}
    </p>
    <p>
      <h6>Description: </h6>
      {{ $event->description }}
    </p>
    <p>
      <table class="highlight">
        <thead>
          <tr>
              <th data-field="type">Type</th>
              <th class="center-align" data-field="seat"><i class="mdi mdi-seat-legroom-normal"></i> Seat</th>
              <th class="center-align" data-field="price">Available</th>
              <th class="center-align" data-field="price"><i class="mdi mdi-coin"></i> Price</th>
              <th class="center-align" data-field="action"></th>
          </tr>
        </thead>

        <tbody>
          @foreach($event->type as $type)
            <tr>
              <td>{{ $type->name }}</td>
              <td class="center-align">{{ ($type->seat == 1) ? "Yes" : "No" }}</td>
              <td class="center-align">{{ (($type->limit - $type->tickets()->count())) }}</td>
              <td class="center-align">Rp.{{ $type->price }}</td>
              <td class="center-align"><a href="#" class="btn teal"><i class="mdi mdi-cart"></i></a></td>

            </tr>
          @endforeach

        </tbody>
      </table>
    </p>
    <!-- {{ $event->type }}a -->
  </div>
@stop

@section('scriptjs')
<script type="text/javascript">
$(document).ready(function(){
    $('.parallax').parallax();
  });
</script>
@stop
