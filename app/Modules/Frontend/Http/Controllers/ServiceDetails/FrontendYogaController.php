<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Yoga;
use App\Models\YogaPhone;
use App\Models\YogaEmail;
use App\Models\YogaDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\YogaService;
use App\Models\YogaNotice;
use DB;

class FrontendYogaController extends Controller
{
    public function viewYoga($yoga_id,$subdistrict_id)
    {

        $total_result       = DB::table('yoga')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Yoga::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $yoga        = Yoga::find($yoga_id);
        $phones             = DB::table('yoga_phone')->where('yoga_id', $yoga_id)->get();
        $emails             = DB::table('yoga_email')->where('yoga_id', $yoga_id)->get();
        $notices            = YogaNotice::where('yoga_id', $yoga_id)->get();

        $doctors            = YogaDoctor::with('medicalSpecialist','department')->where('yoga_id', $yoga_id)->get();
        $yoga_id     = $yoga_id;

        return view('frontend::ServiceDetails.yoga',compact('yoga','phones','emails','yoga_id','notices','total_result','aside_results','doctors'));

    }
}
