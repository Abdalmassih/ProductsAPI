<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceGroupsTable extends Migration {

	public function up()
	{
		Schema::create('price_groups', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('members_group_id')->unsigned();
			$table->enum('type', array('1', '2', '3'));
			$table->double('value', 10,2);
			$table->smallInteger('from_qty')->unsigned();
			$table->integer('product_store_id')->unsigned()->index();
			$table->smallInteger('to_qty')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('price_groups');
	}
}