<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialist extends Model
{
    protected $fillable = [
        'medical_specialist_name',
        'b_medical_specialist_name',
        'medical_specialist_subname',
        'b_medical_specialist_subname',
        'medical_specialist_photo',
        'photo_path',
        'medical_specialist_description',
        'b_medical_specialist_description',
        'medical_specialist_details',
        'b_medical_specialist_details',
        'medical_specialist_fb_link',
        'medical_specialist_web_link',
        'fee_new',
        'b_fee_new',
        'fee_old',
        'b_fee_old',
        'fee_report',
        'b_fee_report',
        'medical_specialist_address',
        'b_medical_specialist_address',
        'department_id',
        'district_id',
        'subdistrict_id',
    ];

    protected $table = 'medical_specialist';

    public function district()
    {
    	return $this->belongsTO('App\Models\District','district_id');

    }
    public function subDistrict()
    {
    	return $this->belongsTO('App\Models\SubDistrict', 'subdistrict_id');
    }

    public function department()
    {
        return $this->belongsTO('App\Models\Department', 'department_id');
    }

    public function phones()
    {
        return $this->hasMany('App\Models\MedicalSpecialistPhone', 'medical_specialist_id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\MedicalSpecialistEmail', 'medical_specialist_id');
    }

    public function medicalSpecialistServices()
    {
        return $this->hasMany('App\Models\MedicalSpecialistService', 'medical_specialist_id');
    }

    public function medicalSpecialistNotices()
    {
        return $this->hasMany('App\Models\MedicalSpecialistNotice', 'medical_specialist_id');
    }

    public function medicalSpecialistChambers()
    {
        return $this->hasMany('App\Models\MedicalSpecialistChamber', 'medical_specialist_id');
    }
    
    
    public function medicalSpecialistAppointments()
    {
        return $this->hasMany('App\Models\MedicalSpecialistAppointment', 'medical_specialist_id');
    }
    
    public function medicalSpecialistAppointmentsNotice()
    {
        return $this->hasMany('App\Models\MedicalSpecialistAppointmentNotice', 'medical_specialist_id');
    }
    
    
}