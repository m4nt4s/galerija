<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PhotosTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $cat = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'sports'];
        //$category = ['Gyvūnai', 'Gamta', 'Žmonės', 'Miestas', 'Miestas', 'Gamta', 'Maistas', 'Gyvūnai', 'Gyvūnai', 'Žmonės'];

        foreach (range(1, 10) as $index)
        {
            Photo::create([
                'category_id' => rand(1, 5),
                'title' => $faker->sentence(5),
                'img'   => $faker->imageUrl($width = 750, $height = 450, $cat[$index-1]),
            ]);
        }
    }

}