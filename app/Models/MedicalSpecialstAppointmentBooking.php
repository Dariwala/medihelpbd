<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialstAppointmentBooking extends Model
{
    protected $table = "medical_specialists_appointment_booking";
    
    public function appointment()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialistAppointment', 'chamber_id');
    }
}
