<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Physiotherapy;
use App\Models\PhysiotherapyPhone;
use App\Models\PhysiotherapyEmail;
use App\Models\PhysiotherapyDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PhysiotherapyProduct;
use App\Models\PhysiotherapyService;
use App\Models\PhysiotherapyNotice;
use DB;

class FrontendPhysiotherapyController extends Controller
{
    public function viewPhysiotherapy($physiotherapy_id,$subdistrict_id)
    {

        $total_result       = DB::table('physiotherapy')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Physiotherapy::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $physiotherapy        = Physiotherapy::find($physiotherapy_id);
        $phones             = DB::table('physiotherapy_phone')->where('physiotherapy_id', $physiotherapy_id)->get();
        $emails             = DB::table('physiotherapy_email')->where('physiotherapy_id', $physiotherapy_id)->get();
        $notices            = PhysiotherapyNotice::where('physiotherapy_id', $physiotherapy_id)->get();

        $doctors            = PhysiotherapyDoctor::with('medicalSpecialist','department')->where('physiotherapy_id', $physiotherapy_id)->get();
        $products           = PhysiotherapyProduct::where('physiotherapy_id', $physiotherapy_id)->get();
        $physiotherapy_id     = $physiotherapy_id;

        return view('frontend::ServiceDetails.physiotherapy',compact('physiotherapy','phones','emails','physiotherapy_id','notices','total_result','aside_results','products','doctors'));

    }
}
