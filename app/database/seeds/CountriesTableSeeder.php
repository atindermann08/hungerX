<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1,1) as $index)
		{
			Country::create([
                'name' => 'India'
			]);
		}
	}

}