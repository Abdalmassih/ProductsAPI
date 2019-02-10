<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceSpecialsTable extends Migration {

	public function up()
	{
		Schema::create('price_specials', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->timestamps();
			$table->double('price');
			$table->date('from_date');
			$table->date('to_date');
		});
	}

	public function down()
	{
		Schema::drop('price_specials');
	}
}