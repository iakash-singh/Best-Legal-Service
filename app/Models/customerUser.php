<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class customerUser extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'customer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'add1', 'add2', 'gst', 'alt_mobile', 'country', 'state', 'city', 'mobile'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function tickets(){
        return $this->hasMany(CustTicket::class);
    }

    public function services(){
        return $this->hasMany(Service::class)->with('tickets');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getAuthPassword()
    {
        return $this->token;
    }

    public function CustomerTicket()
    {
        return $this->belongsTo(CustTicket::class, 'customer_user_id');
    }
}
