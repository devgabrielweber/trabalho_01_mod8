<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\HospedesSeeder;
use Database\Seeders\QuartosSeeder;
use Database\Seeders\ReservasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            HospedesSeeder::class,
            QuartosSeeder::class,
            ReservasSeeder::class,
            ChaleSeeder::class
        ]);
    }
}
