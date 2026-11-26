<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'requester_id',
    'category_id',
    'title',
    'description',
    'location',
    'budget',
    'status',
    'target_date',
    'published_at',
])]
class Request extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array{
        return [
            'budget' => 'decimal:2',
            'status' => RequestStatus::class,
            'target_date' => 'date',
            'published_at' => 'datetime',
        ];
    }

    // Récupération du demandeur
    public function requester(): BelongsTo{
        return $this->belongsTo(User::class, 'requester_id');
    }

    // Récupération de la catégorie recherchée
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    // Récupération des réponses reçues
    public function answers(): HasMany{
        return $this->hasMany(Answer::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder{
        return $query
            ->when($filters['q'] ?? null, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            // 2. Filtre par quartier
            ->when($filters['quartier'] ?? null, function ($query, $quartier) {
                $query->where('location', $quartier);
            })
            // 3. Filtre par statuts
            ->when($filters['statut'] ?? null, function ($query, $statuses) {
                $query->whereIn('status', (array) $statuses);
            })
            // 4. Filtre par budget maximum
            ->when($filters['budget'] ?? null, function ($query, $max) {
                $query->where('budget', '<=', $max);
            });
    }

    // Scope réutilisable : liste des demandes filtrées, avec le nombre de réponses, triées par date de dépôt
    public function scopeForListing(Builder $query, array $filters = []): Builder{
        return $query->withCount('answers')
            ->filter($filters)
            ->latest('published_at')
            ->latest();
    }

    // Métadonnées pour les filtres de la page
    public static function listingMeta(): array{
        return [
            'locations' => static::query()->distinct()->orderBy('location')->pluck('location'),
            'statuses' => RequestStatus::cases(),
            'budgets' => [30, 50, 100, 150],
        ];
    }
}
