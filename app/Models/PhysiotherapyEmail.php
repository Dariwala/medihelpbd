<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysiotherapyEmail extends Model
{
    protected $fillable = ['physiotherapy_email_ad', 'physiotherapy_id'];

    protected $table = 'physiotherapy_email';

    public function physiotherapy()
    {
    	return $this->belongsTo('App\Models\Physiotherapy', 'physiotherapy_id');
    }
}
