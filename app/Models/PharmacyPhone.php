<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyPhone extends Model
{
    protected $fillable = ['pharmacy_phone_no', 'pharmacy_id'];

    protected $table = 'pharmacy_phone';

    public function pharmacy()
    {
    	return $this->belongsTo('App\Models\pharmacy', 'pharmacy_id');
    }
}
