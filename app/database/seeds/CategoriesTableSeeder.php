<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $categories = ['Veg','Non-Veg','Chinese','South Indian','North Indian','Europian','American','Italian','Rice','Spicy','Desserts'];
		foreach(range(1, 11) as $index)
		{
			Category::create([
                'name' => $categories[$index-1]
			]);
		}
	}

}