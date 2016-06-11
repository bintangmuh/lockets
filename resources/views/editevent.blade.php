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
       <div class="col s12">
         <img src="{{ URL::route('imgup', ['filename' => $event->image])}}" class="responsive-img" alt="" />
         <a href="#upload" class="btn btn-ripple waves-effect waves-light modal-trigger"><i class="mdi mdi-camera add-photo"></i></a>
       </div>
       <div class="row">
         <div class="input-field col s12">
          <input type="submit" class="btn btn-teal" value="Edit!">
         </div>
       </div>
     </form>
   </div>

   <div id="upload" class="modal">
    <form action="{{ URL::route('uploadPhoto',['id' => $event->id]) }}" method="post" enctype="multipart/form-data">
      <div class="modal-content">
          <h5><i class="mdi mdi-camera add-photo"></i> Select image to upload:</h5>
          <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
          <input type="file" name="image" id="fileToUpload">
    </div>
    <div class="modal-footer">
      <button type="submit" class=" modal-action modal-close waves-effect waves-green btn teal">Upload</button>
      <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </form>
  </div>

@stop

@section('scriptjs')
<script type="text/javascript">
$('.modal-trigger').leanModal();
</script>
@stop
