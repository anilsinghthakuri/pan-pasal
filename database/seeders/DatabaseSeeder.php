<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'owner']);
        Role::create(['name'=>'accountant']);
        Role::create(['name'=>'user']);

        DB::table('categories')->insert([
            'category_name'=>'momo',
        ]);

        DB::table('tables')->insert([
            'table_name'=>'customer',
        ]);


        DB::table('products')->insert([
            'product_name'=>'chickenMOMO',
            'product_price' => 200,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'product_name'=>'steemMOMO',
            'product_price' => 100,
            'category_id' => 1,
        ]);

        DB::table('users')->insert([
            'name'=>'admin',
            'email' => 'admin@user.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name'=>'owner',
            'email' => 'owner@user.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name'=>'accountant',
            'email' => 'accountant@user.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('companydatas')->insert([
            'company_name'=>'Dotsoftech',
            'company_address' => 'Dhangadhi kailali',
            'company_number' => '9868706545',
            'company_logo'=>'logo.png',
            'company_currency'=>'RS'
        ]);
        DB::table('payment_methods')->insert([
            'payment_method_name'=>'cash',
        ]);

        DB::table('customers')->insert([
            'customer_username'=>'walkin',
            'customer_phone'=>'0000000000',
            'customer_address'=>'xxxxxxxx',
        ]);


       $user = User::findorfail(1);
       $user->assignRole('admin');

       $user = User::findorfail(2);
       $user->assignRole('owner');

       $user = User::findorfail(3);
       $user->assignRole('accountant');

        //for create permession in the app
        Permission::create(['name'=>'view']);
        Permission::create(['name'=>'edit']);
        Permission::create(['name'=>'create']);
        Permission::create(['name'=>'delete']);
        Permission::create(['name'=>'pos']);



        $role = Role::findbyid(1);
        $role->givePermissionTo(Permission::all());

        $role = Role::findbyid(2);
        $role->givePermissionTo(Permission::all());

        $role = Role::findbyid(3);
        $role->givePermissionTo('pos');
    }
}
