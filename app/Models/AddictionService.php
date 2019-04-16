<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddictionService extends Model
{
    protected $fillable = ['addiction_service_title','b_addiction_service_title','addiction_service_description','b_addiction_service_description','addiction_id','service_id','subservice_id'];

    protected $table = 'addiction_service';

    public function addiction()
    {
    	return $this->belongsTo('App\Models\Addiction', 'addiction_id');
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
