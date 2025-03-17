<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';
    protected $fillable = [
        'id',
        'gallery_categories_id',
        'image_path',
        'sort_order'
    ];

    public function galleryCategory()
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_categories_id');
    }
}
