<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediasTable extends Migration {

	public function up()
	{
		Schema::create('medias', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned()->index();
			$table->enum('type', array('1', '2', '3'));
			$table->string('path');
			$table->text('caption')->nullable();
			$table->boolean('main_photo')->default(false);
			$table->smallInteger('sort_order')->unique()->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('medias');
	}
}