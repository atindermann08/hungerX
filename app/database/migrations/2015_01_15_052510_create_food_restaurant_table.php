<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodRestaurantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_restaurant', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('food_id')->unsigned()->index();
			$table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
			$table->integer('restaurant_id')->unsigned()->index();
			$table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
			$table->integer('price');
			$table->boolean('in_stock')->default(true);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('food_restaurant');
	}

}
