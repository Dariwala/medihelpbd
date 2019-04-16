<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = array('sub_service_name', 'b_sub_service_name', 'service_id');

    protected $table = 'subservice';

    public function service()
    {
    	return $this->belongsTo('App\Models\Service');
    }

    public function hospitalServices()
    {
    	return $this->hasMany('App\Models\HospitalService', 'subservice_id');
    }

    public function herbalCenterServices()
    {
        return $this->hasMany('App\Models\HerbalCenterService', 'subservice_id');
    }

    public function skinLaserServices()
    {
        return $this->hasMany('App\Models\SkinLaserService', 'subservice_id');
    }

    public function vaccinePointServices()
    {
        return $this->hasMany('App\Models\VaccinePointService', 'subservice_id');
    }
}
