<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSupplierTable extends Migration {

	public function up()
	{
		Schema::create('product_supplier', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned()->index();
			$table->integer('supplier_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('product_supplier');
	}
}