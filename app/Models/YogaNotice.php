<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YogaNotice extends Model
{

    protected $fillable = ['date','b_date','yoga_notice_title','b_yoga_notice_title','yoga_notice_description','b_yoga_notice_description','yoga_id'];

    protected $table = 'yoga_notice';

    public function yoga()
    {
    	return $this->belongsTo('App\Models\Yoga', 'yoga_id');
    }
}


