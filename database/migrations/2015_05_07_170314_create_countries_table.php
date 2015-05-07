<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Exchanger\Country;

class CreateCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("name");
			$table->timestamps();
		});

		$country = new Country();
		$country->name = "Malaysia";
		$country->save();

		$country = new Country();
		$country->name = "Thailand";
		$country->save();

		$country = new Country();
		$country->name = "Indonesia";
		$country->save();

		$country = new Country();
		$country->name = "Others";
		$country->save();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
	}

}
