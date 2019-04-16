<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonorPhone extends Model
{
    protected $fillable = ['blood_donor_phone_no', 'blood_donor_id'];

    protected $table = 'blood_donor_phone';

    public function bloodDonor()
    {
    	return $this->belongsTo('App\Models\BloodDonor', 'blood_donor_id');
    }
}
