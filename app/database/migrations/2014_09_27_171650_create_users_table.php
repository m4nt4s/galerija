<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('email', 50)->unique();
			$table->string('username', 20);
			$table->string('name', 16);
			$table->string('surname', 16);
			$table->string('password', 64);
			$table->string('city', 64);
			$table->string('country', 64);
			$table->string('address', 64);
			$table->string('phone', 64);
			$table->string('code', 60);
			$table->integer('admin');
			$table->integer('active');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
