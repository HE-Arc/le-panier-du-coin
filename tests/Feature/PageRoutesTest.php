<?php

namespace Tests\Feature;

use App\Models\User;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    #[DataProvider('pageProvider')]
    public function test_page_is_reachable(string $path): void
    {
        // Les tableaux de bord exigent une session authentifiée.
        if (in_array($path, ['/tableau-de-bord', '/tableau-de-bord/vendeur'], true)) {
            $this->actingAs(User::factory()->create());
        }

        $this->get($path)->assertOk();
    }

    public function test_buyer_dashboard_only_shows_buyer_content(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/tableau-de-bord')
            ->assertOk()
            ->assertSee('Mes achats en cours')
            ->assertDontSee('Mes annonces');
    }

    public function test_seller_dashboard_only_shows_seller_content(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/tableau-de-bord/vendeur')
            ->assertOk()
            ->assertSee('Mes annonces')
            ->assertDontSee('Mes achats en cours');
    }

    /**
     * @return array<string, array{string}>
     */
    public static function pageProvider(): array
    {
        return [
            'accueil' => ['/'],
            'annonces' => ['/annonces'],
            'recherche' => ['/recherche'],
            'creer une annonce' => ['/annonces/creer'],
            'demandes' => ['/demandes'],
            'creer une demande' => ['/demandes/creer'],
            'connexion' => ['/connexion'],
            'inscription' => ['/inscription'],
            'mot de passe oublie' => ['/mot-de-passe-oublie'],
            'tableau de bord acheteur' => ['/tableau-de-bord'],
            'tableau de bord vendeur' => ['/tableau-de-bord/vendeur'],
            'profil vendeur' => ['/profil-vendeur'],
            'qui sommes nous' => ['/qui-sommes-nous'],
            'conditions utilisation' => ['/conditions-utilisation'],
        ];
    }
}
