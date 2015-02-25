<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

//aslo need to confirm users here
    public function run()
    {
        //User::truncate();
        $faker = Faker::create('en_IN');

        //super admin
        $user = new User;
        $user->firstname = 'Demo';
        $user->lastname = 'Mod';
        $user->mobile = '9463161042';
        $user->email = 'demo@hungerexpert.in';
        $user->password = 'demodemo';
        $user->password_confirmation = 'demodemo';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }


        //admin
        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999900001';
        $user->email = 'admin@hungerexpert.in';
        $user->password = 'adminadmin';//hungerexpert
        $user->password_confirmation = 'adminadmin';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }


        //employees
        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999922221';
        $user->email = 'employee@hungerexpert.in';
        $user->password = 'employee';
        $user->password_confirmation = 'employee';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999922222';
        $user->email = 'employee1@hungerexpert.in';
        $user->password = 'employee1';
        $user->password_confirmation = 'employee1';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }


        //restaurants
        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = "lastname";
        $user->mobile = '9999933331';
        $user->email = 'restaurant@hungerexpert.in';
        $user->password = 'restaurant';
        $user->password_confirmation = 'restaurant';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999933332';
        $user->email = 'restaurant1@hungerexpert.in';
        $user->password = 'restaurant1';
        $user->password_confirmation = 'restaurant1';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999933333';
        $user->email = 'restaurant2@hungerexpert.in';
        $user->password = 'restaurant2';
        $user->password_confirmation = 'restaurant2';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }



        //customers
        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999944441';
        $user->email = 'customer@hungerexpert.in';
        $user->password = 'customer';
        $user->password_confirmation = 'customer';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
            Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
            Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999944442';
        $user->email = 'customer1@hungerexpert.in';
        $user->password = 'customer1';
        $user->password_confirmation = 'customer1';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }

        $user = new User;
        $user->firstname = $faker->firstName();
        $user->lastname = $faker->lastName();
        $user->mobile = '9999944443';
        $user->email = 'customer2@hungerexpert.in';
        $user->password = 'customer2';
        $user->password_confirmation = 'customer2';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = true;

        if(! $user->save()) {
          Log::info('Unable to create user '.$user->firstname, (array)$user->errors());
        } else {
          Log::info('Created user "'.$user->firstname.'" <'.$user->email.'>');
        }

    }

}
