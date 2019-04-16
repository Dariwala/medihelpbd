<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Optical extends Model
{
    protected $fillable = [
        'optical_name',
        'b_optical_name',
        'optical_subname',
        'b_optical_subname',
        'optical_photo',
        'photo_path',
        'optical_description',
        'b_optical_description',
        'optical_fb_link',
        'optical_web_link',
        'total_medicine',
        'b_total_medicine',
        'optical_address',
        'b_optical_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'optical';

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
        return $this->hasMany('App\Models\OpticalPhone', 'optical_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\OpticalEmail', 'optical_id');
    }

    public function opticalProducts()
    {
        return $this->hasMany('App\Models\OpticalProduct', 'optical_id');
    }

    public function opticalDoctors()
    {
        return $this->hasMany('App\Models\OpticalDoctor', 'optical_id');
    }

    public function opticalNotices()
    {
        return $this->hasMany('App\Models\OpticalNotice', 'optical_id');
    }
    public function OpticalServices()
    {
        return $this->hasMany('App\Models\OpticalService', 'optical_id');
    }
}
