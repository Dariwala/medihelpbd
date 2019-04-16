<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialistEmail extends Model
{
    protected $fillable = ['medical_specialist_email_ad', 'medical_specialist_id'];

    protected $table = 'medical_specialist_email';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }
}
