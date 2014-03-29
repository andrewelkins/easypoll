<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('polls', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			// Activate poll
			$table->boolean('active')->default(0);
			// "Public" used to trigger switch on showing results of poll
			$table->boolean('public')->default(1);
			// The Main Question for the poll
			$table->string('question');
			// Created_at and Updated_at
			$table->timestamps();
			// Does the poll expire
			$table->timestamp('expires_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('polls');
	}

}