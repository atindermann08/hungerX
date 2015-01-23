<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        
		$this->call('CountriesTableSeeder');
		$this->call('StatesTableSeeder');
		$this->call('CitiesTableSeeder');
		$this->call('AreasTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('RestaurantsTableSeeder');
		$this->call('FoodsTableSeeder');
		$this->call('FoodRestaurantTableSeeder');
		$this->call('AreaRestaurantTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('AddressesTableSeeder');
		$this->call('OrdersTableSeeder');
		$this->call('OrderItemsTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('UserPermissionRoleSeeder');

        
	}

}
