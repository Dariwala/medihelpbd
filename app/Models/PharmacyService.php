<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyService extends Model
{
   // protected $fillable = ['blood_bank_service_title','b_blood_bank_service_title','blood_bank_service_description','b_blood_bank_service_description','blood_bank_id','service_id','subservice_id'];

    protected $table = 'pharmacy_service';

    public function pharmacy()
    {
    	return $this->belongsTo('App\Models\Pharmacy', 'pharmacy_id');
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
