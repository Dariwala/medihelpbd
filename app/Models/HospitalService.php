<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalService extends Model
{
    protected $fillable = ['hospital_service_title','b_hospital_service_title','hospital_service_description','b_hospital_service_description','hospital_id','service_id','subservice_id'];

    protected $table = 'hospital_service';

    public function hospital()
    {
    	return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }

    public function service()
    {
    	return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function subService()
    {
    	return $this->belongsTo('App\Models\SubService', 'subservice_id');
    }
}
