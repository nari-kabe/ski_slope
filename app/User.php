<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * ProfilesとUsersのリレーション
     */ 
    public function profile()   
    {
        return $this->hasOne('App\profile');
    }
    
    /**
     * SkiareasとUsersのリレーション
     */
    public function ski_area()   
    {
        return $this->hasMany('App\Ski_area');  
    }
    
    /**
     * StarsとUsersのリレーション
     */
    public function star()   
    {
        return $this->hasMany('App\Star'); 
    }
    
    /**
     * Find_friendsとUsersのリレーション
     */
    public function find_friends()   
    {
        return $this->hasMany('App\Find_friend'); 
    }
}
