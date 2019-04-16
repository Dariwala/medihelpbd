<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinLaserCenterDoctor extends Model
{
    protected $fillable = ['department_id', 'medical_specialist_id','skin_laser_center_id'];

    protected $table = 'skin_laser_center_doctor';

    public function medicalSpecialist()
    {
    	return $this->belongsTo('App\Models\MedicalSpecialist', 'medical_specialist_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function skinLaserCenter()
    {
        return $this->belongsTo('App\Models\SkinLaserCenter', 'skin_laser_center_id');
    }
}
