<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinLaserCenterService extends Model
{
    protected $fillable = ['skin_laser_center_service_title','b_skin_laser_center_service_title','skin_laser_center_service_description','b_skin_laser_center_service_description','skin_laser_center_id','service_id','subservice_id'];

    protected $table = 'skin_laser_center_service';

    public function skinLaserCenter()
    {
    	return $this->belongsTo('App\Models\SkinLaserCenter', 'skin_laser_center_id');
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
