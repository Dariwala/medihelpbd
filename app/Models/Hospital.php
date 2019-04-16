<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'hospital_name',
        'b_hospital_name',
        'hospital_subname',
        'b_hospital_subname',
        'hospital_photo',
        'photo_path',
        'hospital_description',
        'b_hospital_description',
        'hospital_fb_link',
        'hospital_web_link',
        'hospital_total_bed',
        'b_hospital_total_bed',
        'hospital_total_doctor',
        'b_hospital_total_doctor',
        'hospital_total_staff',
        'b_hospital_total_staff',
        'hospital_address',
        'b_hospital_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'hospital';

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
        return $this->hasMany('App\Models\Phone', 'hospital_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\Email', 'hospital_id');
    }

    public function hospitalServices()
    {
        return $this->hasMany('App\Models\HospitalService', 'hospital_id');
    }

    public function hospitalNotices()
    {
        return $this->hasMany('App\Models\HospitalNotice', 'hospital_id');
    }

    public function hospitalDoctors()
    {
        return $this->hasMany('App\Models\HospitalDoctor', 'hospital_id');
    }
}
