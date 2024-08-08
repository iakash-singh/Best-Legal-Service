<?php

namespace App\Models;

use App\Http\Controllers\front\Search;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Search;

    protected $table = 'services';
    protected $fillable = ['ser_name','title','slug','image','short_description','meta_keywords','meta_description','description','cat','sub_cat','price','position'];
    protected $hidden = ['created_at', 'updated_at'];

    protected $searchable = [
        'ser_name'
    ];

    public function category(){
        return $this->belongsTo(category::class, 'sub_cat');
    }

    public function ticket(){
        return $this->belongsTo(CustTicket::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}