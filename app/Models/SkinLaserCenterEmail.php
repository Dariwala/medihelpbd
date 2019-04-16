<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinLaserCenterEmail extends Model
{
    protected $fillable = ['skin_laser_center_email_ad', 'skin_laser_center_id'];

    protected $table = 'skin_laser_center_email';

    public function skinLaserCenter()
    {
    	return $this->belongsTo('App\Models\SkinLaserCenter', 'skin_laser_center_id');
    }
}
