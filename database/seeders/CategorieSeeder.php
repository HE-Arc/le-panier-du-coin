<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Vélos & vélocipédie",
            "Maison & meubles",
            "Loisir & jeux",
            "Electroménager",
            "Vêtement",
        ];

        foreach ($categories as $category) {
            Category::firstOrCreat(["title" => $category]);
        }
    }
}
