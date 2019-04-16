<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacynewPhone extends Model
{
    protected $fillable = ['pharmacynew_phone_no', 'pharmacynew_id'];

    protected $table = 'pharmacynew_phone';

    public function pharmacynew()
    {
    	return $this->belongsTo('App\Models\pharmacynew', 'pharmacynew_id');
    }
}
