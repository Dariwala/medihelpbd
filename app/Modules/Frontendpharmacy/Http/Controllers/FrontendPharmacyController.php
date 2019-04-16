<?php

namespace App\Modules\Frontendpharmacy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Notice;
use App\Models\Pharmacy;
use App\Models\PharmacyNotice;
use App\Models\PharmacyProduct;
use DB;

class FrontendPharmacyController extends Controller
{
    public function viewPharmacy($pharmacy_id, $subdistrict_id)
    {
    	$total_result = DB::table('pharmacy')->where('subdistrict_id', $subdistrict_id)->count();
    	$aside_results = Pharmacy::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();

        $pharmacy   = Pharmacy::find($pharmacy_id);
        $phones     = DB::table('pharmacy_phone')->where('pharmacy_id', $pharmacy_id)->get();
        $emails     = DB::table('pharmacy_email')->where('pharmacy_id', $pharmacy_id)->get();
        $products   = PharmacyProduct::where('pharmacy_id', $pharmacy_id)->get();

        $notices    = PharmacyNotice::where('pharmacy_id', $pharmacy_id)->get();
        
        $subdistrict_id = $subdistrict_id;
        
        $notices    = Notice::where('sub_district_id',$subdistrict_id)->get();

        return view('frontendpharmacy::pharmacy',compact('pharmacy','pharmacy_id','phones','emails','notices','total_result','aside_results','products', 'subdistrict_id'));
    }
}
