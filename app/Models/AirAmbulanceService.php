<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirAmbulanceService extends Model
{
    protected $table = 'air_ambulance_service';

    public function airAmbulance()
    {
    	return $this->belongsTo('App\Models\AirAmbulance', 'air_ambulance_id');
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
