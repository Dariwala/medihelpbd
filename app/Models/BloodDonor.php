<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    protected $fillable = [
        'blood_donor_name',
        'b_blood_donor_name',
        'blood_donor_subname',
        'b_blood_donor_subname',
        'blood_donor_photo',
        'photo_path',
        'blood_donor_description',
        'b_blood_donor_description',
        'blood_donor_gender',
        'b_blood_donor_gender',
        'blood_group',
        'b_blood_group',
        'blood_donor_fb_link',
        'blood_donor_web_link',
        'last_donate_date',
        'b_last_donate_date',
        'blood_donor_address',
        'b_blood_donor_address',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'blood_donor';

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
        return $this->hasMany('App\Models\BloodDonorPhone', 'blood_donor_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\BloodDonorEmail', 'blood_donor_id');
    }
    
    public function bloodDonorPricings()
    {
        return $this->hasMany('App\Models\BloodDonorPricing', 'blood_donor_id');
    }

    
}
