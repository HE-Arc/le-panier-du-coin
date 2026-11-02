<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["article_id", "image_path", "is_primary"])]
class ArticlePicture extends Model
{
    use HasUuids;

    protected function casts(): array{
        return ["is_primary" => "boolean",];
    }

    public function article(): BelongsTo{
        return $this->belongsTo(Article::class);
    }
}
