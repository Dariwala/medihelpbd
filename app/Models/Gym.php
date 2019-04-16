<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'gym_name',
        'b_gym_name',
        'gym_subname',
        'b_gym_subname',
        'gym_photo',
        'photo_path',
        'gym_description',
        'b_gym_description',
        'gym_fb_link',
        'gym_web_link',
        'gym_total_bed',
        'b_gym_total_bed',
        'gym_total_doctor',
        'b_gym_total_doctor',
        'gym_total_staff',
        'b_gym_total_staff',
        'gym_address',
        'b_gym_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'gym';

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
        return $this->hasMany('App\Models\Phone', 'gym_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\Email', 'gym_id');
    }

    public function gymServices()
    {
        return $this->hasMany('App\Models\GymService', 'gym_id');
    }

    public function gymNotices()
    {
        return $this->hasMany('App\Models\GymNotice', 'gym_id');
    }

    public function gymDoctors()
    {
        return $this->hasMany('App\Models\GymDoctor', 'gym_id');
    }
}
