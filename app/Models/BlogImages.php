<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImages extends Model
{
    use HasFactory;
    protected $table = 'blogs_images';
    protected $fillable = [
        'id',
        'blog_image',
        'blog_id',
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
