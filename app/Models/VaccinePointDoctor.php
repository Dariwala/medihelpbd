<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinePointDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','vaccine_point_id'];

    protected $table = 'vaccine_point_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function vaccinePoint()
    {
        return $this->belongsTo('App\Models\VaccinePoint', 'vaccine_point_id');
    }
}
