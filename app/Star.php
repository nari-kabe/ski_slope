<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Star extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'place_id',
    ];
    
    public function getData() 
    {
        $my_star_slope_data = Star::where('user_id', Auth::user()->id)->get();
        
        return $my_star_slope_data;
    }

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
