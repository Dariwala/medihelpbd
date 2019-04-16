<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Optical;
use App\Models\OpticalPhone;
use App\Models\OpticalEmail;
use App\Models\OpticalDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\OpticalProduct;
use App\Models\OpticalService;
use App\Models\OpticalNotice;
use DB;

class FrontendOpticalController extends Controller
{
    public function viewOptical($optical_id,$subdistrict_id)
    {

        $total_result       = DB::table('optical')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Optical::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $optical        = Optical::find($optical_id);
        $phones             = DB::table('optical_phone')->where('optical_id', $optical_id)->get();
        $emails             = DB::table('optical_email')->where('optical_id', $optical_id)->get();
        $notices            = OpticalNotice::where('optical_id', $optical_id)->get();

        $doctors            = OpticalDoctor::with('medicalSpecialist','department')->where('optical_id', $optical_id)->get();
        $products           = OpticalProduct::where('optical_id', $optical_id)->get();
        $optical_id     = $optical_id;

        return view('frontend::ServiceDetails.optical',compact('optical','phones','emails','optical_id','notices','total_result','aside_results','products', 'doctors'));

    }
}
