<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('Y-m-d');
    }
}
