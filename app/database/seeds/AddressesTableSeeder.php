<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AddressesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 15) as $index)
		{
			$userId = User::orderBy(DB::raw('RAND()'))->first()->id;
			$areaId = Area::orderBy(DB::raw('RAND()'))->first()->id;
			Address::create([
				'name' => 'Home',
				'user_id' => $userId,
				'area_id' => $areaId,
				'house_no' => rand(1,100),
				'landmark' => $faker->sentence(5),
				'pin_code' => rand(148001, 170009)
			]);
		}
	}

}
