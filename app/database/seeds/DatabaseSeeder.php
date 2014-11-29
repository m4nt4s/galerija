<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        Photo   ::truncate();
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PhotosTableSeeder');
		$this->call('CategoryTableSeeder');
	}

}
