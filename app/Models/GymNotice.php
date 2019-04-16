<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymNotice extends Model
{

    protected $fillable = ['date','b_date','gym_notice_title','b_gym_notice_title','gym_notice_description','b_gym_notice_description','gym_id'];

    protected $table = 'gym_notice';

    public function gym()
    {
    	return $this->belongsTo('App\Models\Gym', 'gym_id');
    }
}


