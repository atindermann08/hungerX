<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderdetailsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$food = Food::orderBy(DB::raw('RAND()'))->first();
			$orderId = Order::orderBy(DB::raw('RAND()'))->first()->id;
			Orderdetail::create([
				'order_id' => $orderId,
				'food_id' => $food->id,
				'food_name' => $food->name,
				'price' => rand(20,500),
				'quantiry' => rand(1,4)
			]);
		}
	}

}
