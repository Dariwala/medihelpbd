<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirAmbulanceEmail extends Model
{
    protected $fillable = ['air_ambulance_email_ad', 'air_ambulance_id'];

    protected $table = 'air_ambulance_email';

    public function airAmbulance()
    {
    	return $this->belongsTo('App\Models\AirAmbulance', 'air_ambulance_id');
    }
}
