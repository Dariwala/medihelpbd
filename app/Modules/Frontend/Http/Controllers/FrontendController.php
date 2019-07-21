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
        
        return view('frontend::contact', compact('data'));
    }
    public function reportDelivery(){
        
        $data = commonModules::first();
        
        return view('frontend::report_delivery', compact('data'));
    }
     public function contactAdmin(Request $request){
       
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mailTo', ["data1" => $reqdata], function ($message) use ($reqdata) {
                               $message->to('info@medihelpbd.com');
                               // $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "মেসেজ সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Message sent successfully.";    
            }
            
            //$status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। দয়া করে আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            //$status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('contact_message',$message);
        
        return view('frontend::contact', compact('data'));
    }
    public function contactPost(Request $request){
        
        $reqdata    = $request->toArray();
        
        try{
            
            $mail_send  = Mail::send('mail', ["data1" => $reqdata], function ($message) use ($reqdata) {
                               $message->to('info@medihelpbd.com');
                               $message->subject($reqdata['subject']);
                           });
             
            if(Session('language') == 'bn'){
                $message = "মেসেজ সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Message sent successfully.";    
            }
            
            //$status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। দয়া করে আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            //$status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('contact_message',$message);

        return view('frontend::contact', compact('data'));
    }

    public function reportDeliveryPost(Request $request){

        try{

            if($request->hasFile('user_photo'))
            {
                $file = $request->file('user_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $phone = $request->phone_number;
                $new_file_name = $phone.'.'.$file_extention;

                $success = $file->move('uploads/report_delivery',$new_file_name);
                
            }
            $reqdata    = $request->toArray();
            $reqdata['photo_path'] = 'uploads/report_delivery/'.$new_file_name;

            $mail_send  = Mail::send('report_delivery', ["data1" => $reqdata], function ($message) use ($reqdata) {
                $message->to('info@medihelpbd.com');
                $message->subject('Report Delivery');
            });

            if(Session('language') == 'bn'){
                $message = "পরিশোধিত টাকার রশিদ সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Paid Money Receipt sent successfully.";    
            }
                    
            }catch(Exception $e){
                
                if(Session('language') == 'bn'){
                    $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। দয়া করে আবার চেষ্টা করুন।";
                }else{
                    $message = "Sorry! Something went wrong. Please try again.";    
                }
                
                //$status = 0;
                
            }
        
        
        $data = commonModules::first();

        Session::flash('delivery_message',$message);

        $files = array_diff(scandir('uploads/report_delivery'), array('.', '..'));;
        foreach($files as $file)
        {
            $fpath = 'uploads/report_delivery/'.$file;

            if(file_exists($fpath))
            {
                $modified = strtotime(date ("F d Y H:i:s.", filemtime($fpath)));
                $date = strtotime(date('m/d/Y h:i:s a', time()));
                if($date - $modified>500)
                {
                    unlink($fpath);
                }
            }
        }

        return view('frontend::report_delivery', compact('data'));
    }
    
    public function appointment(){
        
        $data = commonModules::first();
        
        return view('frontend::appointment', compact('data'));
    }

    public function emergency_helpline(){
        $data = commonModules::first();

        return view('frontend::emergency_helpline',compact('data'));
    }
    
    public function serviceEntry(){
        
        $data = commonModules::first();
        $message = '';
        
        return view('frontend::serviceEntry', compact('data','message'));
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
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় অ্যাম্বুলেন্সের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Ambulance.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));

       }

       if($data['directoryType'] == 2)
       {

       	$directoryType  = $data['directoryType'];
       	$subdistrict_id = $data['subdistrict_name'];
        $contacts = Airambulance::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় এয়ার অ্যাম্বুলেন্সের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Air Ambulance.");
            }
            return back();
        }   
       	return view('frontend::contact_list',compact('contacts','directoryType'));

       }

       if($data['directoryType'] == 3)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = BloodBank::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ব্লাড ব্যাংকের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Blood Bank.");
            }
            return back();
        }
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
            $district_info = District::where('id',$data['district_name'])->first();
            $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
            $district_name_updated = str_replace("'","",$district_info->district_name);
            $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
            if(count($contacts) ==0){
                if(Session('language') == 'bn')
                {
                    Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ব্লাড ডোনারের কোন তথ্য পাওয়া যায়নি।");
                }
                else
                {
                    Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Blood Donor.");
                }
                return back();
            }
            
            return view('frontend::contact_list', compact('contacts', 'directoryType'));
       }

       if($data['directoryType'] == 5)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = EyeBank::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় আই ব্যাংকের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Eye Bank.");
            }
            return back();
        }
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

            $district_info = District::where('id',$data['district_name'])->first();
            $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
            $district_name_updated = str_replace("'","",$district_info->district_name);
            $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
            if(count($contacts) ==0){
                if(Session('language') == 'bn')
                {
                    Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় হেল্‌থ কেয়ার সেন্টারের কোন তথ্য পাওয়া যায়নি।");
                }
                else
                {
                    Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Health Care Center.");
                }
                return back();
            }
            
            return view('frontend::contact_list',compact('contacts','directoryType'));

       }

       if($data['directoryType'] == 7)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Pharmacy::where('subdistrict_id',$subdistrict_id)->get();

        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ২৪ আউয়ারস্‌ ফার্মেসীর কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service 24 Hours Pharmacy.");
            }
            return back();
        }
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
            $district_info = District::where('id',$data['district_name'])->first();
            $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
            $district_name_updated = str_replace("'","",$district_info->district_name);
            $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
            if(count($contacts) ==0){
                if(Session('language') == 'bn')
                {
                    Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ডক্টরস্‌ প্যানেলের কোন তথ্য পাওয়া যায়নি।");
                }
                else
                {
                    Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Doctors Panel.");
                }
                return back();
            }
            
            return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 9)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = HerbalCenter::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় হারবাল মেডিসিন সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Herbal Medicine Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 10)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = VaccinePoint::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ভ্যাকসিনেশন সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Vaccination Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }
       
       if($data['directoryType'] == 11)
       {
       	$directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = SkinLaserCenter::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় স্কিন কেয়ার অ্যান্ড লেজার সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Skin Care \u0026 Laser Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       //New Modules
       if($data['directoryType'] == 12)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Addiction::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় অ্যাডিকশন রিহ্যাবিলিটেশন সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Addiction Rehabilitation Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 13)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Parlour::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় বিউটি পার্লার অ্যান্ড স্পার কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Beauty Parlour \u0026 Spa.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 14)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Foreignmedical::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ফরেন মেডিক্যাল ইনফরমেশন সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Foreign Medical Information Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 15)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Gym::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় জিমের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Gym.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 16)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Homeopathic::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় হোমিওপ্যাথিক মেডিসিন সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Homeopathic Medicine Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 17)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Optical::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় অপটিক্যাল সপের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Optical Shop.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 18)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Pharmacynew::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ফার্মেসীর কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Pharmacy.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 19)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Physiotherapy::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ফিজিওথেরাপি অ্যান্ড রিহ্যাবিলিটেশন সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Physiotherapy \u0026 Rehabilitation Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

       if($data['directoryType'] == 20)
       {
        $directoryType  = $data['directoryType'];
        $subdistrict_id = $data['subdistrict_name'];
        $contacts = Yoga::where('subdistrict_id',$subdistrict_id)->get();
        $district_info = District::where('id',$data['district_name'])->first();
        $subdistrict_info = SubDistrict::where('id',$subdistrict_id)->first();
        $district_name_updated = str_replace("'","",$district_info->district_name);
        $subdistrict_name_updated = str_replace("'","",$subdistrict_info->sub_district_name);
        if(count($contacts) ==0){
            if(Session('language') == 'bn')
            {
                Session::flash('message', "দুঃখিত, ".trim($district_info->b_district_name)." জেলার ".trim($subdistrict_info->b_sub_district_name)." উপজেলায় ইয়োগা সেন্টারের কোন তথ্য পাওয়া যায়নি।");
            }
            else
            {
                Session::flash('message', "Sorry, no data could be found for District ".trim($district_name_updated).", Sub-District ".trim($subdistrict_name_updated).", Service Yoga Center.");
            }
            return back();
        }
        return view('frontend::contact_list',compact('contacts','directoryType'));
       }

    }
}