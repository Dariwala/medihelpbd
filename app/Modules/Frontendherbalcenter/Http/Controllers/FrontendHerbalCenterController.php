<?php

namespace App\Modules\Frontendherbalcenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HerbalCenter;
use App\Models\HerbalCenterNotice;
use App\Models\HerbalCenterProduct;
use DB;

class FrontendHerbalCenterController extends Controller
{
    public function viewHerbalCenter($herbal_center_id,$subdistrict_id)
    {
    	$total_result = DB::table('herbal_center')->where('subdistrict_id', $subdistrict_id)->count();
    	$aside_results = HerbalCenter::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $herbal_center = HerbalCenter::find($herbal_center_id);
        $phones     = DB::table('herbal_center_phone')->where('herbal_center_id', $herbal_center_id)->get();
        $emails     = DB::table('herbal_center_email')->where('herbal_center_id', $herbal_center_id)->get();

        $notices = HerbalCenterNotice::where('herbal_center_id', $herbal_center_id)->get();
        $products = HerbalCenterProduct::where('herbal_center_id', $herbal_center_id)->get();
        
        $subdistrict_id = $subdistrict_id;
        
        return view('frontendherbalcenter::herbal_center',compact('herbal_center','herbal_center_id','phones','emails','notices','total_result','aside_results','products', 'subdistrict_id'));
    }
}
