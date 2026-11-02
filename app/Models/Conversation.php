<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'article_id',
    'request_id',
])]
class Conversation extends Model
{
    use HasFactory, HasUuids;

    public function messages(): HasMany{
        return $this->hasMany(Message::class);
    }
}
