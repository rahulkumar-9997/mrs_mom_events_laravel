<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = [
        'id',
        'title',
        'is_image_or_youtube',
        'youtube_link',
        'media_image',
        'sort_order',
        'user_id',
    ];
}
