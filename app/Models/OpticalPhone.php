<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpticalPhone extends Model
{
    protected $fillable = ['optical_phone_no', 'optical_id'];

    protected $table = 'optical_phone';

    public function optical()
    {
    	return $this->belongsTo('App\Models\optical', 'optical_id');
    }
}
