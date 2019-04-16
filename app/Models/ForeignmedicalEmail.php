<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignmedicalEmail extends Model
{
    protected $fillable = ['foreignmedical_email_ad', 'foreignmedical_id'];

    protected $table = 'foreignmedical_email';

    public function foreignmedical()
    {
    	return $this->belongsTo('App\Models\Foreignmedical', 'foreignmedical_id');
    }
}
