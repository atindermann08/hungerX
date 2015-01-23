<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		//can create user
		$permission = new Permission;
		$permission->name = 'manage_users';
		$permission->display_name = 'Can Manage Users';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can create role
		$permission = new Permission;
		$permission->name = 'manage_roles';
		$permission->display_name = 'Can Manage Roles';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can create permission
		$permission = new Permission;
		$permission->name = 'manage_permissions';
		$permission->display_name = 'Can Manage Permissions';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can manage restaurant
		$permission = new Permission;
		$permission->name = 'create_restaurants';
		$permission->display_name = 'Can Create Restaurants';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}
        
        $permission = new Permission;
		$permission->name = 'manage_restaurants';
		$permission->display_name = 'Can Manage Restaurants';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can view orders
		$permission = new Permission;
		$permission->name = 'manage_orders';
		$permission->display_name = 'Can Manage Orders';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

		//can view locations
		$permission = new Permission;
		$permission->name = 'manage_locations';
		$permission->display_name = 'Can Manage Locations';

		if(! $permission->save()) {
			Log::info('Unable to create permission '.$permission->name, (array)$permission->errors());
		} else {
			Log::info('Created permission "'.$permission->name.'"');
		}

	}

}
