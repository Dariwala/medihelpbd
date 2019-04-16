<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParlourService extends Model
{
    protected $fillable = ['parlour_service_title','b_parlour_service_title','parlour_service_description','b_parlour_service_description','parlour_id','service_id','subservice_id'];

    protected $table = 'parlour_service';

    public function parlour()
    {
    	return $this->belongsTo('App\Models\Parlour', 'parlour_id');
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
