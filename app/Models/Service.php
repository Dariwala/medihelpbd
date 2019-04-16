<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = array('service_name', 'b_service_name');

    protected $table = 'service';

    public function subService()
    {
    	return $this->hasMany('App\Models\SubService', 'service_id');
    }

    public function hospitalServices()
    {
    	return $this->hasMany('App\Models\HospitalService', 'service_id');
    }

    public function herbalCenterServices()
    {
        return $this->hasMany('App\Models\HerbalCenterService', 'service_id');
    }

    public function skinLaserServices()
    {
        return $this->hasMany('App\Models\SkinLaserService', 'service_id');
    }

    public function vaccinePointServices()
    {
        return $this->hasMany('App\Models\VaccinePointService', 'service_id');
    }

}
