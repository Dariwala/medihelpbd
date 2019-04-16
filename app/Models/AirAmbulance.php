<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirAmbulance extends Model
{
    protected $fillable = [
        'air_ambulance_name',
        'b_air_ambulance_name',
        'air_ambulance_subname',
        'b_air_ambulance_subname',
        'air_ambulance_photo',
        'photo_path',
        'air_ambulance_description',
        'b_air_ambulance_description',
        'air_ambulance_fb_link',
        'air_ambulance_web_link',
        'total_air_ambulance',
        'b_total_air_ambulance',
        'air_ambulance_address',
        'b_air_ambulance_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'air_ambulance';

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
        return $this->hasMany('App\Models\AirAmbulancePhone', 'air_ambulance_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\AirAmbulanceEmail', 'air_ambulance_id');
    }
   
    public function airAmbulanceServices()
    {
        return $this->hasMany('App\Models\AirAmbulanceService', 'air_ambulance_id');
    }
    
    /*public function bloodBankServices()
    {
        return $this->hasMany('App\Models\BloodBankService', 'blood_bank_id');
    }*/
    
    public function airAmbulanceNotices()
    {
        return $this->hasMany('App\Models\AirAmbulanceNotice', 'air_ambulance_id');
    }

    public function airAmbulancePricings()
    {
        return $this->hasMany('App\Models\AirAmbulancePricing', 'air_ambulance_id');
    }
}
