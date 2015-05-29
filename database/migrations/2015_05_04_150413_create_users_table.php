<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Exchanger\User;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("firstname");
			$table->string("lastname");
			$table->string("username");
			$table->string("email");
			$table->string("password");
			$table->integer("access_level");
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});


		$user = new User();
		$user->firstname = "Nizul";
		$user->lastname = "Zaim";
		$user->username = "nizulzaim";
		$user->email = "skynightz93@gmail.com";
		$user->password = Hash::make("skynightz9392");
		$user->access_level = 6;

		$user->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
