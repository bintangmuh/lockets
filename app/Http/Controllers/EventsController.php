<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event as Event;
use Input;
class EventsController extends Controller
{
    public function show() {

    }
    public function showEvent($id) {
      $event = Event::find($id);
      return view('event', ['event' => $event]);
    }

    public function createEventView() {
      return view('newevent');
    }

    public function addSeatView($id) {
      return 'add seat to id'. $id;
    }
    public function createSeat($id) {
      return 'created seat';
    }

    public function editEventView($id) {
      $event = Event::findOrFail($id);
      return view('editevent',['event' => $event]);
    }

    public function editEvent($id) {
      return dd(Input::all());
    }


    public function createEvent() {
      $event = new Event;
      $event->name = Input::get('name');
      $event->slug = Input::get('slug');
      $event->place = Input::get('place');
      $date = strtotime(Input::get('date').' '.Input::get('time').':00');
      //file handling
      $event->image = 'about.jpg';
      //author
      $event->user_id = 1;

      $event->timeheld = $date;
      $event->description = Input::get('desc');
      $event->save();

      return redirect('showEvent',['id' => $event->id]);

    }
}
