<?php

namespace App\Models;

use App\Enums\ArticleCondition;
use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    "title",
    "description",
    "location",
    "price",
    "brand",
    "availability",
    "condition",
    "negotiable",
    "seller_id",
    "category_id",
    "views",
    "status",
    "published_at",
])]
class Article extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array
    {
        return [
            "price" => "decimal:2",
            "views" => "integer",
            "condition" => ArticleCondition::class,
            "status" => ArticleStatus::class,
            "negotiable" => "boolean",
            "published_at" => "datetime",
        ];
    }
}
