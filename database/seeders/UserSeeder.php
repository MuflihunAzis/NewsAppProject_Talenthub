<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ambil role dari database
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $wartawanRole = Role::where('name', 'wartawan')->first();

        // Buat beberapa pengguna dengan peran yang sesuai
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'phone_number' => '1234567890',
            'address' => 'Admin Address',
            'profile_photo' => 'images/pic-admin.png',
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Anggi Marito',
            'email' => 'editor@mail.com',
            'password' => Hash::make('password'),
            'phone_number' => '0987654321',
            'address' => 'Editor Address',
            'profile_photo' => 'images/pic-editor.png',
            'role_id' => $editorRole->id,
        ]);

        User::create([
            'name' => 'Bernadya',
            'email' => 'wartawan@mail.com',
            'password' => Hash::make('password'),
            'phone_number' => '1122334455',
            'address' => 'Wartawan Address',
            'profile_photo' => 'images/pic-wartawan.png',
            'role_id' => $wartawanRole->id,
        ]);
    }
}
