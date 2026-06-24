<?php

namespace Database\Seeders;

use App\Models\Porudzbina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PorudzbinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Porudzbina::create([
            "ime" => "user",
            "email" => "user@pwa.rs",
            "katalog_id" => 1,
            "user_id" => 1,
        ]);

        Porudzbina::create([
            "ime" => "user",
            "email" => "user@pwa.rs",
            "katalog_id" => 2,
            "user_id" => 1,
        ]);

        Porudzbina::create([
            "ime" => "user",
            "email" => "user@pwa.rs",
            "katalog_id" => 3,
            "user_id" => 1,
        ]);

        Porudzbina::create([
            "ime" => "Nikola Nikolic",
            "email" => "nikola@pwa.rs",
            "katalog_id" => 5,
            "user_id" => 5,
        ]);

        Porudzbina::create([
            "ime" => "Pera Peric",
            "email" => "pera@pwa.rs",
            "katalog_id" => 4,
            "user_id" => 4,
        ]);
    }
}
