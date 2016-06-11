@extends('master')
@section('title')
  Signup - Lockets
@stop

@section('content')
  <header class="tubruk teal white-text center-align">
    <a href="{{URL::route('index')}}"><img src="{{URL::asset('image/logo.png')}}" alt="" /></a>
  </header>
  <div class="container white z-depth-1 form-contain">
    <div class="row">
      <h5 class="center-align"><i class="mdi mdi-certificate"></i> Sign Up</h5>
      <p class="center-align">
        have an account? try <a href="{{ url('/login') }}">Login</a>
      </p>
       <form class="col s12" method="post" action="{{ URL::route('storeUser') }}">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
         <div class="row">
           <div class="input-field col s12">
             <input name="username" id="username" type="text" class="validate">
             <label for="username">Username</label>
           </div>
           <div class="input-field col s12">
             <input name="name" id="fname" type="text" class="validate">
             <label for="fname">Full Name</label>
           </div>
           <div class="input-field col s12">
             <input name="password" id="password" type="password" class="validate">
             <label for="password">Password</label>
           </div>
           <div class="input-field col s12">
             <input name="email" id="email" type="email" class="validate">
             <label for="email">Email</label>
           </div>
         </div>
         <div class="row">
           <div class="input-field col s12">
            <input type="submit" class="btn btn-teal" value="Signup!">
           </div>
         </div>
       </form>
     </div>
  </div>
@stop
