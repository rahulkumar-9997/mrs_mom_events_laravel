<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;
    protected $table = 'gallery_categories';
    protected $fillable = [
        'id',
        'name',
        'status'
    ];

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class, 'gallery_categories_id');
    }
}
