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
        <a  class="breadcrumb">Unapprove Tickets</a>
      </p>
    </div>
    <div class="col s3">
      <ul class="collection">
        @foreach($event->type as $type)
          <a href="#{{$type->id}}" class="tab collection-item linkto">{{ $type->name }} @if($type->tickets()->unpaid()->count() > 0)<span class="badge orange darken-1 white-text">{{ $type->tickets()->unpaid()->count() }}</span>@endif</a>
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
                    <th data-field="seat">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($type->tickets()->unpaid()->get() as $ticket)
                  <tr id="row-{{$ticket->id}}">
                    <td>{{$ticket->user->name}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->type->name}}-{{$ticket->id}} </td>
                    <td>
                      <a href="#" data-ticket="{{$ticket->id}}" class="btn waves-effect waves-light blue accept-btn"><i class="mdi mdi-check"></i></a>
                      <a href="#" data-ticket="{{$ticket->id}}" class="btn waves-effect waves-light red reject-btn"><i class="mdi mdi-close"></i></a>
                    </td>
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

  $('.accept-btn').click(function() {
    var id = $(this).data('ticket');
    console.log('clicke');
    $.ajax({
      url: '{{URL::route('index')}}/approve/ticket/'+id,
      type: 'GET',
      success: function(data) {
        if (data == "berhasil") {
          Materialize.toast('Ticket  approved', 4000);
          $('#row-'+id).remove();
        } else {
          Materialize.toast('Ticket approve fail', 4000);
        }
      }
    }).fail(function() {
      Materialize.toast('Failed to connect', 4000);
    });

  });

  $('.reject-btn').click(function() {
    var id = $(this).data('ticket');
    console.log('clicke');
    $.ajax({
      url: '{{URL::route('index')}}/unapprove/ticket/'+id,
      type: 'GET',
      success: function(data) {
        if (data == "deleted") {
          Materialize.toast('Ticket  deleted', 4000);
          $('#row-'+id).remove();
        } else {
          Materialize.toast('Ticket delete fail', 4000);
        }
      }
    }).fail(function() {
      Materialize.toast('Failed to connect', 4000);
    });

  });
  </script>
@stop
