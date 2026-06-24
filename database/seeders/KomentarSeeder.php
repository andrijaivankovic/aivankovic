<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komentar::create([
            "komentar" => "Mango Vanilla je prelep kolac,cela porodica i ja ga obozavamo!",
            "ocena" => 5,
            "katalog_id" => 1,
            "user_id" => 1,
        ]);

        Komentar::create([
            "komentar" => "Mango Vanilla je najlepsi kolac na svetu!",
            "ocena" => 5,
            "katalog_id" => 1,
            "user_id" => 2,
        ]);

        Komentar::create([
            "komentar" => "Pun Pogodak!",
            "ocena" => 5,
            "katalog_id" => 1,
            "user_id" => 1,
        ]);

        Komentar::create([
            "komentar" => "Noisette-Choco kolac mi je omiljeni!",
            "ocena" => 5,
            "katalog_id" => 2,
            "user_id" => 4,
        ]);

        Komentar::create([
            "komentar" => "Samo bih ovaj kolac jeo!",
            "ocena" => 5,
            "katalog_id" => 2,
            "user_id" => 5,
        ]);
    }
}
