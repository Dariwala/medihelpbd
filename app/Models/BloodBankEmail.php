<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankEmail extends Model
{
    protected $fillable = ['blood_bank_email_ad', 'blood_bank_id'];

    protected $table = 'blood_bank_email';

    public function bloodBank()
    {
    	return $this->belongsTo('App\Models\BloodBank', 'blood_bank_id');
    }
}
