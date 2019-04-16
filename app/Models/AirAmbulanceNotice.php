<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirAmbulanceNotice extends Model
{
    protected $fillable = ['date','b_date','air_ambulance_notice_title','b_air_ambulance_notice_title','air_ambulance_notice_description','b_air_ambulance_notice_description','air_ambulance_id'];

    protected $table = 'air_ambulance_notice';

    public function airAmbulance()
    {
    	return $this->belongsTo('App\Models\AirAmbulance', 'air_ambulance_id');
    }
}
