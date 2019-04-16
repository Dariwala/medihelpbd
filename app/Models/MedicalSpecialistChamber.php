<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialistChamber extends Model
{
    protected $fillable = ['medical_specialist_chamber_name','b_medical_specialist_chamber_name','medical_specialist_chamber_description','b_medical_specialist_chamber_description', 'medical_specialist_id'];

    protected $table = 'medical_specialist_chamber';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }
    
}
