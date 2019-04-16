<?php

namespace App\Modules\Frontendskinlasercenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SkinLaserCenter;
use App\Models\SkinLaserCenterNotice;
use DB;

class FrontendSkinLaserCenterController extends Controller 
{
    public function viewSkinLaserCenter($skin_laser_center_id,$subdistrict_id)
    {
    	$total_result = DB::table('skin_laser_center')->where('subdistrict_id', $subdistrict_id)->count();
    	$aside_results = SkinLaserCenter::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $skin_laser_center = SkinLaserCenter::find($skin_laser_center_id);
        $phones     = DB::table('skin_laser_center_phone')->where('skin_laser_center_id', $skin_laser_center_id)->get();
        $emails     = DB::table('skin_laser_center_email')->where('skin_laser_center_id', $skin_laser_center_id)->get();

        $notices = SkinLaserCenterNotice::where('skin_laser_center_id', $skin_laser_center_id)->get();
        
        $subdistrict_id = $subdistrict_id;
        
        return view('frontendskinlasercenter::skin_laser_center',compact('skin_laser_center','skin_laser_center_id','phones','emails','notices','total_result','aside_results','subdistrict_id'));
    }
}
