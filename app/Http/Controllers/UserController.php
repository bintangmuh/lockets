<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Event as Event;
use App\Ticket as Ticket;
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

    public function ticket() {
      $user = User::find(1);
      $ticket = $user->ticket;
      // return $user->ticket;
      return view('ticketmanager', ['tickets' => $ticket]);
    }
    public function editdata($id)
    {

    }

    public function print($id)
    {
      $ticket = Ticket::findOrFail($id);
      return view('print.ticket',['ticket' => $ticket]);
    }

    public function eventlist() {
      $user = User::find(1);
      return view('eventmanager',['event' => $user->events->sortByDesc('timeheld')]);
    }
}
