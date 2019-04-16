<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysiotherapyPhone extends Model
{
    protected $fillable = ['physiotherapy_phone_no', 'physiotherapy_id'];

    protected $table = 'physiotherapy_phone';

    public function physiotherapy()
    {
    	return $this->belongsTo('App\Models\physiotherapy', 'physiotherapy_id');
    }
}
