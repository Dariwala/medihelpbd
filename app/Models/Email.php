<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['hospital_email_ad', 'hospital_id'];

    protected $table = 'hospital_email';

    public function hospital()
    {
    	return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }
}
