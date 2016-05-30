<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event as Event;
use App\Type as Type;
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
      $event = Event::findOrFail($id);
      return view('addseat',['events' => $event]);
    }

    public function createSeat($id) {
      $event = Event::findOrFail($id);
      $type = new Type([
        'name' => Input::get('typename'),
        'seat' => Input::get('seat'),
        'limit' => Input::get('limit'),
        'price' => Input::get('price')
      ]);
      $event->type()->save($type);
      return redirect()->route('addseat', [$event->id]);
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

    public function editseat($id, $idseat) {
        $type = Type::findOrFail($idseat);
        $type->name = Input::get('typename');
        $type->seat = Input::get('seat');
        $type->limit = Input::get('limit');
        $type->price = Input::get('price');
        $type->save();
        return redirect()->route('addseat', ['id' => $type->event_id]);
    }

    public function typeJson($id) {
      $type = Type::findOrFail($id);
      return $type->toJson();
    }
}
