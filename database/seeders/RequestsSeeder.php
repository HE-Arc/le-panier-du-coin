<?php

// fonction fait main, mais remplissage des données aidé par l'IA

namespace Database\Seeders;

use App\Enums\RequestStatus;
use App\Models\Category;
use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Seeder;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manu = User::where('email', 'manu@test.ch')->firstOrFail();
        $adam = User::where('email', 'adam@example.com')->firstOrFail();


        $requests = [
            [
                'title' => 'Poussette double compacte',
                'description' => 'Deux places côte à côte, pliable dans un coffre de citadine, état propre garanti.',
                'location' => 'Quartier des Tilleuls',
                'budget' => 80.00,
                'status' => RequestStatus::Open,
                'target_date' => now()->addMonth()->toDateString(),
                'category' => 'Loisirs & jeux',
                'requester' => $manu,
                'published_at' => now()->subHours(3),
            ],
            [
                'title' => 'Étagères murales en métal',
                'description' => 'Trois étagères réglables, style industriel, pour équiper un bureau à la maison.',
                'location' => 'Centre-ville',
                'budget' => 30.00,
                'status' => RequestStatus::Open,
                'target_date' => now()->addWeeks(3)->toDateString(),
                'category' => 'Maison & meubles',
                'requester' => $adam,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'VTT taille adolescent',
                'description' => 'Pour un jeune de 14 ans, roue 24 pouces minimum, freins à disque appréciés.',
                'location' => 'Faubourg Nord',
                'budget' => 120.00,
                'status' => RequestStatus::InProgress,
                'target_date' => now()->addMonth()->toDateString(),
                'category' => 'Vélos & vélocipédie',
                'requester' => $adam,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Set de casseroles antiadhésif',
                'description' => 'Cinq pièces minimum, poignées faciles à saisir, sans rayures profondes.',
                'location' => 'Rue des Écoles',
                'budget' => 25.00,
                'status' => RequestStatus::Open,
                'target_date' => now()->addWeeks(2)->toDateString(),
                'category' => 'Électroménager',
                'requester' => $manu,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Vélo pliant pour la navette',
                'description' => "Pour la navette jusqu'à la gare, 6 à 8 vitesses, pliage rapide et sécurisé.",
                'location' => 'Quartier des Tilleuls',
                'budget' => 90.00,
                'status' => RequestStatus::InProgress,
                'target_date' => now()->addWeeks(4)->toDateString(),
                'category' => 'Vélos & vélocipédie',
                'requester' => $manu,
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Livres de terminale',
                'description' => 'Les huit manuels du programme de spécialité maths et physique-chimie.',
                'location' => 'Centre-ville',
                'budget' => 40.00,
                'status' => RequestStatus::Fulfilled,
                'target_date' => now()->addWeeks(6)->toDateString(),
                'category' => 'Livres',
                'requester' => $adam,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => "Demande en brouillon (ne doit pas s'afficher)",
                'description' => "Test du filtre de statut, cette demande ne doit pas apparaître sur la page d'accueil.",
                'location' => 'Centre-ville',
                'budget' => 50.00,
                'status' => RequestStatus::Open,
                'target_date' => now()->addWeeks(8)->toDateString(),
                'category' => 'Accessoires',
                'requester' => $adam,
                'published_at' => null,
            ],
        ];

        foreach ($requests as $data) {
            $requester = $data['requester'];
            $category = Category::firstOrCreate(['title' => $data['category']]);

            unset($data['category'], $data['requester']);

            Request::firstOrCreate(
                ['title' => $data['title']],
                array_merge($data, [
                    'requester_id' => $requester->id,
                    'category_id' => $category->id,
                ])
            );
        }
    }
}
