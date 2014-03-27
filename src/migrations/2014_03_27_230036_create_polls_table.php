<?php

use Illuminate\Database\Migrations\Migration;

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
			$table->boolean('active')->unsigned();
			// "Public" used to trigger switch on showing results of poll
			$table->boolean('public')->nullable();
			// The Main Question for the poll
			$table->integer('question')->nullable();
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