<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembershipsTable extends Migration {

	public function up()
	{
		Schema::create('memberships', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('member_id')->unsigned();
			$table->integer('member_group_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('memberships');
	}
}