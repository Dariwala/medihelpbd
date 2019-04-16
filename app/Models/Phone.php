<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['hospital_phone_no', 'hospital_id'];

    protected $table = 'hospital_phone';

    public function hospital()
    {
    	return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }
}
