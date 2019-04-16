<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $fillable = array('sub_district_name', 'b_subdistrict', 'district_id');

    protected $table = 'subdistrict';

    public function district()
    {
    	return $this->belongsTo('App\Models\District','district_id');
    }

    public function hospitals()
    {
    	return $this->hasMany('App\Models\Hospital', 'subsubdistrict_id');
    }

    public function herbalCenters()
    {
        return $this->hasMany('App\Models\HerbalCenter','subdistrict_id');
    }

    public function skinLaserCenters()
    {
        return $this->hasMany('App\Models\SkinLaserCenter','subdistrict_id');
    }
    public function vaccinePoints()
    {
        return $this->hasMany('App\Models\VaccinePoint','subdistrict_id');
    }

    public function pharmacies()
    {
        return $this->hasMany('App\Models\Pharmacy','subsubdistrict_id');
    }
    public function medicalSpecialists()
    {
        return $this->hasMany('App\Models\MedicalSpecialist','subsubdistrict_id');
    }
    public function bloodBanks()
    {
        return $this->hasMany('App\Models\BloodBank','subsubdistrict_id');
    }

    public function eyeBanks()
    {
        return $this->hasMany('App\Models\EyeBank','subsubdistrict_id');
    }

    public function airAmbulances()
    {
        return $this->hasMany('App\Models\AirAmbulance','subsubdistrict_id');
    }

    public function Ambulances()
    {
        return $this->hasMany('App\Models\Ambulance','subsubdistrict_id');
    }

    public function bloodDonors()
    {
        return $this->hasMany('App\Models\BloodDonor','subsubdistrict_id');
    }
}
