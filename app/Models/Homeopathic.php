<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homeopathic extends Model
{
    protected $fillable = [
        'homeopathic_name',
        'b_homeopathic_name',
        'homeopathic_subname',
        'b_homeopathic_subname',
        'homeopathic_photo',
        'photo_path',
        'homeopathic_description',
        'b_homeopathic_description',
        'homeopathic_fb_link',
        'homeopathic_web_link',
        'total_medicine',
        'b_total_medicine',
        'homeopathic_address',
        'b_homeopathic_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'homeopathic';

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
        return $this->hasMany('App\Models\HomeopathicPhone', 'homeopathic_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\HomeopathicEmail', 'homeopathic_id');
    }

    public function homeopathicProducts()
    {
        return $this->hasMany('App\Models\HomeopathicProduct', 'homeopathic_id');
    }

    public function homeopathicDoctors()
    {
        return $this->hasMany('App\Models\HomeopathicDoctor', 'homeopathic_id');
    }

    public function homeopathicNotices()
    {
        return $this->hasMany('App\Models\HomeopathicNotice', 'homeopathic_id');
    }
    public function HomeopathicServices()
    {
        return $this->hasMany('App\Models\HomeopathicService', 'homeopathic_id');
    }
}
