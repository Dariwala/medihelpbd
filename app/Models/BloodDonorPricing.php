<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonorPricing extends Model
{
   protected $fillable = ['package_details','b_package_details','blood_donor_pricing_id'];

    protected $table = 'blood_donor_pricing';

    public function bloodDonor()
    {
    	return $this->belongsTo('App\Models\BloodDonor', 'blood_donor_id');
    }
}
