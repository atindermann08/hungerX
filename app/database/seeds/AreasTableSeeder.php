<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AreasTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 12) as $index)
		{
			Area::create([
                'name' =>  'Sector '.rand(1,10),
                'city_id' => rand(1,4)                
			]);
		}
	}

}