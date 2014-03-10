<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolfclubsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('golfclubs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->string('address', 20);
			$table->string('email', 100)->unique();
			$table->string('password', 64);
			$table->string('place', 20);
			$table->text('description');
			$table->string('phonenumber', 20);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('golfclubs');
	}

}
