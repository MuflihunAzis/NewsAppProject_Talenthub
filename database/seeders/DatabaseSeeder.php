<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Panggil RoleSeeder dan UserSeeder
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            RegionSeeder::class,
        ]);
    }
}
