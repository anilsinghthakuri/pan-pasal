<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name'=>'anil',
            'email' => 'anilsingh@dotsoftech.com',
            'password' => Hash::make('123')
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
    }
}
