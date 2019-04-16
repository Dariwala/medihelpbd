<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AmbulancePhone extends Model
{
    protected $fillable = ['ambulance_phone_no', 'ambulance_id'];

    protected $table = 'ambulance_phone';

    public function ambulance()
    {
    	return $this->belongsTo('App\Models\Ambulance', 'ambulance_id');
    }
}
