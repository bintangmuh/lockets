<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $event =  App\Event::all();

    return view('home', ['event' => $event]);
})->name('index');



// Middleeware user, user yang bisa masuk
Route::get('event/new', [
  'uses' => 'EventsController@createEventView',
  'as' => 'createEventView'
]);

Route::post('event/new', [
  'uses' => 'EventsController@createEvent',
  'as' => 'createEvent'
]);

Route::get('home', [
  'uses' => 'UserController@home',
  'as' => 'homeUrl'
]);

Route::get('edit', [
  'uses' => 'UserController@home',
  'as' => 'edit'
]);

Route::get('eventmanager',[
  'uses' => 'UserController@eventlist',
  'as' => 'eventList'
]);

Route::get('tickets', [
  'uses' => 'UserController@ticket',
  'as' => 'ticketmanager'
]);

Route::get('buy/{id}', [
  'uses' => 'UserController@buyTicket',
  'as' => 'buyTicket'
]);

//middleware user punya ticket
Route::get('print/{id}', [
  'uses' => 'UserController@print',
  'as' => 'printticket'
]);
//middleware user author, penulis yang hanya bisa masuk
Route::get('event/{id}/edit', [
  'uses' => 'EventsController@editEventView',
  'as' => 'editEventView'
]);

Route::post('event/{id}/edit', [
  'uses' => 'EventsController@editEvent',
  'as' => 'editEvent'
]);

Route::get('event/{id}/addeseat', [
  'uses' => 'EventsController@addSeatView',
  'as' => 'addseat'
]);

Route::get('typejson')->name('urltype');

Route::get('typejson/{id}/', [
  'uses' => 'EventsController@typeJson',
  'as' => 'jsontype'
]);

Route::post('event/{id}/addeseat', [
  'uses' => 'EventsController@createSeat',
  'as' => 'createSeat'
]);

Route::get('event/{id}/editseat')->name('posteditform');

Route::post('event/{id}/editseat/{idseat}', [
  'uses' => 'EventsController@editseat',
  'as' => 'editseat'
]);

//tanpa middleware
Route::get('signup', [
  'uses' => 'UserController@signupview',
  'as' => 'signupView'
]);

Route::get('login', function()
{
  return view('login');
});

Route::post('signup', [
  'uses' => 'UserController@store',
  'as' => 'storeUser'
]);

Route::get('event/{id}', [
  'uses' => 'EventsController@showEvent',
  'as' => 'showEvent'
]);
