<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('media', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('url', 100);
			$table->unsignedInteger('fk_idgolfclub');
			$table->timestamps();
		});

		// the table has to be created before we can add a foreign key reference
		Schema::table('media', function($table) {
			$table->foreign('fk_idgolfclub')->references('id')->on('golfclubs');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('media');
	}

}
