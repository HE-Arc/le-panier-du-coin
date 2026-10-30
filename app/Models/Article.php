<?php

namespace App\Models;

use App\Enums\ArticleCondition;
use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    //------------------------------------------------------------------------------------------------------------------
    // Pour les articles dans son ensemble
    //------------------------------------------------------------------------------------------------------------------

    // Récupération de la catégorie d'un objet
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    // Récupération du nom du vendeur de l'objet
    public function seller():BelongsTo{
        return $this->belongsTo(User::class, "seller_id");
    }

    public function pictures():HasMany{
        return $this->hasMany(ArticlePicture::class);
    }

    //------------------------------------------------------------------------------------------------------------------
    // Pour Un article
    //------------------------------------------------------------------------------------------------------------------

    public function primaryPicture():HasOne{
        return $this->hasOne(ArticlePicture::class)->where("is_primary", true);
    }

    public function reviews():HasMany{
        return $this->hasMany(Review::class);
    }

}
