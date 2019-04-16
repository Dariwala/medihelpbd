<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignmedicalDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','foreignmedical_id'];

    protected $table = 'foreignmedical_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function foreignmedical()
    {
        return $this->belongsTo('App\Models\Foreignmedical', 'foreignmedical_id');
    }
}
