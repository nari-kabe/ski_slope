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
     * ProfilesとStarsのリレーション
     */
    public function star()   
    {
        return $this->hasOne('App\Profile');  
    }
}
