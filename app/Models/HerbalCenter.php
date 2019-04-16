<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenter extends Model
{
    protected $fillable = [
        'herbal_center_name',
        'b_herbal_center_name',
        'herbal_center_subname',
        'b_herbal_center_subname',
        'herbal_center_photo',
        'photo_path',
        'herbal_center_description',
        'b_herbal_center_description',
        'herbal_center_fb_link',
        'herbal_center_web_link',
        'herbal_center_total_bed',
        'b_herbal_center_total_bed',
        'herbal_center_total_doctor',
        'b_herbal_center_total_doctor',
        'herbal_center_total_staff',
        'b_herbal_center_total_staff',
        'herbal_center_address',
        'b_herbal_center_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'herbal_center';

    public function district()
    {
    	return $this->belongsTO('App\Models\District');
    }

    public function subDistrict()
    {
    	return $this->belongsTO('App\Models\SubDistrict', 'subdistrict_id');
    }


    public function herbalCenterProducts()
    {
        return $this->hasMany('App\Models\HerbalCenterProduct', 'herbal_center_id');
    }
    
    public function phones()
    {
        return $this->hasMany('App\Models\HerbalCenterPhone', 'herbal_center_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\HerbalCenterEmail', 'herbal_center_id');
    }

    public function herbalCenterServices()
    {
        return $this->hasMany('App\Models\HerbalCenterService', 'herbal_center_id');
    }

    public function herbalCenterNotices()
    {
        return $this->hasMany('App\Models\HerbalCenterNotice', 'herbal_center_id');
    }

    public function herbalCenterDoctors()
    {
        return $this->hasMany('App\Models\HerbalCenterDoctor', 'herbal_center_id');
    }
}
