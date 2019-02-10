<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisplaysTable extends Migration
{

    public function up()
    {
        Schema::create('displays', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('number')->unique();
        });
    }

    public function down()
    {
        Schema::drop('displays');
    }
}
