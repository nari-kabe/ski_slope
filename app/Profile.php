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
    'ski_level',
    'snowboard_level',
    'others_level',
    'home_slope',
    'public_setting',
    'greeting',
    ];
    
    /**
     * UsersとProfilesのリレーション
     */
    public function user()   
    {
        return $this->hasOne('App\User');  
    }
    
}
