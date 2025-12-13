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
        'youtube_link_description',
        'media_image_link',
        'media_link_description',
        'media_image',
        'sort_order',
        'user_id',
    ];
}
