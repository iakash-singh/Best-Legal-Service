<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustTicket extends Model
{
    use HasFactory;

    protected $table = 'cust_tickets';
    protected $fillable = ['state','service_id'];

    public function users(){
        return $this->belongsTo(customerUser::class, 'customer_user_id');
    }

    public function services(){
        return $this->hasMany(Service::class, 'id', 'service_id')->select('id', 'ser_name');
    }

    public function singleService(){
        return $this->hasOne(Service::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function AssignedUsers()
    {
        return $this->belongsToMany(User::class, 'ticket_id', 'user_id')
        ->withTimestamps();
    }
}
