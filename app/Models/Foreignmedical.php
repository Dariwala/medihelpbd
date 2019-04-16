<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foreignmedical extends Model
{
    protected $fillable = [
        'foreignmedical_name',
        'b_foreignmedical_name',
        'foreignmedical_subname',
        'b_foreignmedical_subname',
        'foreignmedical_photo',
        'photo_path',
        'foreignmedical_description',
        'b_foreignmedical_description',
        'foreignmedical_fb_link',
        'foreignmedical_web_link',
        'total_medicine',
        'b_total_medicine',
        'foreignmedical_address',
        'b_foreignmedical_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'foreignmedical';

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
        return $this->hasMany('App\Models\ForeignmedicalPhone', 'foreignmedical_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\ForeignmedicalEmail', 'foreignmedical_id');
    }

    public function foreignmedicalProducts()
    {
        return $this->hasMany('App\Models\ForeignmedicalProduct', 'foreignmedical_id');
    }

    public function foreignmedicalDoctors()
    {
        return $this->hasMany('App\Models\ForeignmedicalDoctor', 'foreignmedical_id');
    }

    public function foreignmedicalNotices()
    {
        return $this->hasMany('App\Models\ForeignmedicalNotice', 'foreignmedical_id');
    }
    public function ForeignmedicalServices()
    {
        return $this->hasMany('App\Models\ForeignmedicalService', 'foreignmedical_id');
    }
}
