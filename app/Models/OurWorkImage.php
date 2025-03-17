<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWorkImage extends Model
{
    use HasFactory;
    protected $table = 'our_works_image';
    protected $fillable = [
        'id',
        'our_work_image',
        'our_work_id',
    ];

    // public function OurWorkImage()
    // {
    //     return $this->hasMany(OurWorkImage::class, 'id', 'our_work_id');
    // }
    
}
