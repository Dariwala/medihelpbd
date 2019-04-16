<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysiotherapyDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','physiotherapy_id'];

    protected $table = 'physiotherapy_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function physiotherapy()
    {
        return $this->belongsTo('App\Models\Physiotherapy', 'physiotherapy_id');
    }
}
