<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YogaService extends Model
{
    protected $fillable = ['yoga_service_title','b_yoga_service_title','yoga_service_description','b_yoga_service_description','yoga_id','service_id','subservice_id'];

    protected $table = 'yoga_service';

    public function yoga()
    {
    	return $this->belongsTo('App\Models\Yoga', 'yoga_id');
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
