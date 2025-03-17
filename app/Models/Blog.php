<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'id',
        'title',
        'blog_intro_head',
        'blog_post_date',
        'slug',
        'intro_description',
        'intro_image',
        'is_external',
        'external_url',
        'sort_order',
        'blog_description',
        'user_id',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($our_work) {
            $our_work->slug = $our_work->createSlug($our_work->title);
            $our_work->save();
        });
    }
  
    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title){
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
  
            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
  
            return "{$slug}-2";
        }
  
        return $slug;
    }

    public function images()
    {
        return $this->hasMany(BlogImages::class, 'blog_id', 'id');
    }
}
