<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		//can create user
		$permission = new Permission;
		$permission->name = 'can_create_user';
		$permission->display_name = 'Can Create User';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can create role
		$permission = new Permission;
		$permission->name = 'can_create_role';
		$permission->display_name = 'Can Create Role';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can create permission
		$permission = new Permission;
		$permission->name = 'can_create_permission';
		$permission->display_name = 'Can Create Permission';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can create restaurant
		$permission = new Permission;
		$permission->name = 'can_create_restaurant';
		$permission->display_name = 'Can Create Restaurant';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can view orders
		$permission = new Permission;
		$permission->name = 'can_view_orders';
		$permission->display_name = 'Can View Orders';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

	}

}
