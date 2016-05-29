@extends('master')

@section('title')
  Edit - {{ $event->name }} - Lockets
@stop

@section('content')
  @include('partial.navbar')
  <header class="beranda teal">

  </header>
<div class="container white z-depth-1 form-contain">
  <div class="row">
    <h5><i class="mdi mdi-calendar"></i> Edit {{ $event->name }}</h5>

     <form class="col s12" method="post" action="{{ URL::route('editEvent', array('id' => $event->id)) }}">
       <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
       <div class="row">
         <div class="input-field col s12">
           <input name="name" id="name" type="text" class="validate" value="{{ $event->name }}">
           <label for="name">Event Name</label>
         </div>
         <div class="input-field col s12">
           <input name="place" id="place" type="text" class="validate" value="{{ $event->place }}">
           <label for="place">Place</label>
         </div>
         <div class="input-field col s12">
           <input name="time" id="time" type="text" class="validate" value="{{ $event->timeheld }}">
           <label for="time">Time</label>
         </div>
         <div class="input-field col s12">
           <textarea id="desc" name="desc" class="materialize-textarea">{{ $event->description }}</textarea>
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
