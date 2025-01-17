<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image_path', 'published_at'];

    protected $dates = ['published_at'];

    // In je Article model
    protected $casts = [
        'published_at' => 'datetime',
    ];


}
