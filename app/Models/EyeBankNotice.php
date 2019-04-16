<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeBankNotice extends Model
{
    protected $fillable = ['date','b_date','eye_bank_notice_title','b_eye_bank_notice_title','eye_bank_notice_description','b_eye_bank_notice_description','eye_bank_id'];

    protected $table = 'eye_bank_notice';

    public function eyeBank()
    {
    	return $this->belongsTo('App\Models\EyeBank', 'eye_bank_id');
    }
}
