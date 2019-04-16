<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddictionDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','addiction_id'];

    protected $table = 'addiction_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department','department_id');
    }

    public function addiction()
    {
        return $this->belongsTo('App\Models\Addiction', 'addiction_id');
    }
}
