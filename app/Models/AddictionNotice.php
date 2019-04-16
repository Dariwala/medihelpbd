<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddictionNotice extends Model
{

    protected $fillable = ['date','b_date','addiction_notice_title','b_addiction_notice_title','addiction_notice_description','b_addiction_notice_description','addiction_id'];

    protected $table = 'addiction_notice';

    public function addiction()
    {
    	return $this->belongsTo('App\Models\Addiction', 'addiction_id');
    }
}


