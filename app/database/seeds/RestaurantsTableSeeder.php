<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RestaurantsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Restaurant::create([
                'name' => $faker->name(),
                'description' => $faker->realText(150),
                'area_id' => rand(1,12),
                'pure_veg' => $faker->boolean($chanceOfGettingTrue = 50),
                'min_order' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000),
                'delivery_fee' => $faker->randomFloat($nbMaxDecimals = 0, $min = 20, $max = 100),
                'delivery_time' => $faker->numberBetween($min = 20, $max = 80),
                'online_payment' => $faker->boolean($chanceOfGettingTrue = 50),
                'cash_on_delivery' => $faker->boolean($chanceOfGettingTrue = 50),
                'preorder' => $faker->boolean($chanceOfGettingTrue = 50),
                'pickup' => $faker->boolean($chanceOfGettingTrue = 50),
                'order_start_time' => $faker->time($format = 'H:i:s', $max = 'now'),
                'order_stop_time' => $faker->time($format = 'H:i:s', $max = 'now'),
                'active' => $faker->boolean($chanceOfGettingTrue = 50),
                
			]);
		}
	}

}