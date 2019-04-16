<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysiotherapyNotice extends Model
{
    protected $fillable = [
        'date',
        'b_date',
        'physiotherapy_notice_title',
        'b_physiotherapy_notice_title',
        'physiotherapy_product_description',
        'physiotherapy_notice_description',
        'b_physiotherapy_notice_description',
        'physiotherapy_id',
    ];

    protected $table = 'physiotherapy_notice';


    public function physiotherapy()
    {
        return $this->belongsTO('App\Models\Physiotherapy', 'physiotherapy_id');
    }
}
