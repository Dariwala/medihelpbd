<?php

namespace App\Modules\Frontend\Http\Controllers\ServiceDetails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gym;
use App\Models\GymPhone;
use App\Models\GymEmail;
use App\Models\GymDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\GymProduct;
use App\Models\GymService;
use App\Models\GymNotice;
use DB;

class FrontendGymController extends Controller
{
    public function viewGym($gym_id,$subdistrict_id)
    {

        $total_result       = DB::table('gym')->where('subdistrict_id', $subdistrict_id)->count();
        $aside_results      = Gym::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $gym                = Gym::find($gym_id);
        $phones             = DB::table('gym_phone')->where('gym_id', $gym_id)->get();
        $emails             = DB::table('gym_email')->where('gym_id', $gym_id)->get();
        $notices            = GymNotice::where('gym_id', $gym_id)->get();

        $doctors            = GymDoctor::with('medicalSpecialist','department')->where('gym_id', $gym_id)->get();
        $gym_id             = $gym_id;

        return view('frontend::ServiceDetails.gym',compact('gym','phones','emails','gym_id','notices','total_result','aside_results','doctors'));

    }
}
