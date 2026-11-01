<?php

// fonction fait main, mais remplissage des données aidé par l'IA

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manu = User::where('email', 'manu@test.ch')->firstOrFail();
        $adam = User::where('email', 'adam@example.com')->firstOrFail();

        // Un avis par article disponible : l'acheteur évalue le vendeur de l'objet échangé.
        $reviews = [
            [
                'article' => 'Machine à café à grains',
                'reviewer' => $manu,
                'rating' => 5,
                'comment' => 'Machine impeccable, détartrage fait comme promis. Échange au centre-ville, rien à redire.',
                'days' => 1,
            ],
            [
                'article' => 'Vélo de ville — 3 vitesses',
                'reviewer' => $adam,
                'rating' => 5,
                'comment' => 'Vélo soigné et bien entretenu, il me sert tous les matins depuis. Chaîne et pneus neufs, comme annoncé.',
                'days' => 2,
            ],
            [
                'article' => 'Trottinette pliable adulte',
                'reviewer' => $manu,
                'rating' => 4,
                'comment' => 'Pliage rapide et roues en bon état. Réponse un peu lente, mais le rendez-vous au centre-ville s\'est bien passé.',
                'days' => 3,
            ],
            [
                'article' => 'Tabouret de bar en bois',
                'reviewer' => $adam,
                'rating' => 4,
                'comment' => 'Tabouret conforme aux photos, quelques traces d\'usage comme annoncé. Remise au portail, propriétaire sympa.',
                'days' => 4,
            ],
            [
                'article' => 'Cache-pots en terre cuite (x3)',
                'reviewer' => $manu,
                'rating' => 5,
                'comment' => 'Trois beaux cache-pots sans fêlure, emballés avec soin. Je recommande sans hésiter.',
                'days' => 5,
            ],
            [
                'article' => 'Lot de 12 romans jeunesse',
                'reviewer' => $adam,
                'rating' => 5,
                'comment' => 'Collection complète, aucun dos cassé. Ma fille les a dévorés en une semaine.',
                'days' => 6,
            ],
        ];

        foreach ($reviews as $data) {
            $article = Article::where('title', $data['article'])->firstOrFail();

            $review = Review::firstOrCreate(
                [
                    'reviewer_id' => $data['reviewer']->id,
                    'article_id' => $article->id,
                ],
                [
                    'reviewee_id' => $article->seller_id,
                    'rating' => $data['rating'],
                    'comment' => $data['comment'],
                ]
            );

            // Date de dépôt échelonnée pour que l'ordre des avis soit stable.
            if ($review->wasRecentlyCreated) {
                $review->created_at = now()->subDays($data['days']);
                $review->save();
            }
        }
    }
}
