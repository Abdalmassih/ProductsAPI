<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductBrandTable extends Migration {

	public function up()
	{
		Schema::create('product_brand', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned()->index();
			$table->integer('brand_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('product_brand');
	}
}
