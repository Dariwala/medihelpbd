<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignmedicalNotice extends Model
{
    protected $fillable = [
        'date',
        'b_date',
        'foreignmedical_notice_title',
        'b_foreignmedical_notice_title',
        'foreignmedical_product_description',
        'foreignmedical_notice_description',
        'b_foreignmedical_notice_description',
        'foreignmedical_id',
    ];

    protected $table = 'foreignmedical_notice';


    public function foreignmedical()
    {
        return $this->belongsTO('App\Models\Foreignmedical', 'foreignmedical_id');
    }
}
