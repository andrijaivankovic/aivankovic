<?php

namespace Database\Seeders;

use App\Models\Istaknuto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IstaknutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Istaknuto::create([
            "naziv" => "Novo u Ponudi"
        ]);

        Istaknuto::create([
            "naziv" => "Letnja Kolekcija"
        ]);

        Istaknuto::create([
            "naziv" => "Premium Kolekcija"
        ]);

        Istaknuto::create([
            "naziv" => "Domaci Sitni Kolaci"
        ]);

        Istaknuto::create([
            "naziv" => "Rodjendanske i Svecane Torte"
        ]);
    }
}
