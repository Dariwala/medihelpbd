<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacynewEmail extends Model
{
    protected $fillable = ['pharmacynew_email_ad', 'pharmacynew_id'];

    protected $table = 'pharmacynew_email';

    public function pharmacynew()
    {
    	return $this->belongsTo('App\Models\Pharmacynew', 'pharmacynew_id');
    }
}
