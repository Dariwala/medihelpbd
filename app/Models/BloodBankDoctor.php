<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','blood_bank_id'];

    protected $table = 'blood_bank_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function bloodBank()
    {
        return $this->belongsTo('App\Models\BloodBank', 'blood_bank_id');
    }
}
