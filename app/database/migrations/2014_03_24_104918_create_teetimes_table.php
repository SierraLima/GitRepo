<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeetimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teetimes', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->dateTime('date');
			$table->float('price');
			$table->unsignedInteger('golf_course_id');
			$table->timestamps();
		});
		
		// the table has to be created before we can add a foreign key reference
		Schema::table('teetimes', function($table) {
			$table->foreign('golf_course_id')->references('id')->on('golfcourses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('teetimes');
	}

}
