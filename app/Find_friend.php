<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Find_friend extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'profile_id',
    ];
    
    public function getData() 
    {
        $my_star_profile_data = Find_friend::where('user_id', Auth::user()->id)->get();
        
        return $my_star_profile_data;
    }
    
    /**
     * UseresとFind_friendsのリレーション
     */
    public function users()   
    {
        return $this->belongsTo('App\User'); 
    }

    /**
     * ProfilesとFind_friendsのリレーション
     */
    public function profiles()   
    {
        return $this->belongsTo('App\Profile');
    }
}
