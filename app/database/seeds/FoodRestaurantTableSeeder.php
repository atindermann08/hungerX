<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FoodRestaurantTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        
		foreach(range(1, 10) as $index)
		{            
            $restaurant = Restaurant::find($index);
            $start = rand(1,10);
            $end = rand(30,40);
            foreach(range($start, $end) as $i)
            {
                $restaurant->foods()->save(Food::find($i));
            }
		}
        
        $pivots = DB::table('food_restaurant')->get();
        $index = 0;
        foreach($pivots as $pivot)
		{          
            $index++;
            DB::table('food_restaurant')->where('id', $index)->update(array('price' => rand(20,200)));
		}
	}
    
}
