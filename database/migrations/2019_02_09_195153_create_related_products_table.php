<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelatedProductsTable extends Migration {

	public function up()
	{
		Schema::create('related_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('first_product_id')->unsigned();
			$table->integer('second_product_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('related_products');
	}
}