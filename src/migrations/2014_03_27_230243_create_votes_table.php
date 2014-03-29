<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function(Blueprint $table) {
			// Which option is this vote for
			$table->integer('option_id')->unsigned();
			// If config is set to use a unique identifier for the votes (ie. only one vote per IP or userId).
			$table->integer('unique_identifier')->unsigned()->nullable();
			$table->timestamps();
			$table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}

}