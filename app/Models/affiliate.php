<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affiliate extends Model
{
    use HasFactory;

    protected $table = 'affiliates';
    protected $fillable = ['name', 'email', 'mobile', 'state', 'occupation', 'message'];
}
