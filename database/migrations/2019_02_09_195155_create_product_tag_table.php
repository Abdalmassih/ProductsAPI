<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTagTable extends Migration
{

    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('product_display');
    }
}
