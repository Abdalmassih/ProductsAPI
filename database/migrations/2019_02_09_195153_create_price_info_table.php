<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceInfoTable extends Migration {

	public function up()
	{
		Schema::create('price_info', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->timestamps();
			$table->integer('cost')->nullable();
			$table->integer('msrp')->nullable();
			$table->enum('display_type', array('1', '2', '3'));
		});
	}

	public function down()
	{
		Schema::drop('price_info');
	}
}