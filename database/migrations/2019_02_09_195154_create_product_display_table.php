<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductDisplayTable extends Migration
{

    public function up()
    {
        Schema::create('product_display', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('display_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('product_display');
    }
}
