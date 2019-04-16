<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeopathicNotice extends Model
{
    protected $fillable = [
        'date',
        'b_date',
        'homeopathic_notice_title',
        'b_homeopathic_notice_title',
        'homeopathic_product_description',
        'homeopathic_notice_description',
        'b_homeopathic_notice_description',
        'homeopathic_id',
    ];

    protected $table = 'homeopathic_notice';


    public function homeopathic()
    {
        return $this->belongsTO('App\Models\Homeopathic', 'homeopathic_id');
    }
}
