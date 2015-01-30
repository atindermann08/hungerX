<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        
		foreach(range(1, 15) as $index)
		{
			$userId = User::where('email','LIKE', 'customer%')->orderBy(DB::raw('RAND()'))->first()->id;
			$restaurantId = Restaurant::orderBy(DB::raw('RAND()'))->first()->id;
			$addressId = Address::orderBy(DB::raw('RAND()'))->first()->id;

			Order::create([
				'user_id' => $userId,
				'restaurant_id' => $restaurantId,
				'order_number' => rand(89123131,321312414),
				'address_id' => $addressId,
				'payment_status' => 'Pending',
				'payment_type' => 'Online',
				'delivery_status' => 'Under Processing'
			]);
		}
	}

}
