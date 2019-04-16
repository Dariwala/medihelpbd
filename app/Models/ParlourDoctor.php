<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParlourDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','parlour_id'];

    protected $table = 'parlour_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department','department_id');
    }

    public function parlour()
    {
        return $this->belongsTo('App\Models\Parlour', 'parlour_id');
    }
}
