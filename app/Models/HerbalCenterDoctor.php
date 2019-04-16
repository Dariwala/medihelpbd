<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenterDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','herbal_center_id'];

    protected $table = 'herbal_center_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function herbalCenter()
    {
        return $this->belongsTo('App\Models\HerbalCenter', 'herbal_center_id');
    }
}
