<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AreaRestaurantTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        foreach(range(1, 10) as $index)
		{
            $restaurant = Restaurant::find($index);
            $start = rand(1,4);
            $end = rand(8,10);
            foreach(range($start, $end) as $i)
            {
                $restaurant->deliveryAreas()->save(Area::find($i));
            }
		}
	}

}
