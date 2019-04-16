<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankPhone extends Model
{
    protected $fillable = ['blood_bank_phone_no', 'blood_bank_id'];

    protected $table = 'blood_bank_phone';

    public function bloodBank()
    {
    	return $this->belongsTo('App\Models\BloodBank', 'blood_bank_id');
    }
}
