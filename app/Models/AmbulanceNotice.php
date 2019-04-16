<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbulanceNotice extends Model
{
    protected $fillable = ['date','b_date','ambulance_notice_title','b_ambulance_notice_title','ambulance_notice_description','b_ambulance_notice_description','ambulance_id'];

    protected $table = 'ambulance_notice';

    public function ambulance()
    {
    	return $this->belongsTo('App\Models\Ambulance', 'ambulance_id');
    }
}
