<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;

class ArticleEditTest extends TestCase
{
    public function test_guest_is_redirected_to_login(): void
    {
        $article = $this->makeArticle(User::factory()->create());

        $this->get(route('articles.edit', $article))
            ->assertRedirect(route('login'));
    }

    public function test_owner_sees_the_prefilled_edit_form(): void
    {
        $seller = User::factory()->create();
        $article = $this->makeArticle($seller);

        $this->actingAs($seller)
            ->get(route('articles.edit', $article))
            ->assertOk()
            ->assertSee($article->title)
            ->assertSee('Modifier l\'annonce')
            ->assertSee('Mettre à jour');
    }

    public function test_another_user_cannot_edit_nor_update_the_article(): void
    {
        $article = $this->makeArticle(User::factory()->create());
        $intruder = User::factory()->create();

        $this->actingAs($intruder)
            ->get(route('articles.edit', $article))
            ->assertForbidden();

        $this->actingAs($intruder)
            ->put(route('articles.update', $article), $this->validPayload($article, ['titre' => 'Piraté']))
            ->assertForbidden();

        $this->assertDatabaseMissing('articles', ['id' => $article->id, 'title' => 'Piraté']);
    }

    public function test_owner_can_update_the_article(): void
    {
        $seller = User::factory()->create();
        $article = $this->makeArticle($seller);

        $this->actingAs($seller)
            ->put(route('articles.update', $article), $this->validPayload($article, [
                'titre' => 'Titre mis à jour',
                'prix' => 33,
                'brand' => 'Nouvelle marque',
                'etat' => 'like_new',
                'quartier' => 'tilleuls',
                'disponibilite' => 'En soirée',
            ]))
            ->assertRedirect(route('dashboard.seller'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Titre mis à jour',
            'price' => 33,
            'brand' => 'Nouvelle marque',
            'location' => 'Quartier des Tilleuls',
            'condition' => 'like_new',
            'availability' => 'En soirée',
            'negotiable' => 0,
        ]);
    }

    public function test_update_is_rejected_when_the_payload_is_invalid(): void
    {
        $seller = User::factory()->create();
        $article = $this->makeArticle($seller);
        $originalTitle = $article->title;

        $payload = $this->validPayload($article, ['titre' => 'Titre modifié']);
        unset($payload['prix']);

        $this->actingAs($seller)
            ->from(route('articles.edit', $article))
            ->put(route('articles.update', $article), $payload)
            ->assertSessionHasErrors('prix');

        $this->assertDatabaseHas('articles', ['id' => $article->id, 'title' => $originalTitle]);
    }

    public function test_view_counter_ignores_the_owner_only(): void
    {
        $seller = User::factory()->create();
        $article = $this->makeArticle($seller);

        // Un visiteur non connecté incrémente le compteur.
        $this->get(route('articles.show', $article))->assertOk();
        $this->assertSame(1, $article->fresh()->views);

        // Le propriétaire ne gonfle pas son propre compteur.
        $this->actingAs($seller)->get(route('articles.show', $article))->assertOk();
        $this->assertSame(1, $article->fresh()->views);

        // Un autre utilisateur connecté incrémente le compteur.
        $this->actingAs(User::factory()->create())->get(route('articles.show', $article))->assertOk();
        $this->assertSame(2, $article->fresh()->views);
    }

    private function makeArticle(User $seller): Article
    {
        $category = Category::create(['title' => 'Catégorie test '.uniqid()]);

        return Article::create([
            'title' => 'Annonce test '.uniqid(),
            'description' => 'Description de test suffisamment longue.',
            'location' => 'Centre-ville',
            'price' => 12.5,
            'brand' => 'Marque test',
            'availability' => 'Tous les jours',
            'condition' => 'good',
            'negotiable' => true,
            'seller_id' => $seller->id,
            'category_id' => $category->id,
            'views' => 0,
            'status' => 'available',
            'published_at' => now(),
        ]);
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function validPayload(Article $article, array $overrides = []): array
    {
        return array_merge([
            'titre' => $article->title,
            'description' => $article->description,
            'prix' => 20,
            'brand' => $article->brand,
            'categorie' => $article->category_id,
            'etat' => $article->condition->value,
            'quartier' => 'centre-ville',
            'disponibilite' => 'Sur rendez-vous',
            'certification' => '1',
        ], $overrides);
    }
}
