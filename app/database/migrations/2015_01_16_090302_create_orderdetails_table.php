<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderdetails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('food_id');
			$table->string('food_name');
			$table->float('price', 10,2);
			$table->integer('quantity')->unsigned();
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
		Schema::drop('orderdetails');
	}

}
