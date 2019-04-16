<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankNotice extends Model
{
    protected $fillable = ['date','b_date','blood_bank_notice_title','b_blood_bank_notice_title','blood_bank_notice_description','b_blood_bank_notice_description','blood_bank_id'];

    protected $table = 'blood_bank_notice';

    public function bloodBank()
    {
    	return $this->belongsTo('App\Models\BloodBank', 'blood_bank_id');
    }
}
