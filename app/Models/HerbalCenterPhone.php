<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenterPhone extends Model
{
    protected $fillable = ['herbal_center_phone_no', 'herbal_center_id'];

    protected $table = 'herbal_center_phone';

    public function herbalCenter()
    {
    	return $this->belongsTo('App\Models\HerbalCenter', 'herbal_center_id');
    }
}
