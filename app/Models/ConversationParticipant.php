<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'conversation_id',
    'user_id',
])]
class ConversationParticipant extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = null;
}