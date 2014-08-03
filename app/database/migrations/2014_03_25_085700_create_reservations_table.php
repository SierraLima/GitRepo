<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('numberplayer');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('teetime_id');
			$table->timestamps();
		});
		
		// the table has to be created before we can add a foreign key reference
		Schema::table('reservations', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('teetime_id')->references('id')->on('teetimes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('reservations');
	}

}
