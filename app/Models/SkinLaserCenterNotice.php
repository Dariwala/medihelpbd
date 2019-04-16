<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinLaserCenterNotice extends Model
{

    protected $fillable = ['date','b_date','skin_laser_center_notice_title','b_skin_laser_center_notice_title','skin_laser_center_notice_description','b_skin_laser_center_notice_description','skin_laser_center_id'];

    protected $table = 'skin_laser_center_notice';

    public function skinLaserCenter()
    {
    	return $this->belongsTo('App\Models\SkinLaserCenter', 'skin_laser_center_id');
    }
}
