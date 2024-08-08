<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function tags()
    {
        return $this->belongsToMany(blogTag::class, 'blogpost_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(blogCategory::class, 'blogcategory_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
