<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
            'category_image'=>'food1.jpg',

        ]);

        DB::table('tables')->insert([
            'table_name'=>'table1',

        ]);
        DB::table('tables')->insert([
            'table_name'=>'table2',

        ]);
        DB::table('tables')->insert([
            'table_name'=>'table3',

        ]);

        DB::table('products')->insert([
            'product_name'=>'chickenMOMO',
            'product_price' => 200,
            'product_image' => 'food1.jpg',
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'product_name'=>'steemMOMO',
            'product_price' => 100,
            'product_image' => 'food2.jpg',
            'category_id' => 1,
        ]);
        DB::table('users')->insert([
            'name'=>'anil',
            'email' => 'anilsingh@dotsoftech.com',
            'password' => '$2y$10$sWwb7nxxcYu/SeX1h.RMU.F1rX8jUdz5tlhMDqqR4.UAz.tCGj3.K',
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
        DB::table('payment_methods')->insert([
            'payment_method_name'=>'credit',
        ]);
        DB::table('customers')->insert([
            'customer_username'=>'walkin',
            'customer_phone'=>'0000000000',
            'customer_address'=>'xxxxxxxx',
        ]);
    }
}
