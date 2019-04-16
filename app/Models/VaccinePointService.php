<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinePointService extends Model
{
    protected $fillable = ['vaccine_point_service_title','b_vaccine_point_service_title','vaccine_point_service_description','b_vaccine_point_service_description','vaccine_point_id','service_id','subservice_id'];

    protected $table = 'vaccine_point_service';

    public function vaccinePoint()
    {
    	return $this->belongsTo('App\Models\VaccinePoint', 'vaccine_point_id');
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
