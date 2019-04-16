<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenterService extends Model
{
    protected $fillable = ['herbal_center_service_title','b_herbal_center_service_title','herbal_center_service_description','b_herbal_center_service_description','herbal_center_id','service_id','subservice_id'];

    protected $table = 'herbal_center_service';

    public function herbalCenter()
    {
    	return $this->belongsTo('App\Models\HerbalCenter', 'herbal_center_id');
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
