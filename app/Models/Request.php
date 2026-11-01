<?php

namespace App\Models;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
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

    protected function casts(): array
    {
        return [
            'budget' => 'decimal:2',
            'status' => RequestStatus::class,
            'target_date' => 'date',
            'published_at' => 'datetime',
        ];
    }

    // Récupération du demandeur
    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    // Récupération de la catégorie recherchée
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Récupération des réponses reçues
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
