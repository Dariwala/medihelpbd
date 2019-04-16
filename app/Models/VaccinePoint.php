<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinePoint extends Model
{
    protected $fillable = [
        'vaccine_point_name',
        'b_vaccine_point_name',
        'vaccine_point_subname',
        'b_vaccine_point_subname',
        'vaccine_point_photo',
        'photo_path',
        'vaccine_point_description',
        'b_vaccine_point_description',
        'vaccine_point_fb_link',
        'vaccine_point_web_link',
        'vaccine_point_total_bed',
        'b_vaccine_point_total_bed',
        'vaccine_point_total_doctor',
        'b_vaccine_point_total_doctor',
        'vaccine_point_total_staff',
        'b_vaccine_point_total_staff',
        'vaccine_point_address',
        'b_vaccine_point_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'vaccine_point';

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
        return $this->hasMany('App\Models\VaccinePointPhone', 'vaccine_point_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\VaccinePointEmail', 'vaccine_point_id');
    }

    public function vaccinePointServices()
    {
        return $this->hasMany('App\Models\VaccinePointService', 'vaccine_point_id');
    }

    public function vaccinePointNotices()
    {
        return $this->hasMany('App\Models\VaccinePointNotice', 'vaccine_point_id');
    }

    public function vaccinePointDoctors()
    {
        return $this->hasMany('App\Models\VaccinePointDoctor', 'vaccine_point_id');
    }
}
