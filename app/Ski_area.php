<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ski_area extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'place_name',
    'zip_code',
    'prefecture',
    'city',
    'after_address',
    'home_page',
    'phone_number',
    'business_hours',
    'season',
    'evening_hours',
    'lesson',
    'restaurant',
    'spa',
    'hotel',
    'snowboard',
    'slope_map',
    'latitude',
    'longitude',
    'parking_lot',
    'activity',
    'kids_park',
    'lift_ticket',
    'free_entry',
    ];
    
    /**
     * UsersとSkiareasのリレーション
     */
    public function users()   
    {
        return $this->hasMany('App\User');  
    }
    
    /**
     * StarsとSkiareasのリレーション
     */
    public function star()   
    {
        return $this->belongsTo('App\Star');  
    }
}
