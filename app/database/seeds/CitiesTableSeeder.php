<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('en_IN');

		foreach(range(1, 4) as $index)
		{
			City::create([
                'name' => $faker->city(),
                'state_id' => 1
			]);
		}
	}

}