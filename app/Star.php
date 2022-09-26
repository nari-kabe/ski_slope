<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $fillable = [
    'user_id',
    'place_id',
    ];
    
    
    /**
     * UseresとStarsのリレーション
     */
    public function users()   
    {
        return $this->hasMany('App\User');  
    }
    
    /**
     * Ski_areasとStarsのリレーション
     */
    public function Ski_areas()   
    {
        return $this->hasMany('App\Ski_area');  
    }
}
