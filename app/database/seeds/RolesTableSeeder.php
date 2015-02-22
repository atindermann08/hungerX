<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		//super admin
		$role = new Role;
		$role->name = 'Super Admin';
		if(! $role->save()) {
			Log::info('Unable to create role '.$role->name, (array)$role->errors());
		} else {
			Log::info('Created role "'.$role->name.'"');
		}

		//admin
		$role = new Role;
		$role->name = 'Admin';

		if(! $role->save()) {
			Log::info('Unable to create role '.$role->name, (array)$role->errors());
		} else {
			Log::info('Created role "'.$role->name.'"');
		}

		//employee
		$role = new Role;
		$role->name = 'Employee';

		if(! $role->save()) {
			Log::info('Unable to create role '.$role->name, (array)$role->errors());
		} else {
			Log::info('Created role "'.$role->name.'"');
		}

		//restaurant
		$role = new Role;
		$role->name = 'Restaurant';

		if(! $role->save()) {
			Log::info('Unable to create role '.$role->name, (array)$role->errors());
		} else {
			Log::info('Created role "'.$role->name.'"');
		}

		//customer
		$role = new Role;
		$role->name = 'Customer';

		if(! $role->save()) {
			Log::info('Unable to create role '.$role->name, (array)$role->errors());
		} else {
			Log::info('Created role "'.$role->name.'"');
		}

	}

}
