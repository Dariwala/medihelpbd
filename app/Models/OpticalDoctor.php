<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpticalDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','optical_id'];

    protected $table = 'optical_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function optical()
    {
        return $this->belongsTo('App\Models\Optical', 'optical_id');
    }
}
