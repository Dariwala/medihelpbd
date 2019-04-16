<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerbalCenterEmail extends Model
{
    protected $fillable = ['herbal_center_email_ad', 'herbal_center_id'];

    protected $table = 'herbal_center_email';

    public function herbalCenter()
    {
    	return $this->belongsTo('App\Models\HerbalCenter', 'herbal_center_id');
    }
}
