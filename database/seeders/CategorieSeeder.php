<?php
#fonction fait main, mais remplissage des données ai
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
            "Loisirs & jeux",
            "Électroménager",
            "Vêtements",
            "Livres",
            "Accessoires",
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(["title" => $category]);
        }
    }
}
