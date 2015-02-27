<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('restaurant_id');
			$table->integer('address_id');
			$table->boolean('pickup')->default(false);
			$table->boolean('delivery_later')->default(false);
			$table->date('delivery_date')->nullable;
			$table->time('delivery_time')->nullable;
			$table->boolean('payment_status');
			$table->string('payment_type');
			$table->string('delivery_status');
			$table->integer('total');
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
		Schema::drop('orders');
	}

}
