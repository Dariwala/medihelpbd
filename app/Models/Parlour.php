<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parlour extends Model
{
    protected $fillable = [
        'parlour_name',
        'b_parlour_name',
        'parlour_subname',
        'b_parlour_subname',
        'parlour_photo',
        'photo_path',
        'parlour_description',
        'b_parlour_description',
        'parlour_fb_link',
        'parlour_web_link',
        'parlour_total_bed',
        'b_parlour_total_bed',
        'parlour_total_doctor',
        'b_parlour_total_doctor',
        'parlour_total_staff',
        'b_parlour_total_staff',
        'parlour_address',
        'b_parlour_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'parlour';

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
        return $this->hasMany('App\Models\Phone', 'parlour_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\Email', 'parlour_id');
    }

    public function parlourServices()
    {
        return $this->hasMany('App\Models\ParlourService', 'parlour_id');
    }

    public function parlourNotices()
    {
        return $this->hasMany('App\Models\ParlourNotice', 'parlour_id');
    }

    public function parlourDoctors()
    {
        return $this->hasMany('App\Models\ParlourDoctor', 'parlour_id');
    }
}
