<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonorEmail extends Model
{
    protected $fillable = ['blood_donor_email_ad', 'blood_donor_id'];

    protected $table = 'blood_donor_email';

    public function bloodDonor()
    {
    	return $this->belongsTo('App\Models\BloodDonor', 'blood_donor_id');
    }
}
