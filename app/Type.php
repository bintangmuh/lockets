<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table='types';

    public function event() {
      return $this->belongsTo('App\Event', 'event_id');
    }

    public function tickets() {
      return $this->hasMany('App\Ticket', 'type_id');
    }
}
