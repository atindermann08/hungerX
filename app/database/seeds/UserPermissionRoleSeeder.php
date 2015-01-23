<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserPermissionsRoleSeeder extends Seeder {

  public function run()
  {
    //get users
    $mann = User::where('username', '=', 'mann');
    $admin = User::where('username', '=', 'admin');
    $employee = User::where('username', '=', 'employee');
    $employee1 = User::where('username', '=', 'employee1');
    $restaurant = User::where('username', '=', 'restaurant');
    $restaurant1 = User::where('username', '=', 'restaurant1');
    $restaurant2 = User::where('username', '=', 'restaurant2');
    $customer = User::where('username', '=', 'customer');
    $customer1 = User::where('username', '=', 'customer1');
    $customer2 = User::where('username', '=', 'customer2');

    //get roles
    $superAdminRole = Role::where('name','=','super_admin');
    $adminRole = Role::where('name','=','admin');
    $employeeRole = Role::where('name','=','employee');
    $restaurantRole = Role::where('name','=','restaurant');
    $customerRole = Role::where('name','=','customer');


    //assign roles
    $mann->attachRole($supreAdminRole);
    $admin->attachRole($adminRole);
    $employee->attachRole($employeeRole);
    $employee1->attachRole($employeeRole);
    $restaurant->attachRole($restaurantRole);
    $restaurant1->attachRole($restaurantRole);
    $restaurant2->attachRole($restaurantRole);
    $customer->attachRole($customerRole);
    $customer1->attachRole($customerRole);
    $customer2->attachRole($customerRole);
      
      
    //get permissions  
    $manageUsers = Permission::where('name','=','can_manage_users');
    $managePermissions = Permission::where('name','=','can_manage_premissions');
    $manageRoles = Permission::where('name','=','can_manage_roles');
    $manageRestaurants = Permission::where('name','=','can_manage_restaurants');
    $createRestaurants = Permission::where('name','=','can_create_restaurants');
    $manageOrders = Permission::where('name','=','can_manage_orders');
    $manageLocations = Permission::where('name','=','can_manage_locations');
      
    //assign permissions
    $mann->perms()->sync([$manageUsers->id, $managePermissions->id, $manageRoles->id, $manageRestaurants->id, $manageOrders->id, $manageLocations->id]);
    $admin->perms()->sync([$manageUsers->id, $manageRestaurants->id, $manageOrders->id, $manageLocations->id]);
    $employee->perms()->sync([$manageRestaurants->id, $createRestaurants->id, $manageOrders->id]);
    $employee1->perms()->sync([$manageRestaurants->id, $createRestaurants->id, $manageOrders->id]);
    $restaurant->perms()->sync([$manageRestaurants->id, $manageOrders->id]);
    $restaurant1->perms()->sync([$manageRestaurants->id, $manageOrders->id]);
    $restaurant2->perms()->sync([$manageRestaurants->id, $manageOrders->id]);
    $customer->perms()->sync([$manageOrders->id]);
    $customer1->perms()->sync([$manageOrders->id]);
    $customer2->perms()->sync([$manageOrders->id]);
      

  }

}
