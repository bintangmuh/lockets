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
                <th data-field="price">Number Transaction</th>
                <th data-field="action"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
              <tr>
                <td>{{ $ticket->type->name }}</td>
                <td>{{ $ticket->type->event->name }}</td>
                <td>{{ $ticket->type->event->timeheld->format('d M Y H:i') }}</td>
                <td>{{ $ticket->edited_at }}</td>
                <td>{{ $ticket->type->name.'-'.$ticket->id }}</td>
                <td><a href="{{ URL::route('printticket', ['id' => $ticket->id ])}}" class="btn btn-waves"><i class="mdi mdi-printer"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@section('scriptjs')
<script type="text/javascript">
  $(".button-collapse").sideNav();
</script>
@stop
