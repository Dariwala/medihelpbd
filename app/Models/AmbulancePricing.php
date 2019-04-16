<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AmbulancePricing extends Model
{
   protected $fillable = ['package_name','b_package_name','package_details','b_package_details','ambulance_id'];

    protected $table = 'ambulance_pricing';

    public function ambulance()
    {
    	return $this->belongsTo('App\Models\Ambulance', 'ambulance_id');
    }
}
