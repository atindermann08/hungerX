<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 60);
			$table->text('description', 500);
			$table->integer('area_id');
			$table->boolean('pure_veg')->default(true);
			$table->integer('min_order');
			$table->integer('delivery_fee');
			$table->integer('delivery_time')->unsigned();
			$table->boolean('online_payment')->default(true);
			$table->boolean('cash_on_delivery')->default(true);
			$table->boolean('preorder')->default(true);
			$table->boolean('pickup')->default(true);
			$table->time('order_start_time');
			$table->time('order_stop_time');
			$table->boolean('active');
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
		Schema::drop('restaurants');
	}

}
