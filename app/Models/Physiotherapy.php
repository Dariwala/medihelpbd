<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Physiotherapy extends Model
{
    protected $fillable = [
        'physiotherapy_name',
        'b_physiotherapy_name',
        'physiotherapy_subname',
        'b_physiotherapy_subname',
        'physiotherapy_photo',
        'photo_path',
        'physiotherapy_description',
        'b_physiotherapy_description',
        'physiotherapy_fb_link',
        'physiotherapy_web_link',
        'total_medicine',
        'b_total_medicine',
        'physiotherapy_address',
        'b_physiotherapy_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'physiotherapy';

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
        return $this->hasMany('App\Models\PhysiotherapyPhone', 'physiotherapy_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\PhysiotherapyEmail', 'physiotherapy_id');
    }

    public function physiotherapyProducts()
    {
        return $this->hasMany('App\Models\PhysiotherapyProduct', 'physiotherapy_id');
    }

    public function physiotherapyDoctors()
    {
        return $this->hasMany('App\Models\PhysiotherapyDoctor', 'physiotherapy_id');
    }

    public function physiotherapyNotices()
    {
        return $this->hasMany('App\Models\PhysiotherapyNotice', 'physiotherapy_id');
    }
    public function PhysiotherapyServices()
    {
        return $this->hasMany('App\Models\PhysiotherapyService', 'physiotherapy_id');
    }
}
