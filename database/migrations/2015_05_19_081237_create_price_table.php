<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Exchanger\Price;

class CreatePriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->double("data");
			$table->timestamps();
		});


		//usd buy
		$price = new Price();
		$price->data = 0;
		$price->save();

		// usd sell
		$price = new Price();
		$price->data = 0;
		$price->save();

		// myr buy
		$price = new Price();
		$price->data = 0;
		$price->save();

		// myr sell
		$price = new Price();
		$price->data = 0;
		$price->save();

		// baht buy
		$price = new Price();
		$price->data = 0;
		$price->save();

		//baht sell
		$price = new Price();
		$price->data = 0;
		$price->save();

		// idr buy
		$price = new Price();
		$price->data = 0;
		$price->save();

		//idr sell
		$price = new Price();
		$price->data = 0;
		$price->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prices');
	}

}
