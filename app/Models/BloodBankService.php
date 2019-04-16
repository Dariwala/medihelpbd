<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankService extends Model
{
    protected $fillable = ['blood_bank_service_title','b_blood_bank_service_title','blood_bank_service_description','b_blood_bank_service_description','blood_bank_id','service_id','subservice_id'];

    protected $table = 'blood_bank_service';

    public function bloodBank()
    {
    	return $this->belongsTo('App\Models\BloodBank', 'blood_bank_id');
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
