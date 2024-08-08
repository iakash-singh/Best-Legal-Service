<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable  = ['parents_id', 'category_name', 'position'];
    protected $hidden = ['created_at', 'updated_at'];

    public function sub_category(){
        return $this->hasMany(category::class, 'parents_id')->orderBy('position', 'ASC');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'sub_cat');
    }
}
