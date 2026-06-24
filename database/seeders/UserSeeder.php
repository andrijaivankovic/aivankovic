<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "user",
            "email" => "user@pwa.rs",
            "role" => "user",
            "password" => "user"
        ]);

        User::create([
            "name" => "editor",
            "email" => "editor@pwa.rs",
            "role" => "editor",
            "password" => "editor"
        ]);

        User::create([
            "name" => "admin",
            "email" => "admin@pwa.rs",
            "role" => "admin",
            "password" => "admin"
        ]);

        User::create([
            "name" => "Pera Peric",
            "email" => "pera@pwa.rs",
            "role" => "user",
            "password" => "pera"
        ]);

        User::create([
            "name" => "Nikola Nikolic",
            "email" => "nikola@pwa.rs",
            "role" => "user",
            "password" => "nikola"
        ]);
    }
}
