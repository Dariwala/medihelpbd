<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParlourNotice extends Model
{

    protected $fillable = ['date','b_date','parlour_notice_title','b_parlour_notice_title','parlour_notice_description','b_parlour_notice_description','parlour_id'];

    protected $table = 'parlour_notice';

    public function parlour()
    {
    	return $this->belongsTo('App\Models\Parlour', 'parlour_id');
    }
}


