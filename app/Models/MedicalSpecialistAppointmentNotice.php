<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialistAppointmentNotice extends Model
{
    protected  $table = "medical_specialist_appointment_notice";

    public function medicalSpecialist()
    {
        return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }
}
