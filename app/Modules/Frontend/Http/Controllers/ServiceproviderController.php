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

class ServiceproviderController extends Controller
{
    
    public function pharmacy24hours (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.24-hours-pharmacy', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        #return view('frontend::serviceEntry')->with('sentMessageAlert',$message)->with(compact('data'))->with(compact('status'));
        
    }
    
    public function addictionrehabilitationcenter (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.addiction-rehabilitation-center', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                          });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function airambulance (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.air-ambulance', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                          });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
        // return view('frontend::testmail', compact('reqdata'));
        
    }
    
    public function ambulance (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.ambulance', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function parlourandspa (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.parlour-and-spa', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function bloodbank (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.blood-bank', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function blooddonor (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.blood-donor', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function doctorpanel (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.doctor-panel', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function eyebank (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.eye-bank', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function foreginmedical (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.foreign-medical-info', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function gym (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.gym', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function healthcarecenter (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.health-care-center', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function herbalmedicinecenter (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.herbal-medicine-center', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function homeopathicmedicinecenter (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.homeopathic-medicine-center', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                          });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
        
    }
    
    public function opticalshop (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.optical-shop', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                          });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
        
    }
    
    public function pharmacy (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.pharmacy', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function physiotherapy (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.physiotherapy', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }

    public function skincare (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.skincare', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }

    public function vaccinationcenter (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.vaccination-center', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                           });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
    }
    
    public function yoga (Request $request) {
        
        $reqdata    = $request->toArray();
        
        try{
            $mail_send  = Mail::send('mail-service-provider.yoga', ["data1" => $reqdata], function ($message) use ($reqdata) {
                              $message->to('info@medihelpbd.com');
                              $message->subject($reqdata['subject']);
                          });
  
            if(Session('language') == 'bn'){
                $message = "তথ্য সফলভাবে পাঠানো হয়েছে।";
            }else{
                $message = "Data sent successfully.";    
            }
            
            $status = 1;
                           
        }catch(Exception $e){
            
            if(Session('language') == 'bn'){
                $message = "দুঃখিত! আপনার মেসেজটি পাঠানো যায়নি। অনুগ্রহপূর্বক আবার চেষ্টা করুন।";
            }else{
                $message = "Sorry! Something went wrong. Please try again.";    
            }
            
            $status = 0;
            
        }
        
        $data = commonModules::first();

        Session::flash('enlist_service_message',$message);
        
        return view('frontend::serviceEntry', compact('data', 'message', 'status'));
        
        
        // return view('frontend::testmail', compact('reqdata'));
        
    }
    
}