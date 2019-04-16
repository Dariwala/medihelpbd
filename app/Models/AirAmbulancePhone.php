<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirAmbulancePhone extends Model
{
    protected $fillable = ['air_ambulance_phone_no', 'air_ambulance_id'];

    protected $table = 'air_ambulance_phone';

    public function airAmbulance()
    {
    	return $this->belongsTo('App\Models\AirAmbulance', 'air_ambulance_id');
    }
}

