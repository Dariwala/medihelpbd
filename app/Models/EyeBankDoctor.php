<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeBankDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','eye_bank_id'];

    protected $table = 'eye_bank_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department','department_id');
    }

    public function eyeBank()
    {
        return $this->belongsTo('App\Models\EyeBank', 'eye_bank_id');
    }
}
