<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeopathicEmail extends Model
{
    protected $fillable = ['homeopathic_email_ad', 'homeopathic_id'];

    protected $table = 'homeopathic_email';

    public function homeopathic()
    {
    	return $this->belongsTo('App\Models\Homeopathic', 'homeopathic_id');
    }
}
