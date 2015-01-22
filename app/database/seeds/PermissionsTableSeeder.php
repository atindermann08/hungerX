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

		
	}

}
