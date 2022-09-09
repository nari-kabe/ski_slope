<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ski_area extends Model
{
    protected $fillable = [
    'place_name',
    'zip_code',
    'prefecture',
    'municipalities',
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
    'slope_map',
    'latitude',
    'longitude',
    ];
}
