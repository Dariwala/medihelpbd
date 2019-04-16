<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parlour;
use App\Models\ParlourPhone;
use App\Models\ParlourEmail;
use App\Models\ParlourDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\ParlourProduct;
use App\Models\ParlourService;
use App\Models\ParlourNotice;
use DB;

class FrontendParlourController extends Controller
{
    public function viewParlour($parlour_id,$subdistrict_id)
    {

        $total_result       = DB::table('parlour')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Parlour::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $parlour        = Parlour::find($parlour_id);
        $phones             = DB::table('parlour_phone')->where('parlour_id', $parlour_id)->get();
        $emails             = DB::table('parlour_email')->where('parlour_id', $parlour_id)->get();
        $notices            = ParlourNotice::where('parlour_id', $parlour_id)->get();

        $doctors            = ParlourDoctor::with('medicalSpecialist','department')->where('parlour_id', $parlour_id)->get();
        $parlour_id     = $parlour_id;

        return view('frontend::ServiceDetails.parlour',compact('parlour','phones','emails','parlour_id','notices','total_result','aside_results','doctors'));

    }
}
