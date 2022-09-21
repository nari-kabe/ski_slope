<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'user_name',
    'email',
    'password',
    'sex',
    'age',
    'occupation',
    'event',
    'experience',
    'level',
    'home_slope',
    'public_setting',
    'greeting',
    ];
    
    /**
     * ProfilesとUsersのリレーション
     */
    public function user()   
    {
        return $this->hasOne('App\User');  
    }
    
    /**
     * ProfilesとStarsのリレーション
     */
    public function Star()   
    {
        return $this->belongsTo('App\Profile');  
    }
    
}
