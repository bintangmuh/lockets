@extends('master')

@section('title')
  {{ $event->name }} Approval
@stop

@section('content')
  @include('partial.navbar')
  <header class="beranda teal">

  </header>
  <div class="row">
    <div class="col s12">
      <p>
        <a href="{{ URL::route('eventList')}}" class="breadcrumb">Event Manager</a>
        <a  class="breadcrumb">{{ $event->name }}</a>
        <a  class="breadcrumb">List Tickets</a>
      </p>
    </div>
    <div class="col s3">
      <ul class="collection">
        @foreach($event->type as $type)
          <a href="#{{$type->id}}" class="tab collection-item linkto">{{ $type->name }} <span class="badge yellow white-text">{{$type->tickets()->paid()->count()}}</span></a>
        @endforeach
      </ul>
    </div>
    <div class="col s9">
        @foreach($event->type as $type)
        <div id="{{ $type->id }}" class="hide-unactive col s12">
          <h5 class="white-text">Seat type "{{ $type->name }}"</h5>
          <div class="card">
              <table class="highlight">
                <thead>
                  <tr >
                    <th data-field="type">Name</th>
                    <th data-field="seat">Date Trans</th>
                    <th data-field="seat">Number Trans</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($type->tickets()->paid()->get() as $ticket)
                  <tr id="row-{{$ticket->id}}">
                    <td>{{$ticket->user->name}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->type->name}}-{{$ticket->id}} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
        @endforeach
    </div>
  </div>
@stop

@section('scriptjs')
  <script type="text/javascript">
  $('.hide-unactive').hide();
  $(".button-collapse").sideNav();
  $('ul.collection').tabs();
  $('ul.collection').tabs('select_tab', 'tab_id');

  </script>
@stop
