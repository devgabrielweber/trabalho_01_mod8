<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AlunoSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //php artisan db:seed //executa os seeds
        //php artisan migrate --seed //execulta os seeds junto com o migrate
        //php artisan migrate:fresh --seed //execulta os seeds junto com a recriação do banco
        $this->call([
            TurmaSeeder::class,
            AlunoSeeder::class
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
