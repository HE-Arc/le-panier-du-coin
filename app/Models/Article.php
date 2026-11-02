<?php

namespace App\Models;

use App\Enums\ArticleCondition;
use App\Enums\ArticleStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

#[Fillable([
    'title',
    'description',
    'location',
    'price',
    'brand',
    'availability',
    'condition',
    'negotiable',
    'seller_id',
    'category_id',
    'views',
    'status',
    'published_at',
])]
class Article extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'views' => 'integer',
            'condition' => ArticleCondition::class,
            'status' => ArticleStatus::class,
            'negotiable' => 'boolean',
            'published_at' => 'datetime',
        ];
    }
    // ------------------------------------------------------------------------------------------------------------------
    // Pour les articles dans son ensemble
    // ------------------------------------------------------------------------------------------------------------------

    // Récupération de la catégorie d'un objet
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    // Récupération du nom du vendeur de l'objet
    public function seller(): BelongsTo{
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function pictures(): HasMany{
        return $this->hasMany(ArticlePicture::class);
    }

    // ------------------------------------------------------------------------------------------------------------------
    // Pour Un article
    // ------------------------------------------------------------------------------------------------------------------

    public function primaryPicture(): HasOne{
        return $this->hasOne(ArticlePicture::class)->where('is_primary', true);
    }

    //récupération des vues pour un article
    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function scopeFilter(Builder $query, array $filters) : Builder{
        return $query
        ->when($filters['q'] ?? null, function($query, $search){
            $query->where(function ($q) use ($search){
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%");
            });
        })
        // 2. Filtre par catégories (tableau d'IDs)
        ->when($filters['categorie'] ?? null, function ($query, $categories) {
            $query->whereIn('category_id', (array) $categories);
        })
        // 3. Filtre par prix min
        ->when($filters['prix_min'] ?? null, function ($query, $min) {
            $query->where('price', '>=', $min);
        })
        // 4. Filtre par prix max
        ->when($filters['prix_max'] ?? null, function ($query, $max) {
            $query->where('price', '<=', $max);
        })
        // 5. Filtre par quartier
        ->when($filters['quartier'] ?? null, function ($query, $quartier) {
            // Note: on traduit le slug du quartier en libellé si nécessaire, 
            // ou on cherche directement selon ce que vous stockez en BDD
            $query->where('location', $quartier);
        })
        // 6. Filtre par états (tableau)
        ->when($filters['etat'] ?? null, function ($query, $states) {
            $query->whereIn('condition', (array) $states);
        });
    }

    // Scope réutilisable : requête de recherche (filtres + tri).
    public function scopeForResearch(Builder $query, array $filters = [], string $sort = 'pertinence'): Builder
    {
        $query->with(['category', 'seller'])
            ->where('status', 'available')
            ->filter($filters);

        if ($sort === 'prix') {
            $query->orderBy('price', 'asc');
        } else {
            $query->latest('published_at');
        }

        return $query;
    }

    // Métadonnées communes aux pages de recherche.
    public static function researchMeta(): array
    {
        $categories = Category::query()
            ->withCount(['articles' => fn ($query) => $query->where('status', 'available')])
            ->orderBy('title')
            ->get()
            ->filter(fn ($category) => $category->articles_count > 0)
            ->values();

        $locations = static::query()
            ->where('status', 'available')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        $priceRanges = static::query()
            ->where('status', 'available')
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        return [
            'categories' => $categories,
            'locations' => $locations,
            'priceRanges' => $priceRanges,
            'conditions' => ArticleCondition::cases(),
        ];
    }
    // ------------------------------------------------------------------------------------------------------------------
    // Pour les messages
    // ------------------------------------------------------------------------------------------------------------------
    // récupération du nombre de message pour un article
    public function conversations(): HasMany{
        return $this->hasMany(Conversation::class);
    }

    // ------------------------------------------------------------------------------------------------------------------
    // Pour les dashboard
    // ------------------------------------------------------------------------------------------------------------------

    // Récupération des vies pour les stats
    public function articleViews(): HasMany{
        return $this->hasMany(ArticleView::class);
    }
}
