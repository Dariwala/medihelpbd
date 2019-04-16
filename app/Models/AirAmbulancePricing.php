<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirAmbulancePricing extends Model
{
   protected $fillable = ['package_name','b_package_name','package_details','b_package_details','air_ambulance_id'];

    protected $table = 'air_ambulance_pricing';

    public function airAmbulance()
    {
    	return $this->belongsTo('App\Models\AirAmbulance', 'air_ambulance_id');
    }
}
