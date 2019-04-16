<?php

namespace App\Modules\Frontendambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ambulance;
use App\Models\AmbulancePricing;
use App\Models\AmbulanceNotice;
use DB;

class FrontendAmbulanceController extends Controller
{
    public function viewAmbulance($ambulance_id,$subdistrict_id)
    {
    	$total_result = DB::table('ambulance')->where('subdistrict_id', $subdistrict_id)->count();
    	$aside_results = Ambulance::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
        $ambulance = Ambulance::find($ambulance_id);
        $phones     = DB::table('ambulance_phone')->where('ambulance_id', $ambulance_id)->get();
        $emails     = DB::table('ambulance_email')->where('ambulance_id', $ambulance_id)->get();

        $prices = AmbulancePricing::where('ambulance_id', $ambulance_id)->get();

        $notices = AmbulanceNotice::where('ambulance_id', $ambulance_id)->get();

        return view('frontendambulance::ambulance',compact('ambulance','phones','emails','prices','notices','total_result','aside_results'));
    }
}