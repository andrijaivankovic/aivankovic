<?php

namespace Database\Seeders;

use App\Models\Istaknuto;
use App\Models\Katalog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            IstaknutoSeeder::class,
            KatalogSeeder::class,
            UserSeeder::class,
            PorudzbinaSeeder::class,
            KomentarSeeder::class,
        ]);
    }
}
