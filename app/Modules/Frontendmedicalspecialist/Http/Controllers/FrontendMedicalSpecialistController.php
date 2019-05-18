<?php

namespace App\Modules\Frontendmedicalspecialist\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MedicalSpecialist;
use App\Models\MedicalSpecialistChember;
use App\Models\MedicalSpecialistNotice;
use App\Models\MedicalSpecialistAppointmentNotice;
use App\Models\MedicalSpecialistAppointment;
use App\Models\MedicalSpecialistChamber;
use App\Models\MedicalSpecialstAppointmentBooking;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class FrontendMedicalSpecialistController extends Controller
{
    public function viewMedicalSpecialist($medical_specialist_id,$subdistrict_id)
    {
    	
    	$medical_specialist = MedicalSpecialist::find($medical_specialist_id);
    	
    	if(isset($medical_specialist->medical_specialist_subname) && Session('language') != 'bn'){
            
            $medical_specialist_subname       = $medical_specialist->medical_specialist_subname;
            
        }
        else if(isset($medical_specialist->b_medical_specialist_subname) && Session('language') == 'bn'){
            
            $medical_specialist_subname       = $medical_specialist->b_medical_specialist_subname;
            
        }
        else{
            
            $medical_specialist_subname       = '';
            
        }
        
        if($medical_specialist_subname == ''){
            
            if(Session('language')=='bn') 
            {
    	        $total_result = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            else{
    	        $total_result = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            
        }else{
            
            if(Session('language')=='bn') 
            {
                $total_result   = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->where('b_medical_specialist_subname', $medical_specialist_subname)->count();
    	        $aside_results  = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('b_medical_specialist_subname', $medical_specialist_subname)->get();
            }
            else{
                $total_result   = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->where('medical_specialist_subname', $medical_specialist_subname)->count();
    	        $aside_results  = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('medical_specialist_subname', $medical_specialist_subname)->get();
            }
            
        }
        
        

        $phones = DB::table('medical_specialist_phone')->where('medical_specialist_id', $medical_specialist_id)->get();
        $emails = DB::table('medical_specialist_email')->where('medical_specialist_id', $medical_specialist_id)->get();
        $chembers = DB::table('medical_specialist_chamber')->where('medical_specialist_id', $medical_specialist_id)->get();
        $notices = MedicalSpecialistNotice::where('medical_specialist_id', $medical_specialist_id)->get();
        $appointments = MedicalSpecialistAppointment::where('medical_specialist_id', $medical_specialist_id)->get();
        $appointment_notice = MedicalSpecialistAppointmentNotice::where('medical_specialist_id', $medical_specialist_id)->get();
        
        $current_date = date('Y-m-d');

        $all_appointments_morning_new = [];
        $all_appointments_morning_report = [];
        $all_appointments_evening_new = [];
        $all_appointments_evening_report = [];
        
        date_default_timezone_set('Asia/Dhaka');
        $current_time = date('H:i');
        $searched_date = date('Y-m-d');
        
        $searched_chambers_id = null;

        $chambers =  MedicalSpecialistAppointment::select('id','chamber_name')
                                                        ->where('medical_specialist_id', $medical_specialist_id)
                                                        //->where('start_time', '<=' , $current_time)
                                                        //->where('end_time', '>=' , $current_time)
                                                        ->where(function ($query) {
                                                            $query->where(
                                                                function ($query) {
                                                                    $query->where(
                                                                        'start_time_morning', '<=' , date('H:i'))
                                                                          ->where('end_time_morning', '>=', date('H:i'));
                                                                }
                                                            )
                                                                  ->orWhere(
                                                                    function ($query) {
                                                                        $query->where(
                                                                            'start_time_evening', '<=' , date('H:i')
                                                                        )
                                                                              ->where('end_time_evening', '>=', date('H:i'));
                                                                    }
                                                                  );
                                                        })
                                                        ->get();
        $all_chambers =  MedicalSpecialistAppointment::select('id','chamber_name')
                                                        ->where('medical_specialist_id', $medical_specialist_id)->get();
                                             
        $flag = 0;


        return view('frontendmedicalspecialist::medical_specialist',compact('medical_specialist','phones','emails','chembers','notices','total_result','aside_results','appointments','appointment_notice','all_appointments_morning_new','all_appointments_morning_report', 'all_appointments_evening_new', 'all_appointments_evening_report' ,'chambers','searched_date','searched_chambers_id','flag','all_chambers'));
    }


    public function chamberSearch(Request $request, $medical_specialist_id,$subdistrict_id)
    {
        
        $current_date = date('Y-m-d');
        $searched_date = date('Y-m-d',strtotime($request->search_date)); 

        if ($current_date > $searched_date) {
            return redirect('frontendmedicalspecialist/view'.'/'.$medical_specialist_id.'/'.$subdistrict_id)
                    ->with('flag',1)
                    ->with('flash_message', 'Sorry, You cannot search previous appointments!!!')
                    ->with('flash_notification', 'danger');
        }
    
    	$medical_specialist = MedicalSpecialist::find($medical_specialist_id);
    	
    	if(isset($medical_specialist->medical_specialist_subname) && Session('language') != 'bn'){
            
            $medical_specialist_subname       = $medical_specialist->medical_specialist_subname;
            
        }
        else if(isset($medical_specialist->b_medical_specialist_subname) && Session('language') == 'bn'){
            
            $medical_specialist_subname       = $medical_specialist->b_medical_specialist_subname;
            
        }
        else{
            
            $medical_specialist_subname       = '';
            
        }
        
        if($medical_specialist_subname == ''){
            
            if(Session('language')=='bn') 
            {
    	        $total_result = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            else{
    	        $total_result = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->count();
    	        $aside_results = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->get();
            }
            
        }else{
            
            if(Session('language')=='bn') 
            {
                $total_result   = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->where('b_medical_specialist_subname', $medical_specialist_subname)->count();
    	        $aside_results  = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('b_medical_specialist_subname', $medical_specialist_subname)->get();
            }
            else{
                $total_result   = DB::table('medical_specialist')->where('subdistrict_id', $subdistrict_id)->where('medical_specialist_subname', $medical_specialist_subname)->count();
    	        $aside_results  = MedicalSpecialist::with('subDistrict')->where('subdistrict_id', $subdistrict_id)->where('medical_specialist_subname', $medical_specialist_subname)->get();
            }
            
        }
        
        

        $phones = DB::table('medical_specialist_phone')->where('medical_specialist_id', $medical_specialist_id)->get();
        $emails = DB::table('medical_specialist_email')->where('medical_specialist_id', $medical_specialist_id)->get();
        $chembers = DB::table('medical_specialist_chamber')->where('medical_specialist_id', $medical_specialist_id)->get();
        $notices = MedicalSpecialistNotice::where('medical_specialist_id', $medical_specialist_id)->get();
        $appointments = MedicalSpecialistAppointment::where('medical_specialist_id', $medical_specialist_id)->get();
        $appointment_notice = MedicalSpecialistAppointmentNotice::where('medical_specialist_id', $medical_specialist_id)->get();

        $chambers_id = $request->search_chamber_id; 

        $date = date('Y-m-d',strtotime($request->search_date));        
        
        $all_appointments_morning_new = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',1)
                                                                ->where('appointment_type',1)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        $all_appointments_morning_report = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',1)
                                                                ->where('appointment_type',2)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        $all_appointments_evening_new = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',2)
                                                                ->where('appointment_type',1)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        $all_appointments_evening_report = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',2)
                                                                ->where('appointment_type',2)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();
        //dd($all_appointments_morning_new[0]->chamber_name);
        date_default_timezone_set('Asia/Dhaka');
        $current_time = date('H:i'); 
        $searched_chambers_id = $chambers_id;

        $all_chambers =  MedicalSpecialistAppointment::select('id','chamber_name')
                                                        ->where('medical_specialist_id', $medical_specialist_id)
                                                        ->get();
        
        $chambers =  MedicalSpecialistAppointment::select('id','chamber_name')
                                                        ->where('medical_specialist_id', $medical_specialist_id)
                                                        //->where('start_time', '<=' , $current_time)
                                                        //->where('end_time', '>=' , $current_time)
                                                        ->where(function ($query) {
                                                            $query->where(
                                                                function ($query) {
                                                                    $query->where(
                                                                        'start_time_morning', '<=' , date('H:i'))
                                                                          ->where('end_time_morning', '>=', date('H:i'));
                                                                }
                                                            )
                                                                  ->orWhere(
                                                                    function ($query) {
                                                                        $query->where(
                                                                            'start_time_evening', '<=' , date('H:i')
                                                                        )
                                                                              ->where('end_time_evening', '>=', date('H:i'));
                                                                    }
                                                                  );
                                                        })
                                                        ->get();
                                                        
        $flag = 1;

        return view('frontendmedicalspecialist::medical_specialist',compact('medical_specialist','phones','emails','chembers','notices','total_result','aside_results','appointments','appointment_notice','all_appointments_morning_new','all_appointments_morning_report', 'all_appointments_evening_new', 'all_appointments_evening_report' ,'chambers','chambers_id','searched_date','searched_chambers_id','flag','all_chambers'));
    }


    public function morning_appointment_pdf(Request $request, $medical_specialist_id, $date, $chambers_id)
    
    {
    	$current_date = date('Y-m-d');
        $searched_date = date('Y-m-d',strtotime($date)); 
    
    	$medical_specialist = MedicalSpecialist::find($medical_specialist_id);
        $date = date('Y-m-d',strtotime($date));        
        
        $all_appointments_morning_new = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',1)
                                                                ->where('appointment_type',1)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        $all_appointments_morning_report = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',1)
                                                                ->where('appointment_type',2)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        //dd($all_appointments_morning_new);
        date_default_timezone_set('Asia/Dhaka');      

        return view('frontendmedicalspecialist::medical_specialist_morning_pdf',compact('medical_specialist','all_appointments_morning_new','all_appointments_morning_report','chambers_id','date'));
    }


    public function evening_appointment_pdf(Request $request, $medical_specialist_id,$date, $chambers_id)
    
    {
    	$current_date = date('Y-m-d');
        $searched_date = date('Y-m-d',strtotime($date)); 
    
    	$medical_specialist = MedicalSpecialist::find($medical_specialist_id);
        $date = date('Y-m-d',strtotime($date));        
        
        $all_appointments_evening_new = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',2)
                                                                ->where('appointment_type',1)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        $all_appointments_evening_report = MedicalSpecialstAppointmentBooking::where('doctor_id', $medical_specialist_id)
                                                                ->where('chamber_id', $chambers_id)
                                                                ->where('appointment_time',2)
                                                                ->where('appointment_type',2)
                                                                ->where('appointment_date',$date)
                                                                ->orderBy('created_at', 'asc')
                                                                ->get();         
        
        //dd($all_appointments_morning_new);
        date_default_timezone_set('Asia/Dhaka');      

        return view('frontendmedicalspecialist::medical_specialist_evening_pdf',compact('medical_specialist','all_appointments_evening_new','all_appointments_evening_report','chambers_id','date'));
    }


    
    public function appointmentBooking(Request $request, $doctor_id, $subdistrict_id){
        
        date_default_timezone_set('Asia/Dhaka');
        $current_time = date('H:i');
        $current_date = date('Y-m-d');
        $date = date("Y-m-d", strtotime($request->appointment_date));

        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $current_date);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
        $diff_in_days = $from->diffInDays($to);

        $selected_chamber_limit_of_days = MedicalSpecialistAppointment::where('medical_specialist_id',$doctor_id)->where('id',$request->chamber_id)->first()->serial_given_before_days_en;

        if($diff_in_days < $selected_chamber_limit_of_days || $from > $to)
        {
            return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Serial must be given before '.$selected_chamber_limit_of_days.' days.')
                        ->with('flash_notification', 'danger');
        }
        $serial_limit = MedicalSpecialistAppointment::select('max_serial_limit_morning_new_en','max_serial_limit_morning_report_en','max_serial_limit_evening_new_en','max_serial_limit_evening_report_en')->where('id',$request->chamber_id)->first();

        $serial_limit_morning_new = (int)$serial_limit->max_serial_limit_morning_new_en;
        $serial_limit_morning_report = (int)$serial_limit->max_serial_limit_morning_report_en;
        $serial_limit_evening_new = (int)$serial_limit->max_serial_limit_evening_new_en;
        $serial_limit_evening_report = (int)$serial_limit->max_serial_limit_evening_report_en;
       
        $booking_count_morning_new = MedicalSpecialstAppointmentBooking::where('chamber_id',$request->chamber_id)->where('appointment_date', $date)
                                                                        ->where('appointment_time', '=',1)
                                                                        ->where('appointment_type', '=',1)
                                                                        ->count();
        $booking_count_morning_report = MedicalSpecialstAppointmentBooking::where('chamber_id',$request->chamber_id)->where('appointment_date', $date)
                                                                        ->where('appointment_time', '=',1)
                                                                        ->where('appointment_type', '=',2)
                                                                        ->count();
        $booking_count_evening_new = MedicalSpecialstAppointmentBooking::where('chamber_id',$request->chamber_id)->where('appointment_date', $date)
                                                                        ->where('appointment_time', '=',2)
                                                                        ->where('appointment_type', '=',1)
                                                                        ->count();
        $booking_count_evening_report = MedicalSpecialstAppointmentBooking::where('chamber_id',$request->chamber_id)->where('appointment_date', $date)
                                                                        ->where('appointment_time', '=',2)
                                                                        ->where('appointment_type', '=',2)
                                                                        ->count();
        
        

        $validator = Validator::make($request->all(), [
            'chamber_id'          =>    'required',
            'appointment_date'    =>    'required',
            'appointment_time'    =>    'required',
            'appointment_type'    =>    'required',
            'patient_name'        =>    'required',
            'contact_number'      =>    'required',
        ]);

        if ($validator->fails()) {
            return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                    ->withErrors($validator)
                    ->with('flag',1)
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');
        }

        if($request->appointment_time == 1 && $request->appointment_type == 1)
        {
            $start_time = MedicalSpecialistAppointment::select('start_time_morning')->where('id',$request->chamber_id)->first();
            $end_time = MedicalSpecialistAppointment::select('end_time_morning')->where('id',$request->chamber_id)->first();
            if($current_time < $start_time->start_time_morning || $current_time > $end_time->end_time_morning)
            {
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Morning Serial not available now.')
                        ->with('flash_notification', 'danger');
            }
            else if($booking_count_morning_new < $serial_limit_morning_new)
            {
                $booking                    = new MedicalSpecialstAppointmentBooking();
            
                $booking->doctor_id         = $doctor_id;
                
                $booking->chamber_id        = $request->chamber_id;
                $booking->appointment_date  = date("Y-m-d", strtotime($request->appointment_date));
                $booking->appointment_time  = $request->appointment_time;
                $booking->appointment_type  = $request->appointment_type;
                $booking->patient_name      = $request->patient_name;
                $booking->contact_number    = $request->contact_number;

                if($booking->save())
                {
                    return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Congratulations! Your Appoinement is booked successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {

                    return redirect('frontendmedicalspecialist/appointment_booking'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Some thing went to wrong!!!')
                        ->with('flash_notification', 'danger');
                } 

                
            }

            else
            {            
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Appointment Limit Cross!')
                        ->with('flash_notification', 'danger');
            }
        }

        if($request->appointment_time == 1 && $request->appointment_type == 2)
        {
            $start_time = MedicalSpecialistAppointment::select('start_time_morning')->where('id',$request->chamber_id)->first();
            $end_time = MedicalSpecialistAppointment::select('end_time_morning')->where('id',$request->chamber_id)->first();
            if($current_time < $start_time->start_time_morning || $current_time > $end_time->end_time_morning)
            {
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Morning Serial not available now.')
                        ->with('flash_notification', 'danger');
            }
            else if($booking_count_morning_report < $serial_limit_morning_report)
            {
                $booking                    = new MedicalSpecialstAppointmentBooking();
            
                $booking->doctor_id         = $doctor_id;
                
                $booking->chamber_id        = $request->chamber_id;
                $booking->appointment_date  = date("Y-m-d", strtotime($request->appointment_date));
                $booking->appointment_time  = $request->appointment_time;
                $booking->appointment_type  = $request->appointment_type;
                $booking->patient_name      = $request->patient_name;
                $booking->contact_number    = $request->contact_number;

                if($booking->save())
                {

                    return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Congratulations! Your Appoinement is booked successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {

                    return redirect('frontendmedicalspecialist/appointment_booking'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Some thing went to wrong!!!')
                        ->with('flash_notification', 'danger');
                } 

                
            }

            else
            {            
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Appointment Limit Cross!')
                        ->with('flash_notification', 'danger');
            }
        }

        if($request->appointment_time == 2 && $request->appointment_type == 1)
        {
            $start_time = MedicalSpecialistAppointment::select('start_time_evening')->where('id',$request->chamber_id)->first();
            $end_time = MedicalSpecialistAppointment::select('end_time_evening')->where('id',$request->chamber_id)->first();
            if($current_time < $start_time->start_time_evening || $current_time > $end_time->end_time_evening)
            {
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Evening Serial not available now.')
                        ->with('flash_notification', 'danger');
            }
            else if($booking_count_evening_new < $serial_limit_evening_new)
            {
                $booking                    = new MedicalSpecialstAppointmentBooking();
            
                $booking->doctor_id         = $doctor_id;
                
                $booking->chamber_id        = $request->chamber_id;
                $booking->appointment_date  = date("Y-m-d", strtotime($request->appointment_date));
                $booking->appointment_time  = $request->appointment_time;
                $booking->appointment_type  = $request->appointment_type;
                $booking->patient_name      = $request->patient_name;
                $booking->contact_number    = $request->contact_number;

                if($booking->save())
                {

                    return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Congratulations! Your Appoinement is booked successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {

                    return redirect('frontendmedicalspecialist/appointment_booking'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Some thing went to wrong!!!')
                        ->with('flash_notification', 'danger');
                } 

                
            }

            else
            {            
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Appointment Limit Cross!')
                        ->with('flash_notification', 'danger');
            }
        }
        
        if($request->appointment_time == 2 && $request->appointment_type == 2)
        {
            $start_time = MedicalSpecialistAppointment::select('start_time_evening')->where('id',$request->chamber_id)->first();
            $end_time = MedicalSpecialistAppointment::select('end_time_evening')->where('id',$request->chamber_id)->first();
            if($current_time < $start_time->start_time_evening || $current_time > $end_time->end_time_evening)
            {
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Evening Serial not available now.')
                        ->with('flash_notification', 'danger');
            }
            else if($booking_count_evening_report < $serial_limit_evening_report)
            {
                $booking                    = new MedicalSpecialstAppointmentBooking();
            
                $booking->doctor_id         = $doctor_id;
                
                $booking->chamber_id        = $request->chamber_id;
                $booking->appointment_date  = date("Y-m-d", strtotime($request->appointment_date));
                $booking->appointment_time  = $request->appointment_time;
                $booking->appointment_type  = $request->appointment_type;
                $booking->patient_name      = $request->patient_name;
                $booking->contact_number    = $request->contact_number;

                if($booking->save())
                {

                    return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Congratulations! Your Appoinement is booked successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {

                    return redirect('frontendmedicalspecialist/appointment_booking'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Some thing went to wrong!!!')
                        ->with('flash_notification', 'danger');
                } 

                
            }

            else
            {            
                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                        ->with('flag',1)
                        ->with('flash_message', 'Appointment Limit Cross!')
                        ->with('flash_notification', 'danger');
            }
        }
        
  
        /*if($booking_count < $serail_limit[0]->max_serial_limit){
            
            $this->validate($request, [
                'chamber_id'          =>    'required',
                'appointment_date'    =>    'required',
                'appointment_time'    =>    'required',
                'appointment_type'    =>    'required',
                'patient_name'        =>    'required',
                'contact_number'      =>    'required',
            
            ]);
            
            $booking                    = new MedicalSpecialstAppointmentBooking();
            
            $booking->doctor_id         = $doctor_id;
            
            $booking->chamber_id        = $request->chamber_id;
            $booking->appointment_date  = date("Y-m-d", strtotime($request->appointment_date));
            $booking->appointment_time  = $request->appointment_time;
            $booking->appointment_type  = $request->appointment_type;
            $booking->patient_name      = $request->patient_name;
            $booking->contact_number    = $request->contact_number;
            
           
          if($booking->save())
            {

                return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                    ->with('flag',1)
                    ->with('flash_message', 'Congratulations! Your Appoinement is booked successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {

                return redirect('frontendmedicalspecialist/appointment_booking'.'/'.$doctor_id.'/'.$subdistrict_id)
                    ->with('flag',1)
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');
            } 
            
        } else {
            
            return redirect('frontendmedicalspecialist/view'.'/'.$doctor_id.'/'.$subdistrict_id)
                    ->with('flag',1)
                    ->with('flash_message', 'Appointment Limit Cross!')
                    ->with('flash_notification', 'danger');
        }*/
        
        
    }
    

    public function viewMedicalSpecialistById($medical_specialist_id)
    {
        $medical_specialist = MedicalSpecialist::find($medical_specialist_id);

        $phones = DB::table('medical_specialist_phone')->where('medical_specialist_id', $medical_specialist_id)->get();
        $emails = DB::table('medical_specialist_email')->where('medical_specialist_id', $medical_specialist_id)->get();
        $chembers = DB::table('medical_specialist_chamber')->where('medical_specialist_id', $medical_specialist_id)->get();
        $notices = MedicalSpecialistNotice::where('medical_specialist_id', $medical_specialist_id)->get();

        return view('frontendmedicalspecialist::medical_speacialist_view',compact('medical_specialist','phones','emails','chembers','notices'));
    }
}
