<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $fillable = [
        'blood_bank_name',
        'b_blood_bank_name',
        'blood_bank_subname',
        'b_blood_bank_subname',
        'blood_bank_photo',
        'photo_path',
        'blood_bank_description',
        'b_blood_bank_description',
        'blood_bank_fb_link',
        'blood_bank_web_link',
        'blood_group_details',
        'b_blood_group_details',
        'total_blood_bag',
        'b_total_blood_bag',
        'blood_bank_address',
        'b_blood_bank_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'blood_bank';

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
        return $this->hasMany('App\Models\BloodBankPhone', 'blood_bank_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\BloodBankEmail', 'blood_bank_id');
    }

    public function bloodBankServices()
    {
        return $this->hasMany('App\Models\BloodBankService', 'blood_bank_id');
    }

    public function bloodBankNotices()
    {
        return $this->hasMany('App\Models\BloodBankNotice', 'blood_bank_id');
    }

    public function bloodBankDoctors()
    {
        return $this->hasMany('App\Models\BloodBankDoctor', 'blood_bank_id');
    }

}
