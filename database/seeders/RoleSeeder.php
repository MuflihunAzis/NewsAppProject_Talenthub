<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Definisikan roles yang akan ditambahkan
        $roles = ['admin', 'editor', 'wartawan'];

        // Loop untuk menambahkan roles ke database
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
