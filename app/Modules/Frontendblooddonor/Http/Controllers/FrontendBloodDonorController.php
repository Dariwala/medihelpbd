<?php

namespace App\Modules\Frontendblooddonor\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BloodDonor;
use App\Models\BloodDonorPricing;

use DB;

class FrontendBloodDonorController extends Controller
{
    public function viewBloodDonor($blood_donor_id,$subdistrict_id)
    {
    	
    	$blood_donor        = BloodDonor::find($blood_donor_id); 
    	
    	if(isset($blood_donor->blood_donor_subname) && Session('language') != 'bn'){
            
            $blood_donor_subname       = $blood_donor->blood_donor_subname;
            
        }
        else if(isset($blood_donor->b_blood_donor_subname) && Session('language') == 'bn'){
            
            $blood_donor_subname       = $blood_donor->b_blood_donor_subname;
            
        }
        else{
            
            $blood_donor_subname       = '';
            
        }
        
        if($blood_donor_subname == ''){
            
            if(Session('language')=='bn') 
            {
                $total_result   = DB::table('blood_donor')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results  = BloodDonor::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            else{
                $total_result = DB::table('blood_donor')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results = BloodDonor::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            
        }else{
            
            if(Session('language')=='bn') 
            {
                $total_result = DB::table('blood_donor')->where('subdistrict_id', $subdistrict_id)->where('b_blood_donor_subname', $blood_donor_subname)->count();
    	        $aside_results = BloodDonor::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('b_blood_donor_subname', $blood_donor_subname)->get();
    	        
            }
            else{
                $total_result = DB::table('blood_donor')->where('subdistrict_id', $subdistrict_id)->where('blood_donor_subname', $blood_donor_subname)->count();
    	        $aside_results = BloodDonor::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('blood_donor_subname', $blood_donor_subname)->get();
            }
            
        }


        $prices = BloodDonorPricing::where('blood_donor_id', $blood_donor_id)->get();
        $phones = DB::table('blood_donor_phone')->where('blood_donor_id', $blood_donor_id)->get();
        $emails = DB::table('blood_donor_email')->where('blood_donor_id', $blood_donor_id)->get();

        return view('frontendblooddonor::blood_donor',compact('blood_donor','phones','emails','total_result','aside_results','prices'));
    }
}
