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
    
    protected $table = 'find_friends';
    public $timestamps = false;
    
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
