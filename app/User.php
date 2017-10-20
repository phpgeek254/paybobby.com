<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $user_info
 * @property mixed $orders
 */
class User extends Authenticatable
{
    use Notifiable;

    public $completed_profile = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_number', 'user_type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $user_types = [
        'employee'=>'Free-Lancer',
        'employer'=>'Client'
    ];

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
