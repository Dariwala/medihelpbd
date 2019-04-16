<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = [
        'ambulance_name',
        'b_ambulance_name',
        'ambulance_subname',
        'b_ambulance_subname',
        'ambulance_photo',
        'photo_path',
        'ambulance_description',
        'b_ambulance_description',
        'ambulance_fb_link',
        'ambulance_web_link',
        'total_ambulance',
        'b_total_ambulance',
        'ambulance_address',
        'b_ambulance_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'ambulance';

    public function district()
    {
    	return $this->belongsTO('App\Models\District');
    }

    public function subDistrict()
    {
    	return $this->belongsTO('App\Models\SubDistrict', 'subdistrict_id');
    }


    public function phones()
    {
        return $this->hasMany('App\Models\AmbulancePhone', 'ambulance_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\AmbulanceEmail', 'ambulance_id');
    }

    public function ambulanceNotices()
    {
        return $this->hasMany('App\Models\AmbulanceNotice', 'ambulance_id');
    }

    public function ambulancePricings()
    {
        return $this->hasMany('App\Models\AmbulancePricing', 'ambulance_id');
    }
    
}
