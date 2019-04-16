<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacynewDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','pharmacynew_id'];

    protected $table = 'pharmacynew_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function pharmacynew()
    {
        return $this->belongsTo('App\Models\Pharmacynew', 'pharmacynew_id');
    }
}
