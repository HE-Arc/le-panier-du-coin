<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(["article_id", "image_path", "is_primary"])]
class ArticlePicture extends Model
{
    //
    protected function casts(): array
    {
        return [
            "is_primary" => "boolean",
        ];
    }
}
