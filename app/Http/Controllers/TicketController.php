<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ticket as Ticket;
class TicketController extends Controller
{
  public function showjson($id) {
    $ticket = Ticket::findOrFail($id);
    return $ticket->toJSON();
  }
}
