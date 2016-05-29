<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    public function events() {
      return $this->hasMany('App\Event');
    }

    public function ticket() {
      return $this->hasMany('App\Ticket');
    }
}
