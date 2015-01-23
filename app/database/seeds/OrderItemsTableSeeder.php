<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderItemsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        
        $orders = Order::all();
        foreach($orders as $order)
		{
            foreach(range(1,5) as $index)
            {
                $food = Food::orderBy(DB::raw('RAND()'))->first();
                $q = rand(1,4);
                $order->items()->save(OrderItem::create([
				'food_id' => $food->id,
				'food_name' => $food->name,
				'price' => ((rand(40,400)/10)*10),
				'quantity' => $q
			]));
            
            }
        }
	}

}
