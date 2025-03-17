<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureLogo extends Model
{
    use HasFactory;
    protected $table = 'featured_in_logos';
    protected $fillable = [
        'id',
        'img_title',
        'img_file',
        'user_id',
    ];
}
