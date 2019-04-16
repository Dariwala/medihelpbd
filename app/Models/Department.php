<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = array('department_name', 'b_department_name');

    protected $table = 'department';


    public function medicalSpecialists()
    {
        return $this->hasMany('App\Models\MedicalSpecialist', 'department_id');
    }

    public function hospitalDoctor()
    {
        return $this->hasMany('App\Models\HospitalDoctor', 'department_id');
    }
}
