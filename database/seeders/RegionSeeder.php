<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];

        foreach ($regions as $region) {
            Region::create(['name' => $region]);
        }
    }
}
