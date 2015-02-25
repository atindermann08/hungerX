<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserPermissionRoleSeeder extends Seeder {

  public function run()
  {
    //get users
    $mann = User::where('email', 'LIKE', 'demo%')->first();
    $admin = User::where('email', '=', 'admin@hungerexpert.in')->first();
    $employee = User::where('email', 'LIKE', 'employee%')->first();
    $employee1 = User::where('email', 'LIKE', 'employee1%')->first();
    $restaurant = User::where('email', 'LIKE', 'restaurant%')->first();
    $restaurant1 = User::where('email', 'LIKE', 'restaurant1%')->first();
    $restaurant2 = User::where('email', 'LIKE', 'restaurant2%')->first();
    $customer = User::where('email', 'LIKE', 'customer%')->first();
    $customer1 = User::where('email', 'LIKE', 'customer1%')->first();
    $customer2 = User::where('email', 'LIKE', 'customer2%')->first();

    //get roles
    $superAdminRole = Role::where('name','=','SuperAdmin')->first();
    $adminRole = Role::where('name','=','Admin')->first();
    $employeeRole = Role::where('name','=','Employee')->first();
    $restaurantRole = Role::where('name','=','Restaurant')->first();
    $customerRole = Role::where('name','=','Customer')->first();



    //assign roles
    $mann->roles()->attach( $superAdminRole->id );
    $admin->roles()->attach( $adminRole->id );
    $employee->roles()->attach( $employeeRole->id );
    $employee1->roles()->attach( $employeeRole->id );
    $restaurant->roles()->attach( $restaurantRole->id );
    $restaurant1->roles()->attach( $restaurantRole->id );
    $restaurant2->roles()->attach( $restaurantRole->id );
    $customer->roles()->attach( $customerRole->id );
    $customer1->roles()->attach( $customerRole->id );
    $customer2->roles()->attach( $customerRole->id );


    //get permissions
    $manageUsers = Permission::where('name','=','manage_users')->first();
    $managePermissions = Permission::where('name','=','manage_permissions')->first();
    $manageRoles = Permission::where('name','=','manage_roles')->first();
    $manageRestaurants = Permission::where('name','=','manage_restaurants')->first();
    $createRestaurants = Permission::where('name','=','create_restaurants')->first();
    $manageOrders = Permission::where('name','=','manage_orders')->first();
    $manageLocations = Permission::where('name','=','manage_locations')->first();

    //dd($managePermissions->id);
    //assign permissions
    $superAdminRole->perms()->sync([$manageUsers->id, $managePermissions->id, $manageRoles->id, $manageRestaurants->id, $manageOrders->id, $manageLocations->id]);
    $adminRole->perms()->sync([$manageUsers->id, $manageRestaurants->id, $manageOrders->id, $manageLocations->id]);
    $employeeRole->perms()->sync([$manageRestaurants->id, $createRestaurants->id, $manageOrders->id]);
    $restaurantRole->perms()->sync([$manageRestaurants->id, $manageOrders->id]);
    $customerRole->perms()->sync([$manageOrders->id]);

  }

}
