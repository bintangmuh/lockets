@extends('master')

@section('title')
  New Event - Lockets
@stop

@section('content')
  @include('partial.navbar')
  <header class="beranda teal">

  </header>
<div class="container white z-depth-1 form-contain">
  <div class="row">
    <h5><i class="mdi mdi-calendar"></i> Create New Event</h5>

     <form class="col s12" method="post" action="{{ URL::route('createEvent') }}">
       <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
       <div class="row">
         <div class="input-field col s12">
           <input name="name" id="name" type="text" class="validate">
           <label for="name">Event Name</label>
         </div>
         <div class="input-field col s12">
           <input name="slug" id="slug" type="text" class="validate">
           <label for="slug">Unique Name</label>
         </div>
         <div class="input-field col s12">
           <input name="place" id="place" type="text" class="validate">
           <label for="place">Place</label>
         </div>
         <div class="input-field col s12">
             <input name="date" type="date" class="datepicker">
           <label for="date">Date</label>
         </div>
         <div class="input-field col s12">
           <input name="time" id="time" type="text" class="timepicker">
           <label for="time">Time</label>
         </div>
         <div class="input-field col s12">
           <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
           <label for="desc">Description</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
          <input type="submit" class="btn btn-teal" value="Create!">
         </div>
       </div>
     </form>
   </div>
@stop

@section('scriptjs')
  <script type="text/javascript">
  $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 2, // Creates a dropdown of 15 years to control year
     format: 'yyyy-mm-dd'
  });
  $('.timepicker').pickatime();

  </script>
@stop
