<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeBankService extends Model
{
    protected $fillable = ['eye_bank_service_title','b_eye_bank_service_title','eye_bank_service_description','b_eye_bank_service_description','eye_bank_id','service_id','subservice_id'];

    protected $table = 'eye_bank_service';

    public function eyeBank()
    {
    	return $this->belongsTo('App\Models\EyeBank', 'eye_bank_id');
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
