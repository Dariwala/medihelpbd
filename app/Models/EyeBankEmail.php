<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeBankEmail extends Model
{
    protected $fillable = ['eye_bank_email_ad', 'eye_bank_id'];

    protected $table = 'eye_bank_email';

    public function eyeBank()
    {
    	return $this->belongsTo('App\Models\EyeBank', 'eye_bank_id');
    }
}
