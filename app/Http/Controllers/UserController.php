<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Event as Event;
use App\Ticket as Ticket;
use App\Type as Type;
use Carbon\Carbon as Carbon;
use Auth;
use Input;
use Hash;

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
      $newuser->password = Hash::make(Input::get('password'));
      $newuser->email = Input::get('email');
      $newuser->save();

      return redirect('/');
    }

    public function home()
    {
      $events = Event::where('timeheld','>=', Carbon::now())->get();
      $user = Auth::user();
      return view('Beranda', ['events' => $events->sortByDesc('timeheld'), 'user' => $user]);
    }


    public function editprofile()
    {
      return view('editprofile', ['user' => Auth::user()]);
    }

    public function savechange()
    {
      $user = User::find(Auth::user()->id);
      $user->name = Input::get('name');
      $user->email = Input::get('email');
      $user->save();
    }




    public function eventlist() {
      $user = Auth::user();
      return view('eventmanager',['event' => $user->events->sortByDesc('timeheld')]);
    }


}
