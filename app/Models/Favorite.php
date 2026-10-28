<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'article_id',
])]
class Favorite extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = null;

    public $timestamps = true;
}