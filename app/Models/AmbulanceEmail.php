<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AmbulanceEmail extends Model
{
    protected $fillable = ['ambulance_email_ad', 'ambulance_id'];

    protected $table = 'ambulance_email';

    public function ambulance()
    {
    	return $this->belongsTo('App\Models\Ambulance', 'ambulance_id');
    }
}
