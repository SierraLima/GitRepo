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
			
			$table->string('golfclubname',50);
			$table->string('lastname', 30);
			$table->string('firstname', 30);
			$table->string('email', 100)->unique();
			
			$table->string('password', 64);
			
			$table->integer('parcours');
			$table->string('interval',20);
			$table->time('openingtime');
			$table->string('website', 30);
			$table->string('country', 20);
			$table->string('city', 20);
			$table->string('region', 30);
			$table->string('address', 30);
			$table->string('zipcode', 20);
			$table->string('phonenumber', 20);
			
			$table->boolean('conditions');
			
			$table->integer('par');
			$table->string('drivingrange');
			$table->string('sloperating');
			$table->string('courserating');
			$table->text('equipment');
			$table->text('services');
			
			$table->string('photo', 100);
			
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
