<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {

	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned()->index();
			$table->string('path');
			$table->text('caption');
			$table->smallInteger('sort_order')->unique();
		});
	}

	public function down()
	{
		Schema::drop('files');
	}
}