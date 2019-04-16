<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinePointNotice extends Model
{

    protected $fillable = ['date','b_date','vaccine_point_notice_title','b_vaccine_point_notice_title','vaccine_point_notice_description','b_vaccine_point_notice_description','vaccine_point_id'];

    protected $table = 'vaccine_point_notice';

    public function vaccinePoint()
    {
    	return $this->belongsTo('App\Models\VaccinePoint', 'vaccine_point_id');
    }
}
