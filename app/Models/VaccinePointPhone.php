<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinePointPhone extends Model
{
    protected $fillable = ['vaccine_point_phone_no', 'vaccine_point_id'];

    protected $table = 'vaccine_point_phone';

    public function vaccinePoint()
    {
    	return $this->belongsTo('App\Models\VaccinePoint', 'vaccine_point_id');
    }
}
