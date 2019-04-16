<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yoga extends Model
{
    protected $fillable = [
        'yoga_name',
        'b_yoga_name',
        'yoga_subname',
        'b_yoga_subname',
        'yoga_photo',
        'photo_path',
        'yoga_description',
        'b_yoga_description',
        'yoga_fb_link',
        'yoga_web_link',
        'yoga_total_bed',
        'b_yoga_total_bed',
        'yoga_total_doctor',
        'b_yoga_total_doctor',
        'yoga_total_staff',
        'b_yoga_total_staff',
        'yoga_address',
        'b_yoga_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'yoga';

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
        return $this->hasMany('App\Models\Phone', 'yoga_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\Email', 'yoga_id');
    }

    public function yogaServices()
    {
        return $this->hasMany('App\Models\YogaService', 'yoga_id');
    }

    public function yogaNotices()
    {
        return $this->hasMany('App\Models\YogaNotice', 'yoga_id');
    }

    public function yogaDoctors()
    {
        return $this->hasMany('App\Models\YogaDoctor', 'yoga_id');
    }
}
