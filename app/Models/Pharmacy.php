<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'pharmacy_name',
        'b_pharmacy_name',
        'pharmacy_subname',
        'b_pharmacy_subname',
        'pharmacy_photo',
        'photo_path',
        'pharmacy_description',
        'b_pharmacy_description',
        'pharmacy_fb_link',
        'pharmacy_web_link',
        'total_medicine',
        'b_total_medicine',
        'pharmacy_address',
        'b_pharmacy_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'pharmacy';

    public function district()
    {
    	return $this->belongsTO('App\Models\District','district_id');

    }
    public function subDistrict()
    {
    	return $this->belongsTO('App\Models\SubDistrict', 'subdistrict_id');
    }



    public function phones()
    {
        return $this->hasMany('App\Models\PharmacyPhone', 'pharmacy_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\PharmacyEmail', 'pharmacy_id');
    }

    public function pharmacyProducts()
    {
        return $this->hasMany('App\Models\PharmacyProduct', 'pharmacy_id');
    }

    public function pharmacyDoctors()
    {
        return $this->hasMany('App\Models\PharmacyDoctor', 'pharmacy_id');
    }

    public function pharmacyNotices()
    {
        return $this->hasMany('App\Models\PharmacyNotice', 'pharmacy_id');
    }
    public function PharmacyServices()
    {
        return $this->hasMany('App\Models\PharmacyService', 'pharmacy_id');
    }
}
