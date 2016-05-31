<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Event as Event;
use App\Ticket as Ticket;
use App\Type as Type;
use Input;

class UserController extends Controller
{
    public function show($id) {
      return App\User::findOrFail($id);
    }

    public function signupview()
    {
      return view('signup');
    }

    public function store()
    {
      $newuser = new User;
      //username
      $newuser->username = Input::get('username');
      //full name
      $newuser->name = Input::get('name');
      $newuser->password = Input::get('password');
      $newuser->email = Input::get('email');
      $newuser->save();

      return redirect('/');
    }

    public function home()
    {
      $events = Event::all();
      $user = User::find(1);
      return view('Beranda', ['events' => $events, 'user' => $user]);
    }


    public function editdata($id)
    {

    }



    public function eventlist() {
      $user = User::find(1);
      return view('eventmanager',['event' => $user->events->sortByDesc('timeheld')]);
    }


}
