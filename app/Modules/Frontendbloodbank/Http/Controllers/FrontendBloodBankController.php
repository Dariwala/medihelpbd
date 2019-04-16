<?php

namespace App\Modules\Frontendbloodbank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\BloodBankNotice;
use DB;

class FrontendBloodBankController extends Controller
{
    public function viewBloodBank($blood_bank_id,$subdistrict_id)
    {
    	$total_result = DB::table('blood_bank')->where('subdistrict_id', $subdistrict_id)->count();
    	$aside_results = BloodBank::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $blood_bank = BloodBank::find($blood_bank_id);
        $phones     = DB::table('blood_bank_phone')->where('blood_bank_id', $blood_bank_id)->get();
        $emails     = DB::table('blood_bank_email')->where('blood_bank_id', $blood_bank_id)->get();

        $notices = BloodBankNotice::where('blood_bank_id', $blood_bank_id)->get();
        
        $subdistrict_id = $subdistrict_id;

        return view('frontendbloodbank::blood_bank',compact('blood_bank','blood_bank_id','phones','emails','notices','total_result','aside_results', 'subdistrict_id'));
    }
}
