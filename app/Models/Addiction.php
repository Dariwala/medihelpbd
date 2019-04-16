<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addiction extends Model
{
    protected $fillable = [
        'addiction_name',
        'b_addiction_name',
        'addiction_subname',
        'b_addiction_subname',
        'addiction_photo',
        'photo_path',
        'addiction_description',
        'b_addiction_description',
        'addiction_fb_link',
        'addiction_web_link',
        'addiction_total_bed',
        'b_addiction_total_bed',
        'addiction_total_doctor',
        'b_addiction_total_doctor',
        'addiction_total_staff',
        'b_addiction_total_staff',
        'addiction_address',
        'b_addiction_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'addiction';

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
        return $this->hasMany('App\Models\Phone', 'addiction_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\Email', 'addiction_id');
    }

    public function addictionServices()
    {
        return $this->hasMany('App\Models\AddictionService', 'addiction_id');
    }

    public function addictionNotices()
    {
        return $this->hasMany('App\Models\AddictionNotice', 'addiction_id');
    }

    public function addictionDoctors()
    {
        return $this->hasMany('App\Models\AddictionDoctor', 'addiction_id');
    }
}
