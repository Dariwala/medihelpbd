<?php

namespace App\Modules\Service\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;


use App\Models\commonModules;
use DB;

use Exception;

class commonModulesController extends Controller
{
    public function index()
    {
        $data = commonModules::first();
        
        return view('service::commonModules.commonModules', compact('data'));
    }
    
    public function update(Request $request)
    {
        try{
            
            $data = commonModules::first();
            
            if($data == null){
                $data = new commonModules;
            }
            
            $data->vision           = $request->vision_description;
            $data->b_vision         = $request->b_vision_description;
            $data->contact          = $request->contact_description;
            $data->b_contact        = $request->b_contact_description;
            $data->appointment      = $request->appointment_description;
            $data->b_appointment    = $request->b_appointment_description;
            $data->serviceEntry     = $request->serviceEntry_description;
            $data->b_serviceEntry   = $request->b_serviceEntry_description;
            $data->faq              = $request->faq_description;
            $data->b_faq            = $request->b_faq_description;
            $data->serviceList      = $request->serviceList_description;
            $data->b_serviceList    = $request->b_serviceList_description;
            $data->latest_news      = $request->latestNews_description;
            $data->b_latest_news    = $request->b_latestNews_description;
            $data->notice           = $request->notice_description;
            $data->b_notice         = $request->b_notice_description;
            $data->report_delivery  = $request->report_delivery;
            $data->b_report_delivery= $request->b_report_delivery;
            $data->emergency_helpline  = $request->emergency_helpline;
            $data->b_emergency_helpline= $request->b_emergency_helpline;
            
            $data->save();
            
            $message = "Edited Successfully.";
            
        }catch(Exception $e){
            $message = "Failed to Update Data";
        }
        
        $data = commonModules::first();
        
        return view('service::commonModules.commonModules', compact('data', 'message'));
    }

}
