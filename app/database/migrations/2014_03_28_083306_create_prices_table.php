<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->float('amount');
			$table->string('description');
			$table->unsignedInteger('golf_club_id');
			$table->timestamps();
		});
		
		// the table has to be created before we can add a foreign key reference
		Schema::table('prices', function($table) {
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
		Schema::dropIfExists('prices');
	}

}
