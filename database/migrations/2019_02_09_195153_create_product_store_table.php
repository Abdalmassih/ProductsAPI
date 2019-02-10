<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductStoreTable extends Migration
{

    public function up()
    {
        Schema::create('product_store', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('store_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('product_store');
    }
}
