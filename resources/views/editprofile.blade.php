@extends('master')

@section('title')
  Edit Profile - Lockets
@stop

@section('content')
  @include('partial.navbar')
<header class="beranda teal">

</header>
<div class="container white z-depth-1 form-contain">
  <div class="row">
    <h5><i class="mdi mdi-account-circle"></i> Edit</h5>
    <form action="{{ URL::route('savechange') }}" method="post">
      <input name="_token" type="hidden" value="{!! csrf_token() !!}" >
      <div class="input-field col s12">
        <input id="name" name="name" type="text" class="validate" value="{{ $user->name }}">
        <label for="name">Name:</label>
      </div>
      <div class="input-field col s12">
        <input id="email" type="email" name="email" class="validate" value="{{ $user->email }}">
        <label for="email">email:</label>
      </div>
      <button type="submit" class="waves-light waves-effect btn">Save</button>
    </form>
  </div>
 </div>
@stop

@section('scriptjs')
<script type="text/javascript">
  $('.modal-trigger').leanModal();
</script>
@stop
