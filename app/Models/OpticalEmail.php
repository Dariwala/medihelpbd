<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpticalEmail extends Model
{
    protected $fillable = ['optical_email_ad', 'optical_id'];

    protected $table = 'optical_email';

    public function optical()
    {
    	return $this->belongsTo('App\Models\Optical', 'optical_id');
    }
}
