<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blogcategory_posts')->orderBy('created_at', 'DESC')->paginate(4);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
