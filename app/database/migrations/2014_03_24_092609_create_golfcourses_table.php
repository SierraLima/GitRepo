<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolfcoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('golfcourses', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('holenumber');
			$table->unsignedInteger('golf_club_id')->unsigned();
			$table->timestamps();
		});

		// the table has to be created before we can add a foreign key reference
		Schema::table('golfcourses', function($table) {
			$table->foreign('golf_club_id')->references('id')->on('golfclubs');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('golfcourses');
	}

}
