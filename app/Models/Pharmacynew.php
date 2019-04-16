<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacynew extends Model
{
    protected $fillable = [
        'pharmacynew_name',
        'b_pharmacynew_name',
        'pharmacynew_subname',
        'b_pharmacynew_subname',
        'pharmacynew_photo',
        'photo_path',
        'pharmacynew_description',
        'b_pharmacynew_description',
        'pharmacynew_fb_link',
        'pharmacynew_web_link',
        'total_medicine',
        'b_total_medicine',
        'pharmacynew_address',
        'b_pharmacynew_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'pharmacynew';

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
        return $this->hasMany('App\Models\PharmacynewPhone', 'pharmacynew_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\PharmacynewEmail', 'pharmacynew_id');
    }

    public function pharmacynewProducts()
    {
        return $this->hasMany('App\Models\PharmacynewProduct', 'pharmacynew_id');
    }

    public function pharmacynewDoctors()
    {
        return $this->hasMany('App\Models\PharmacynewDoctor', 'pharmacynew_id');
    }

    public function pharmacynewNotices()
    {
        return $this->hasMany('App\Models\PharmacynewNotice', 'pharmacynew_id');
    }
    public function PharmacynewServices()
    {
        return $this->hasMany('App\Models\PharmacynewService', 'pharmacynew_id');
    }
}
