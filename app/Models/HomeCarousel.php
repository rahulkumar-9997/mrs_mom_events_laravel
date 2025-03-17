<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCarousel extends Model
{
    use HasFactory;
    protected $table = 'home_carousel';
    protected $fillable = [
        'id',
        'image_path',
        'sort_order'
    ];
}
