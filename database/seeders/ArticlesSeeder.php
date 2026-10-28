<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manu = User::where("email", "manu@test.ch")->firstOrFail();
        $adam = User::where("email", "adam@example.com")->firstOrFail();

        $articles = [
            [
                "title" => "Vélo de ville — 3 vitesses",
                "description" => "Vélo de ville 3 vitesses à cadre bas, entretenu régulièrement. Chaîne et patins remplacés le mois dernier, pneus neufs.",
                "location" => "Quartier des Tilleuls",
                "price" => 45.00,
                "brand" => "Peugeot",
                "availability" => "En semaine après 18 h",
                "condition" => ArticleCondition::Good,
                "status" => ArticleStatus::Available,
                "negotiable" => true,
                "category" => "Vélos & vélocipédie",
                "seller" => $manu,
                "published_at" => now()->subHours(2),
            ],
            [
                "title" => "Trottinette pliable adulte",
                "description" => "Trottinette légère, pliage rapide, roues en bon état. Idéale pour les trajets courts.",
                "location" => "Centre-ville",
                "price" => 60.00,
                "brand" => "Decathlon",
                "availability" => "Week-end",
                "condition" => ArticleCondition::LikeNew,
                "status" => ArticleStatus::Available,
                "negotiable" => false,
                "category" => "Vélos & vélocipédie",
                "seller" => $adam,
                "published_at" => now()->subHours(4),
            ],
            [
                "title" => "Tabouret de bar en bois",
                "description" => "Tabouret en chêne massif, hauteur 75 cm. Quelques traces d'usage sur le repose-pieds.",
                "location" => "Quartier des Tilleuls",
                "price" => 15.00,
                "brand" => "Maison du bois",
                "availability" => "Tous les jours",
                "condition" => ArticleCondition::Fair,
                "status" => ArticleStatus::Available,
                "negotiable" => true,
                "category" => "Maison & meubles",
                "seller" => $manu,
                "published_at" => now()->subDay(),
            ],
            [
                "title" => "Lot de 12 romans jeunesse",
                "description" => "Collection complète, très bon état, aucun dos cassé. Idéal pour 8-12 ans.",
                "location" => "Quartier des Tilleuls",
                "price" => 8.00,
                "brand" => "Gallimard",
                "availability" => "En soirée",
                "condition" => ArticleCondition::Good,
                "status" => ArticleStatus::Available,
                "negotiable" => true,
                "category" => "Livres",
                "seller" => $manu,
                "published_at" => now()->subDays(2),
            ],
            [
                "title" => "Cache-pots en terre cuite (x3)",
                "description" => "Trois cache-pots de tailles différentes, sans fêlure.",
                "location" => "Faubourg Nord",
                "price" => 12.00,
                "brand" => "Artisanal",
                "availability" => "Mercredi et samedi",
                "condition" => ArticleCondition::Good,
                "status" => ArticleStatus::Available,
                "negotiable" => false,
                "category" => "Maison & meubles",
                "seller" => $adam,
                "published_at" => now()->subDays(3),
            ],
            [
                "title" => "Machine à café à grains",
                "description" => "Fonctionne parfaitement, détartrage récent. Bac à grains 250 g.",
                "location" => "Centre-ville",
                "price" => 70.00,
                "brand" => "Delonghi",
                "availability" => "Sur rendez-vous",
                "condition" => ArticleCondition::LikeNew,
                "status" => ArticleStatus::Available,
                "negotiable" => true,
                "category" => "Électroménager",
                "seller" => $adam,
                "published_at" => now()->subDays(4),
            ],
            [
                "title" => "Annonce en brouillon (ne doit pas s'afficher)",
                "description" => "Test du filtre de statut.",
                "location" => "Centre-ville",
                "price" => 10.00,
                "brand" => "Test",
                "availability" => "—",
                "condition" => ArticleCondition::NotWorking,
                "status" => ArticleStatus::Draft,
                "negotiable" => true,
                "category" => "Accessoires",
                "seller" => $manu,
                "published_at" => null,
            ],
        ];

        foreach ($articles as $data) {
            $category = Category::firstOrCreate(["title" => $data["category"]]);

            unset($data["category"]);

            Article::firstOrCreate(
                ["title" => $data["title"]],
                array_merge($data, [
                    "category_id" => $category->id,
                ])
            );
        }
    }
}
