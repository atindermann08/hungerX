<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FoodsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Food::create([
                'name' => $faker->name(),
                'category_id' => rand(1,11),
                'veg' => $faker->boolean($chanceOfGettingTrue = 50)
			]);
		}
	}

}