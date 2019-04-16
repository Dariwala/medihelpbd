<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymService extends Model
{
    protected $fillable = ['gym_service_title','b_gym_service_title','gym_service_description','b_gym_service_description','gym_id','service_id','subservice_id'];

    protected $table = 'gym_service';

    public function gym()
    {
    	return $this->belongsTo('App\Models\Gym', 'gym_id');
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
