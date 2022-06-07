<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'likes',
        'comments',
        'image_path',
        'description',
        'user_id',

    ];

    protected $casts = [
        'comments' => 'array',
        'likes' => 'array',
    ];

}
