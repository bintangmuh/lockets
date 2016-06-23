<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Event as Event;
use App\Type as Type;
use Input;
use Auth;
use Carbon\Carbon;

class EventsController extends Controller
{


    public function showEvent($id) {
      $event = Event::findOrFail($id);
      return view('event2', ['event' => $event]);
    }

    public function createEventView() {
      return view('newevent');
    }

    public function addSeatView($id) {
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
      return view('addseat',['events' => $event]);
    }

    public function createSeat($id) {
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
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
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
      return view('editevent',['event' => $event]);
    }

    public function editEvent($id) {
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
      $event->name = Input::get('name');
      $event->place = Input::get('place');
      $event->timeheld = Input::get('time');
      $event->description = Input::get('desc');
      $event->save();

      return redirect()->route('showEvent',['id' => $event->id]);
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
      $event->user_id = Auth::user()->id;

      $event->timeheld = $date;
      $event->description = Input::get('desc');
      $event->save();

      return redirect()->route('showEvent',['id' => $event->id]);
    }

    public function approveView($id) {
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
      return view('approval', ['event' => $event]);
    }

    public function reportview($id) {
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
      return view('reportevent', ['event' => $event]);
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

    public function upload($id) {
      $file = array('image' => Input::file('image'));
      $rules = array('image' => 'required');
      $validator = Validator::make($file, $rules);
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }

      if($validator->fails()) {
        return Response::json('Error Saving', 500);
      } else {
        if(Input::file('image')->isValid()){
          $path = storage_path().'/upload/';
          $extension = Input::file('image')->getClientOriginalExtension();
          $fileName = Carbon::now()->format('YmdHis').'.'.$extension;
          Input::file('image')->move($path, $fileName);

          $event->image = $fileName;
          $success = $event->save();
          if($success) {
            return redirect()->route('editEventView', ['id' => $event->id]);
          } else {
            return redirect()->route('editEventView', ['id' => $event->id]);
          }
        } else {
          return redirect()->route('editEventView', ['id' => $event->id]);
        }
      }
    }

    public function typeJson($id) {
      $type = Type::findOrFail($id);
      return $type->toJson();
    }
    public function deletetype($id, $tyid) {
      $event = Event::findOrFail($id);
      if (Auth::user()->id != $event->user_id) {
        return redirect()->route('forbidden');
      }
      $type = Type::findOrFail($tyid);
      $success = $type->delete();

      if ($success) {
        return "berhasil";
      } else {
        return "gagal";
      }
    }
}
