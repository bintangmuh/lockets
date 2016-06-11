<nav>
    <div class="nav-wrapper teal">
      <a href="{{ URL::route('homeUrl') }}" class="brand-logo" style="line-height: 64px; padding-top: 10px; padding-left: 7px; "><img src="{{ URL::asset('image/logo.png') }}" height="50px" alt="" /></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi mdi-menu"></i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ URL::route('homeUrl') }}">Home</a></li>
        <li><a href="{{ URL::route('ticketmanager') }}">Ticket</a></li>
        <li><a href="{{ URL::route('eventList') }}">Event Manager</a></li>
        <li><a href="{{ URL::route('logout') }}">Logout</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="{{ URL::route('homeUrl') }}">Home</a></li>
        <li><a href="{{ URL::route('ticketmanager') }}">Ticket</a></li>
        <li><a href="{{ URL::route('eventList') }}">Event Manager</a></li>
        <li><a href="{{ URL::route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </nav>
