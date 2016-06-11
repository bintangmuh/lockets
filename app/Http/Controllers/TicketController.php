<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ticket as Ticket;
use App\User as User;
use App\Event as Event;
use App\Type as Type;
use Input;
use Auth;

class TicketController extends Controller
{
  public function showjson($id) {
    $ticket = Ticket::findOrFail($id);
    return $ticket->toJSON();
  }

  public function ticket() {
    $user = Auth::user();
    $ticket = $user->ticket;
    // return $user->ticket;
    return view('ticketmanager', ['tickets' => $ticket]);
  }

  public function buyTicket($tyid) {
    $user = Auth::user();
    $type = Type::find($tyid);
    if ((($type->limit) - ($type->tickets()->count())) > 0) {
      $ticket = new Ticket();
      $ticket->type_id = $tyid;
      $ticket->paid = 0;
      $ticket->save();
      $user->ticket()->save($ticket);
      return redirect()->route('ticketmanager');
    }
    return redirect()->route('ticketmanager');
  }

  public function cancel($id) {
    try {
      $ticket = Ticket::findOrFail($id);
      $ticket->delete();
      return "deleted";
    } catch (Exception $e) {
      return  "fail";
    }
    // return redirect()->route('ticketmanager');
  }



  public function approve($id) {
    try {
      $ticket = Ticket::findOrFail($id);
      $ticket->paid = 1;
      $ticket->save();
      return "berhasil";
    } catch (Exception $e) {
      return  "fail";
    }
  }

  public function print($id)
  {
    $ticket = Ticket::findOrFail($id);
    return view('print.ticket',['ticket' => $ticket]);
  }
}
