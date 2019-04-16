<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeopathicDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','homeopathic_id'];

    protected $table = 'homeopathic_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function homeopathic()
    {
        return $this->belongsTo('App\Models\Homeopathic', 'homeopathic_id');
    }
}
