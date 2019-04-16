<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    
    protected $table = 'notice';


    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function subdistrict()
    {
        return $this->belongsTo('App\Models\SubDistrict', 'sub_district_id');
    }

}
