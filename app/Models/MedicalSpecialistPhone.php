<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialistPhone extends Model
{
    protected $fillable = ['medical_specialist_phone_no', 'medical_specialist_id'];

    protected $table = 'medical_specialist_phone';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }
}
