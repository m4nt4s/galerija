<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		$category = ['Gyvūnai', 'Gamta', 'Žmonės', 'Miestas','Sportas'];

		foreach(range(1, 5) as $index)
		{
			Category::create([
				'name' => $category[$index-1]
			]);
		}
	}

}