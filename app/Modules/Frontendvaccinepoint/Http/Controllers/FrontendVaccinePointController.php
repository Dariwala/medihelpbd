<?php

namespace App\Modules\Frontendvaccinepoint\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\VaccinePoint;
use App\Models\VaccinePointNotice;
use DB;

class FrontendVaccinePointController extends Controller
{
    public function viewVaccinePoint($vaccine_point_id,$subdistrict_id)
    {
    	$total_result = DB::table('vaccine_point')->where('subdistrict_id', $subdistrict_id)->count();
    	$aside_results = VaccinePoint::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $vaccine_point = VaccinePoint::find($vaccine_point_id);
        $phones     = DB::table('vaccine_point_phone')->where('vaccine_point_id', $vaccine_point_id)->get();
        $emails     = DB::table('vaccine_point_email')->where('vaccine_point_id', $vaccine_point_id)->get();

        $notices = VaccinePointNotice::where('vaccine_point_id', $vaccine_point_id)->get();
        
        $subdistrict_id = $subdistrict_id;
        
        return view('frontendvaccinepoint::vaccine_point',compact('vaccine_point','vaccine_point_id','phones','emails','notices','total_result','aside_results','subdistrict_id'));
    }
}

