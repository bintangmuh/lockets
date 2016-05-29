<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    protected $dates = ['timeheld'];

    public function type() {
      return $this->hasMany('App\Type', 'event_id');
    }

    

    public function author() {
      return $this->belongsTo('App\User','user_id');
    }
}
