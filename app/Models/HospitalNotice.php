<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalNotice extends Model
{

    protected $fillable = ['date','b_date','hospital_notice_title','b_hospital_notice_title','hospital_notice_description','b_hospital_notice_description','hospital_id'];

    protected $table = 'hospital_notice';

    public function hospital()
    {
    	return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }
}


