<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(["name", "email", "password", "neighborhood", "bio", "is_verified"])]
#[Hidden(["password"])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasUuids, Notifiable;

    /**
     * Get the attributes that should be cast.
     * maps db columns to PHP types
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "is_verified" => "boolean",
            "password" => "hashed",
        ];
    }

    // Récupération du nom d'un utilisateur selon un ID
    public function articles(): HasMany {
        return $this->hasMany(Article::class, "seller_id");
    }

}
