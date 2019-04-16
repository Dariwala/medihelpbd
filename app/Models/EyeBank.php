<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeBank extends Model
{
    protected $fillable = [
        'eye_bank_name',
        'b_eye_bank_name',
        'eye_bank_subname',
        'b_eye_bank_subname',
        'eye_bank_photo',
        'photo_path',
        'eye_bank_description',
        'b_eye_bank_description',
        'eye_bank_fb_link',
        'eye_bank_web_link',
        'eye_group_details',
        'b_eye_group_details',
        'total_eye_bag',
        'b_total_eye_bag',
        'eye_bank_address',
        'b_eye_bank_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'eye_bank';

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
        return $this->hasMany('App\Models\EyeBankPhone', 'eye_bank_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\EyeBankEmail', 'eye_bank_id');
    }

    public function eyeBankServices()
    {
        return $this->hasMany('App\Models\EyeBankService', 'eye_bank_id');
    }

    public function eyeBankNotices()
    {
        return $this->hasMany('App\Models\EyeBankNotice', 'eye_bank_id');
    }

    public function eyeBankDoctors()
    {
        return $this->hasMany('App\Models\EyeBankDoctor', 'eye_bank_id');
    }

}
 