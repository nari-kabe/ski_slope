<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Star extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'place_id',
    ];

    /**
     * UseresとStarsのリレーション
     */
    public function users()   
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Ski_areasとStarsのリレーション
     */
    public function Ski_areas()   
    {
        return $this->belongsTo('App\Ski_area');
    }
}
