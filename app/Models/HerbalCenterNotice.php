<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenterNotice extends Model
{

    protected $fillable = ['date','b_date','herbal_center_notice_title','b_herbal_center_notice_title','herbal_center_notice_description','b_herbal_center_notice_description','herbal_center_id'];

    protected $table = 'herbal_center_notice';

    public function herbalCenter()
    {
    	return $this->belongsTo('App\Models\HerbalCenter', 'herbal_center_id');
    }
}
