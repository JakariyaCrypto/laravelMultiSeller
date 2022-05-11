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
            // admin
            [
                'name'=> 'admin jk',
                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('admin'),
                'role'=> 'admin',
                'status'=> 'active',

            ],
             // vendor
             [
                'name'=> 'vendor jk',
                'email'=> 'vendor@gmail.com',
                'password'=> Hash::make('vendor'),
                'role'=> 'vendor',
                'status'=> 'active',

            ],

             // admin
             [
                'name'=> 'customer jk',
                'email'=> 'customer@gmail.com',
                'password'=> Hash::make('customer'),
                'role'=> 'customer',
                'status'=> 'active',

            ],
        ]);
    }
}
