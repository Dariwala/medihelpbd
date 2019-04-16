<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpticalNotice extends Model
{
    protected $fillable = [
        'date',
        'b_date',
        'optical_notice_title',
        'b_optical_notice_title',
        'optical_product_description',
        'optical_notice_description',
        'b_optical_notice_description',
        'optical_id',
    ];

    protected $table = 'optical_notice';


    public function optical()
    {
        return $this->belongsTO('App\Models\Optical', 'optical_id');
    }
}
