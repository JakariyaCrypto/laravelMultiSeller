<?php

namespace Database\Seeders;
use DB;
use Hash;
use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

             // customer
             [
                'name'=> 'customer jk',
                'email'=> 'customer@gmail.com',
                'password'=> Hash::make('customer'),
                'status'=> 'active',

            ],
        ]);

        // admin
        DB::table('admins')->insert([
             [
                'name'=> 'Admin Dev',
                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('admin'),
                'status'=> 'active',

            ],
        ]);

        // seller
        DB::table('sellers')->insert([
            'name' => 'Seller Dev',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('seller'),
            'status' => 'active',
        ]);
    }
}
