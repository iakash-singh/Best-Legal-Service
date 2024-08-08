<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogTag extends Model
{
    use HasFactory;
    protected $table = 'blog_tags';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blogpost_tags')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
