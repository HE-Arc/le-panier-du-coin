<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'reviewer_id',
    'reviewee_id',
    'article_id',
    'rating',
    'comment',
])]
class Review extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }

    // Récupération de l'utilisateur qui a déposé l'avis
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    // Récupération de l'utilisateur évalué
    public function reviewee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewee_id');
    }

    // Récupération de l'article concerné par l'échange
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
