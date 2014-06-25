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
			$table->string('firstname', 30)
			$table->string('email', 100)->unique();
			
			$table->string('password', 64);
			
			$table->integer('parcours');
			$table->string('interval',20);
			$table->dateTime('openingtime');
			$table->string('website', 30);
			$table->string('country', 20);
			$table->string('city', 20);
			$table->string('region', 30);
			$table->string('address', 30);
			$table->string('zipcode', 20);
			$table->string('phonenumber', 20);
			
			$table->text('services');
			
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
