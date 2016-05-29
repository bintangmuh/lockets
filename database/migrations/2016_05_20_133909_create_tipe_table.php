<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('types', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->boolean('seat');
        $table->integer('limit');
        $table->integer('event_id');
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
      Schema::drop('types');
    }
}
