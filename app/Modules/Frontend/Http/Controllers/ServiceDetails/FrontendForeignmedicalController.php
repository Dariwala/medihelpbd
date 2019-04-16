<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Foreignmedical;
use App\Models\ForeignmedicalPhone;
use App\Models\ForeignmedicalEmail;
use App\Models\ForeignmedicalDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\ForeignmedicalProduct;
use App\Models\ForeignmedicalService;
use App\Models\ForeignmedicalNotice;
use DB;

class FrontendForeignmedicalController extends Controller
{
    public function viewForeignmedical($foreignmedical_id,$subdistrict_id)
    {

        $total_result       = DB::table('foreignmedical')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Foreignmedical::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $foreignmedical     = Foreignmedical::find($foreignmedical_id);
        $phones             = DB::table('foreignmedical_phone')->where('foreignmedical_id', $foreignmedical_id)->get();
        $emails             = DB::table('foreignmedical_email')->where('foreignmedical_id', $foreignmedical_id)->get();
        $notices            = ForeignmedicalNotice::where('foreignmedical_id', $foreignmedical_id)->get();

        $doctors            = ForeignmedicalDoctor::with('medicalSpecialist','department')->where('foreignmedical_id', $foreignmedical_id)->get();
        $foreignmedical_id  = $foreignmedical_id;

        return view('frontend::ServiceDetails.foreignmedical',compact('foreignmedical','phones','emails','foreignmedical_id','notices','total_result','aside_results','doctors'));

    }
}
