<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyEmail extends Model
{
    protected $fillable = ['pharmacy_email_ad', 'pharmacy_id'];

    protected $table = 'pharmacy_email';

    public function pharmacy()
    {
    	return $this->belongsTo('App\Models\Pharmacy', 'pharmacy_id');
    }
}
