<?php

namespace App\Modules\Frontendhospital\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Hospital;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\HospitalPhone;
use App\Models\HospitalEmail;
use App\Models\HospitalPricing;
use App\Models\HospitalNotice;
use DB;

class FrontendHospitalController extends Controller
{
	public function viewHospital($hospital_id, $subdistrict_id)
    {
        $hospital                   = Hospital::find($hospital_id); 
        
        if(isset($hospital->hospital_subname) && Session('language') != 'bn'){
            
            $hospital_subname       = $hospital->hospital_subname;
            
        }
        else if(isset($hospital->b_hospital_subname) && Session('language') == 'bn'){
            
            $hospital_subname       = $hospital->b_hospital_subname;
            
        }
        else{
            
            $hospital_subname       = '';
            
        }
        
        if($hospital_subname == ''){
            
            if(Session('language')=='bn') 
            {
                $total_result   = DB::table('hospital')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results  = Hospital::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            else{
                $total_result   = DB::table('hospital')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results  = Hospital::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            
        }else{
            
            if(Session('language')=='bn') 
            {
                $total_result   = DB::table('hospital')->where('subdistrict_id', $subdistrict_id)->where('b_hospital_subname', $hospital_subname)->count();
    	        $aside_results  = Hospital::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('b_hospital_subname', $hospital_subname)->get();
            }
            else{
                $total_result   = DB::table('hospital')->where('subdistrict_id', $subdistrict_id)->where('hospital_subname', $hospital_subname)->count();
    	        $aside_results  = Hospital::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('hospital_subname', $hospital_subname)->get();
            }
            
        }
            

        $phones     = DB::table('hospital_phone')->where('hospital_id', $hospital_id)->get();
        $emails     = DB::table('hospital_email')->where('hospital_id', $hospital_id)->get();

        $notices    = HospitalNotice::where('hospital_id', $hospital_id)->get(); 
        
        $subdistrict_id = $subdistrict_id;

        return view('frontendhospital::hospital', compact('hospital', 'hospital_id', 'phones', 'emails', 'notices', 'total_result', 'aside_results', 'subdistrict_id'));
    }
}
