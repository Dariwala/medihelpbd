<?php

namespace App\Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ambulance;
use App\Models\AirAmbulance;
use App\Models\BloodBank;
use App\Models\BloodDonor;
use App\Models\EyeBank;
use App\Models\Hospital;
use App\Models\Pharmacy;
use App\Models\MedicalSpecialist;
use App\Models\HerbalCenter;
use App\Models\VaccinePoint;
use App\Models\SkinLaserCenter;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\commonModules;
use DB;
use Session;
use Mail;

use App\Models\Foreignmedical;
use App\Models\Optical;
use App\Models\Pharmacynew;
use App\Models\Physiotherapy;
use App\Models\Homeopathic;
use App\Models\Addiction;
use App\Models\Gym;
use App\Models\Yoga;
use App\Models\Parlour;

class FrontendController extends Controller
{
    public function vision(){
        
        $data = commonModules::first();
        
        return view('frontend::vision', compact('data'));
    }
    
    public function contact(){
        
        $data = commonModules::first();
        
        $message = "";
        
        $status = 0;
        
        return view('frontend::contact', compact('data', 'message', 'status'));
    }
     public function contactAdmin(Request $request){
       
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mailTo', ["data1" => $reqdata], function ($message) use ($reqdata) {
                               $message->to('info@medihelpbd.com');
                               // $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "আপনার মেসেজের জন্য ধন্যবাদ। আমরা খুব শীঘ্রই আপনার সাথে যোগাযোগ করব।";
            }else{
                $message = "Thank you for your message. We will contact with you very soon.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। দয়া করে আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();
        
        return view('frontend::contact', compact('data', 'message', 'status'));
    }
    public function contactPost(Request $request){
        
        $reqdata    = $request->toArray();
        
        try{
            
            $mail_send  = Mail::send('mail', ["data1" => $reqdata], function ($message) use ($reqdata) {
                               $message->to('info@medihelpbd.com');
                               $message->subject($reqdata['subject']);
                           });
             
            if(Session('language') == 'bn'){
                $message = "আপনার মেসেজের জন্য ধন্যবাদ। আমরা খুব শীঘ্রই আপনার সাথে যোগাযোগ করব।";
            }else{
                $message = "Thank you for your message. We will contact with you very soon.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। দয়া করে আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();
        
        return view('frontend::contact', compact('data', 'message', 'status'));
    }
    
    public function appointment(){
        
        $data = commonModules::first();
        
        return view('frontend::appointment', compact('data'));
    }
    
    public function serviceEntry(){
        
        $data = commonModules::first();
        
        return view('frontend::serviceEntry', compact('data'));
    }
    
    public function faq(){
        
        $data = commonModules::first();
        
        return view('frontend::faq', compact('data'));
    }
    
    public function serviceList(){
        
        $data = commonModules::first();
        
        return view('frontend::serviceList', compact('data'));
    }
    
    public function latestNews(){
        
        $data = commonModules::first();
        
        return view('frontend::latest-news', compact('data'));
    }
    
    public function specialNotice(){
        
        $data = commonModules::first();
        
        return view('frontend::special-notice', compact('data'));
    }
    
    public function viewContactList(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'directoryType'     => 'required',
            'district_name' 	  => 'required',
            'subdistrict_name'  => 'required',
        ]);

       if($data['directoryType'] == 1)
       {

       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Ambulance::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));

       }

       if($data['directoryType'] == 2)
       {

       	$directoryType  = $data['directoryType'];
       	$subdistrict_id = $data['subdistrict_name'];
       	$contacts = Airambulance::where('subdistrict_id',$subdistrict_id)->get();
       	return view('frontend::contact_list',compact('contacts','directoryType'));

       }

       if($data['directoryType'] == 3)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = BloodBank::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 4)
       {
           	$directoryType          = $data['directoryType'];
            $subdistrict_id         = $data['subdistrict_name'];
            $blood_donor_group      = isset($data['sub_directoryType'])? $data['sub_directoryType']: '';
            
            if($blood_donor_group == ''){
                
                if(Session('language') == 'bn') 
                {
                    $contacts           = BloodDonor::where('subdistrict_id', $subdistrict_id)->get();
                }
                else{
                    $contacts           = BloodDonor::where('subdistrict_id', $subdistrict_id)->get();
                }
                
            }else{
                
                if(Session('language') == 'bn') 
                {
                    $contacts           = BloodDonor::where('subdistrict_id', $subdistrict_id)->where('b_blood_donor_subname', $blood_donor_group)->get();
                    
                    if($contacts->count() < 1){
                        $contacts      = BloodDonor::where('subdistrict_id', $subdistrict_id)->where('blood_donor_subname', $blood_donor_group)->get();
                    }
                }
                else{
                    $contacts          = BloodDonor::where('subdistrict_id', $subdistrict_id)->where('blood_donor_subname', $blood_donor_group)->get();
                    
                    if($contacts->count() < 1){
                        $contacts      = BloodDonor::where('subdistrict_id', $subdistrict_id)->where('b_blood_donor_subname', $blood_donor_group)->get();
                    }
                }
                
            }
            
            return view('frontend::contact_list', compact('contacts', 'directoryType'));
       }

       if($data['directoryType'] == 5)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = EyeBank::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }
       
       if($data['directoryType'] == 6)
       {

            $directoryType          = $data['directoryType'];
            $subdistrict_id         = $data['subdistrict_name'];
            $hospital_subname       = isset($data['sub_directoryType'])? $data['sub_directoryType']: '';
            
            if($hospital_subname == ''){
                
                if(Session('language')=='bn') 
                {
                    $contacts = Hospital::where('subdistrict_id',$subdistrict_id)->get();
                }
                else{
                    $contacts = Hospital::where('subdistrict_id',$subdistrict_id)->get();
                }
                
            }else{
                
                if(Session('language')=='bn') 
                {
                    $contacts = Hospital::where('subdistrict_id',$subdistrict_id)->where('b_hospital_subname', $hospital_subname)->get();
                    
                    if($contacts->count() < 1){
                        $contacts = Hospital::where('subdistrict_id',$subdistrict_id)->where('hospital_subname', $hospital_subname)->get();    
                    }
                }
                else{
                    $contacts = Hospital::where('subdistrict_id',$subdistrict_id)->where('hospital_subname', $hospital_subname)->get();
                    
                    if($contacts->count() < 1){
                        $contacts = Hospital::where('subdistrict_id',$subdistrict_id)->where('b_hospital_subname', $hospital_subname)->get();    
                    }
                }
                
            }
            
            return view('frontend::contact_list',compact('contacts','directoryType'));

       }

       if($data['directoryType'] == 7)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Pharmacy::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 8)
       {
           	$directoryType              = $data['directoryType'];
            $subdistrict_id             = $data['subdistrict_name'];
            $medical_specialist_name    = isset($data['sub_directoryType'])? $data['sub_directoryType']: '';
            
            if($medical_specialist_name == ''){
                
                if(Session('language')=='bn') 
                {
                    $contacts = MedicalSpecialist::where('subdistrict_id', $subdistrict_id)->get();
                }
                else{
                    $contacts = MedicalSpecialist::where('subdistrict_id', $subdistrict_id)->get();
                }
                
            }else{
                
                if(Session('language')=='bn') 
                {
                    $contacts = MedicalSpecialist::where('subdistrict_id', $subdistrict_id)->where('b_medical_specialist_subname', $medical_specialist_name)->get();
                    
                    if($contacts->count() < 1){
                        $contacts = MedicalSpecialist::where('subdistrict_id', $subdistrict_id)->where('medical_specialist_subname', $medical_specialist_name)->get();    
                    }
                    
                }
                else{
                    $contacts = MedicalSpecialist::where('subdistrict_id', $subdistrict_id)->where('medical_specialist_subname', $medical_specialist_name)->get();
                    
                    if($contacts->count() < 1){
                        $contacts = MedicalSpecialist::where('subdistrict_id', $subdistrict_id)->where('b_medical_specialist_subname', $medical_specialist_name)->get();    
                    }
                }
                
            }
            
            return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 9)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = HerbalCenter::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 10)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = VaccinePoint::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }
       
       if($data['directoryType'] == 11)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = SkinLaserCenter::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       //New Modules
       if($data['directoryType'] == 12)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Addiction::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 13)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Parlour::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 14)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Foreignmedical::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 15)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Gym::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 16)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Homeopathic::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 17)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Optical::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 18)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Pharmacynew::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 19)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Physiotherapy::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 20)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Yoga::where('subdistrict_id',$subdistrict_id)->get();
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

    }
}
