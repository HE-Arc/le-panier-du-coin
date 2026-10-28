<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'conversation_id',
    'sender_id',
    'body',
    'read_at',
])]
class Message extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }
}