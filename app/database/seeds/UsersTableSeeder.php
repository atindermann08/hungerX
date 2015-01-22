<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

//aslo need to confirm users here
    public function run()
    {
        //User::truncate();

        //super admin
        $user = new User;
        $user->username = 'mann';
        $user->email = 'atindermann08@gmail.com';
        $user->password = 'mann';
        $user->password_confirmation = 'mann';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }


        //admin
        $user = new User;
        $user->username = 'admin';
        $user->email = 'admin@hungerexpert.in';
        $user->password = 'hungerexpert';
        $user->password_confirmation = 'hungerexpert';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }


        //employees
        $user = new User;
        $user->username = 'employee';
        $user->email = 'employee@hungerexpert.in';
        $user->password = 'employee';
        $user->password_confirmation = 'employee';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->username = 'employee1';
        $user->email = 'employee1@hungerexpert.in';
        $user->password = 'employee1';
        $user->password_confirmation = 'employee1';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }


        //restaurants
        $user = new User;
        $user->username = 'restaurant';
        $user->email = 'restaurant@hungerexpert.in';
        $user->password = 'restaurant';
        $user->password_confirmation = 'restaurant';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->username = 'restaurant1';
        $user->email = 'restaurant1@hungerexpert.in';
        $user->password = 'restaurant1';
        $user->password_confirmation = 'restaurant1';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->username = 'restaurant2';
        $user->email = 'restaurant2@hungerexpert.in';
        $user->password = 'restaurant2';
        $user->password_confirmation = 'restaurant2';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }



        //customers
        $user = new User;
        $user->username = 'customer';
        $user->email = 'customer@hungerexpert.in';
        $user->password = 'customer';
        $user->password_confirmation = 'customer';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->username = 'customer1';
        $user->email = 'customer1@hungerexpert.in';
        $user->password = 'customer1';
        $user->password_confirmation = 'customer1';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->username = 'customer2';
        $user->email = 'customer2@hungerexpert.in';
        $user->password = 'customer2';
        $user->password_confirmation = 'customer2';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->username, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
        }

    }

}
