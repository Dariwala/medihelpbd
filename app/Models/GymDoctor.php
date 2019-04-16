<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','gym_id'];

    protected $table = 'gym_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department','department_id');
    }

    public function gym()
    {
        return $this->belongsTo('App\Models\Gym', 'gym_id');
    }
}
