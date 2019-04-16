<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinLaserCenter extends Model
{
    protected $fillable = [
        'skin_laser_center_name',
        'b_skin_laser_center_name',
        'skin_laser_center_subname',
        'b_skin_laser_center_subname',
        'skin_laser_center_photo',
        'photo_path',
        'skin_laser_center_description',
        'b_skin_laser_center_description',
        'skin_laser_center_fb_link',
        'skin_laser_center_web_link',
        'skin_laser_center_total_bed',
        'b_skin_laser_center_total_bed',
        'skin_laser_center_total_doctor',
        'b_skin_laser_center_total_doctor',
        'skin_laser_center_total_staff',
        'b_skin_laser_center_total_staff',
        'skin_laser_center_address',
        'b_skin_laser_center_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'skin_laser_center';

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
        return $this->hasMany('App\Models\SkinLaserCenterPhone', 'skin_laser_center_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\SkinLaserCenterEmail', 'skin_laser_center_id');
    }

    public function skinLaserCenterServices()
    {
        return $this->hasMany('App\Models\SkinLaserCenterService', 'skin_laser_center_id');
    }

    public function skinLaserCenterNotices()
    {
        return $this->hasMany('App\Models\SkinLaserCenterNotice', 'skin_laser_center_id');
    }

    public function skinLaserCenterDoctors()
    {
        return $this->hasMany('App\Models\SkinLaserCenterDoctor', 'skin_laser_center_id');
    }
}
