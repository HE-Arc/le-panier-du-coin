<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(["name", "email", "password", "neighborhood", "bio", "is_verified"])]
#[Hidden(["password"])]
class User
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasUuids;

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
}
