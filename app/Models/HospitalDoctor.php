<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','hospital_id'];

    protected $table = 'hospital_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department','department_id');
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }
}
