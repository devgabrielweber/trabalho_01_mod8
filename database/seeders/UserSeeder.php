<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                "name"=> "weber",
                "email"=> "weber@weber.com",
                "password"=> bcrypt("weber"),
            ],[
                "name"=> "hiury",
                "email"=> "hiury@hiury.com",
                "password"=> bcrypt("hiury"),
            ]
            ];
 
        foreach ($users as $user) {
                \DB::table("users")->insert($user);
        }
    }
}