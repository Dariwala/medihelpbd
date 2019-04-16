<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacynewNotice extends Model
{
    protected $fillable = [
        'date',
        'b_date',
        'pharmacynew_notice_title',
        'b_pharmacynew_notice_title',
        'pharmacynew_product_description',
        'pharmacynew_notice_description',
        'b_pharmacynew_notice_description',
        'pharmacynew_id',
    ];

    protected $table = 'pharmacynew_notice';


    public function pharmacynew()
    {
        return $this->belongsTO('App\Models\Pharmacynew', 'pharmacynew_id');
    }
}
