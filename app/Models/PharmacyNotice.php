<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyNotice extends Model
{
    protected $fillable = [
        'date',
        'b_date',
        'pharmacy_notice_title',
        'b_pharmacy_notice_title',
        'pharmacy_product_description',
        'pharmacy_notice_description',
        'b_pharmacy_notice_description',
        'pharmacy_id',
    ];

    protected $table = 'pharmacy_notice';


    public function pharmacy()
    {
        return $this->belongsTO('App\Models\Pharmacy', 'pharmacy_id');
    }
}
