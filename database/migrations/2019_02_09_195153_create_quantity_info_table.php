<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuantityInfoTable extends Migration {

	public function up()
	{
		Schema::create('quantity_info', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('min_qty_allowed')->unsigned();
			$table->integer('max_qty_allowed')->unsigned();
			$table->integer('out_of_stock_threshold')->unsigned();
			$table->enum('stock_status', array('1', '2', '3'));
			$table->boolean('notify_for_quantity')->default(false);
			$table->integer('quantity_to_notify')->unsigned();
			$table->boolean('sell_in_box')->default(false);
			$table->integer('items_per_box')->unsigned();
			$table->boolean('allow_requesting_when_product_out_of_stock')->default(false);
			$table->integer('product_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('quantity_info');
	}
}