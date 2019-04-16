<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeopathicPhone extends Model
{
    protected $fillable = ['homeopathic_phone_no', 'homeopathic_id'];

    protected $table = 'homeopathic_phone';

    public function homeopathic()
    {
    	return $this->belongsTo('App\Models\homeopathic', 'homeopathic_id');
    }
}
