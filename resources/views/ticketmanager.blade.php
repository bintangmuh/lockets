@extends('master')
@section('title')
  Ticket Manager
@stop

@section('content')
  @include('partial.navbar')
  <header class="beranda teal white-text">
    <!-- <h3 class="center-align teal-text"><i class="mdi mdi-certificate"></i> Sign Up</h3> -->
  </header>
  <div class="container">
      <div class="row">
        <div class="col s12">
          <h5 class="white-text">Ticket Manager</h5>
          <p class="white-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <div class="card">
          <table class="highlight">
            <thead>
              <tr>
                <th data-field="type">Type</th>
                <th data-field="seat">Event</th>
                <th data-field="seat">Date</th>
                <th data-field="seat">Transaction</th>
                <th data-field="price">Status</th>
                <th data-field="price">Number Transaction</th>
                <th data-field="action"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
              <tr id="row-{{$ticket->id}}">
                <td>{{ $ticket->type->name }}</td>
                <td>{{ $ticket->type->event->name }}</td>
                <td>{{ $ticket->type->event->timeheld->format('d M Y H:i') }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>{{ ($ticket->paid == 1)?"Paid":"Waiting" }}</td>
                <td>{{ $ticket->type->name.'-'.$ticket->id }}</td>
                @if ($ticket->paid == 1)
                <td><a href="{{ URL::route('printticket', ['id' => $ticket->id ])}}" class="btn waves-effect"><i class="mdi mdi-printer"></i> Print</a></td>
                @else
                <td><a href="#" class="btn waves-effect red lighten-1 cancel-btn" data-event="{{ $ticket->type->event->name }}"  data-ticket="{{ $ticket->id }}" ><i class="mdi mdi-bookmark-remove"></i> Cancel</a></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="alert-modal" class="modal">
  <div class="modal-content">
    <h4>Confimation</h4>
    <p id="event-conf"></p>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">disagree</a>
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat cancel-agree">Agree</a>
  </div>
</div>

  @stop
@section('scriptjs')
<script type="text/javascript">
  $(".button-collapse").sideNav();
  $(document).ready(function(){
    var id;
    var eventname;
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.cancel-btn').click(function() {
      $('#alert-modal').openModal();
      $('#event-conf').html('Are you sure to cancel the '+ $(this).data('event') +' ticket?');
      id = $(this).data('ticket');
      eventname = $(this).data('event');
    });

    $('.cancel-agree').click(function() {
      $.ajax({
        url: '{{ URL::route('index')}}/cancel/'+id,
        type: 'GET',
        success: function(data) {
          if (data == "deleted") {
            Materialize.toast('Ticket '+ eventname +' canceled', 4000);
            $('#row-'+id).remove();
          } else {
            Materialize.toast('Ticket cancel failed', 4000);
          }
        }})
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        Materialize.toast('Failed to connect', 4000);
      })
      .always(function() {
        console.log("complete");
      });

    });
  });
</script>
@stop
