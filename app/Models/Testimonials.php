<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    protected $fillable = [
        'id',
        'name',
        'profile_image',
        'testimonials_content',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
