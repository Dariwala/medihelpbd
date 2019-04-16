<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignmedicalPhone extends Model
{
    protected $fillable = ['foreignmedical_phone_no', 'foreignmedical_id'];

    protected $table = 'foreignmedical_phone';

    public function foreignmedical()
    {
    	return $this->belongsTo('App\Models\foreignmedical', 'foreignmedical_id');
    }
}
