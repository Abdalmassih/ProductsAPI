<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSimilarProductsTable extends Migration {

	public function up()
	{
		Schema::create('similar_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('first_product_id')->unsigned()->index();
			$table->integer('second_product_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('similar_products');
	}
}