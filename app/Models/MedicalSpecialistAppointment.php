<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialistAppointment extends Model
{
    protected  $table="medical_specialist_appointment";

    public function medicalSpecialist()
    {
        return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }
}
