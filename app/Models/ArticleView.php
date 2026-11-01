<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["article_id"])]
class ArticleView extends Model
{
    use HasUuids;

    // Récuperation des views de la BDD
    public function article(): BelongsTo{
        return $this->belongsTo(Article::class);
    }
}
