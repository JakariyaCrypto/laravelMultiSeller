<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeederTable::class);
        \App\Models\User::factory(20)->create();
        \App\Models\backend\admin\Brand::factory(20)->create();
        \App\Models\backend\admin\Product::factory(2)->create();
        \App\Models\backend\admin\Size::factory(5)->create();
        \App\Models\backend\admin\Color::factory(5)->create();
    }
}
