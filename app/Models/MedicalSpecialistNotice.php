<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialistNotice extends Model
{
    protected $fillable = ['date','b_date','medical_specialist_notice_title','b_medical_specialist_notice_title','medical_specialist_notice_description','b_medical_specialist_notice_description','medical_specialist_id'];

    protected $table = 'medical_specialist_notice';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }
}
