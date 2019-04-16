<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinLaserCenterPhone extends Model
{
    protected $fillable = ['skin_laser_center_phone_no', 'skin_laser_center_id'];

    protected $table = 'skin_laser_center_phone';

    public function skinLaserCenter()
    {
    	return $this->belongsTo('App\Models\SkinLaserCenter', 'skin_laser_center_id');
    }
}
