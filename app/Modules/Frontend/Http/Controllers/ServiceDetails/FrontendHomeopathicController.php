<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Homeopathic;
use App\Models\HomeopathicPhone;
use App\Models\HomeopathicEmail;
use App\Models\HomeopathicDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\HomeopathicProduct;
use App\Models\HomeopathicService;
use App\Models\HomeopathicNotice;
use DB;

class FrontendHomeopathicController extends Controller
{
    public function viewHomeopathic($homeopathic_id,$subdistrict_id)
    {

        $total_result       = DB::table('homeopathic')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Homeopathic::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $homeopathic        = Homeopathic::find($homeopathic_id);
        $phones             = DB::table('homeopathic_phone')->where('homeopathic_id', $homeopathic_id)->get();
        $emails             = DB::table('homeopathic_email')->where('homeopathic_id', $homeopathic_id)->get();
        $notices            = HomeopathicNotice::where('homeopathic_id', $homeopathic_id)->get();

        $doctors            = HomeopathicDoctor::with('medicalSpecialist','department')->where('homeopathic_id', $homeopathic_id)->get();
        $products           = HomeopathicProduct::where('homeopathic_id', $homeopathic_id)->get();
        $homeopathic_id     = $homeopathic_id;

        return view('frontend::ServiceDetails.homeopathic',compact('homeopathic','phones','emails','homeopathic_id','notices','total_result','aside_results', 'products', 'doctors'));

    }
}
