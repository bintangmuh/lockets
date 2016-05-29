<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('events', function (Blueprint $table) {
          $table->increments('id');
          $table->string('slug', 20)->unique();
          $table->string('name');
          $table->longtext('description');
          $table->string('image');
          $table->string('place');
          $table->dateTime('timeheld');
          $table->integer('user_id');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('events');
    }
}
