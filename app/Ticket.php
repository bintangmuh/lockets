<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table="tickets";

    public function type() {
      return $this->belongsTo('App\Type', 'type_id');
    }
    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }
}
