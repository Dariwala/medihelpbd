<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeBankPhone extends Model
{
    protected $fillable = ['eye_bank_phone_no', 'eye_bank_id'];

    protected $table = 'eye_bank_phone';

    public function eyeBank()
    {
    	return $this->belongsTo('App\Models\EyeBank', 'eye_bank_id');
    }
}
