<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','pharmacy_id'];

    protected $table = 'pharmacy_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function pharmacy()
    {
        return $this->belongsTo('App\Models\Pharmacy', 'pharmacy_id');
    }
}
