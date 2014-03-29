<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('options', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			// Which Poll does this option belong to
			$table->integer('poll_id')->unsigned();
			// The title of the option
			$table->string('title');
			$table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('options');
	}

}