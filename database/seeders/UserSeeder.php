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
        $camille = User::firstOrCreate(
            ["email" => "manu@test.ch"],
            [
                "name" => "manu",
                "password" => bcrypt("password"), // hasher le mdp
                "neighborhood" => "Quartier des Tilleuls",
                "bio" => "Je vide mon appartement, tout doit partir.",
                "is_verified" => true,
            ]
        );

        $sofiane = User::firstOrCreate(
            ["email" => "adam@example.com"],
            [
                "name" => "adam",
                "password" => bcrypt("password"), // hasher le mdp
                "neighborhood" => "Centre-ville",
                "is_verified" => true,
            ]
        );
    }
}
