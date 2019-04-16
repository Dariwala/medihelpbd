<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YogaDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','yoga_id'];

    protected $table = 'yoga_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department','department_id');
    }

    public function yoga()
    {
        return $this->belongsTo('App\Models\Yoga', 'yoga_id');
    }
}
