<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'request_id',
    'proposer_id',
    'proposed_article_id',
    'comment',
])]
class Answer extends Model
{
    use HasFactory, HasUuids;
}