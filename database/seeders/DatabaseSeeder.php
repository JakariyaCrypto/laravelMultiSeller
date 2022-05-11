<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
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
        User::factory(20)->create();
    }
}
