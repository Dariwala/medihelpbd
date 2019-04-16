<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = array('district_name', 'b_district_name');

    protected $table = 'district';

    public function subDistrict()
    {
    	return $this->hasMany('App\Models\SubDistrict');
    }

    public function hospitals()
    {
    	return $this->hasMany('App\Models\Hospital','district_id');
    }

    public function herbalCenters()
    {
        return $this->hasMany('App\Models\HerbalCenter','district_id');
    }

    public function skinLaserCenters()
    {
        return $this->hasMany('App\Models\SkinLaserCenter','district_id');
    }
    public function vaccinePoints()
    {
        return $this->hasMany('App\Models\VaccinePoint','district_id');
    }

    public function pharmacies()
    {
        return $this->hasMany('App\Models\Pharmacy','district_id');
    }

    public function medicalSpecialists()
    {
        return $this->hasMany('App\Models\MedicalSpecialist','district_id');
    }

    public function bloodBanks()
    {
        return $this->hasMany('App\Models\BloodBank','district_id');
    }

    public function eyeBanks()
    {
        return $this->hasMany('App\Models\EyeBank','district_id');
    }

    public function airAmbulances()
    {
        return $this->hasMany('App\Models\AirAmbulance','district_id');
    }

    public function Ambulances()
    {
        return $this->hasMany('App\Models\Ambulance','district_id');
    }

    public function bloodDonors()
    {
        return $this->hasMany('App\Models\BloodDonor','district_id');
    }
}
