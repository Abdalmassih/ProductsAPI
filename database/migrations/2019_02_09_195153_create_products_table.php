<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->unique();
			$table->integer('set_id')->unsigned();
			$table->string('sku')->nullable();
			$table->boolean('active')->default(true);
			$table->integer('current_price');
			$table->integer('old_price');
			$table->bigInteger('quantity')->unsigned();
			$table->boolean('unlimited_quantity')->default(true);
			$table->enum('tax_type', array('1', '2', '3'));
			$table->mediumText('brief')->nullable();
			$table->mediumText('description')->nullable();
			$table->string('url');
			$table->string('meta_title')->nullable();
			$table->text('meta_description')->nullable();
			$table->text('meta_keywords')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}