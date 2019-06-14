<?php

namespace App\Modules\Airambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AirAmbulance;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\AirAmbulanceNotice;
use DB;

class AirAmbulanceNoticeController extends Controller
{
    public function getAirAmbulanceNoticeAdd($air_ambulance_id)
    {
    	return view('airambulance::air_ambulance_notice_add', compact('air_ambulance_id'));
    }

    public function postAirAmbulanceNoticeAdd(Request $request, $air_ambulance_id)
    {
    	
    	$data = $request->all();

    	$air_ambulance_notice = new AirAmbulanceNotice;

    	$air_ambulance_notice->air_ambulance_notice_description   = $data['air_ambulance_notice_description'];
    	$air_ambulance_notice->b_air_ambulance_notice_description = $data['b_air_ambulance_notice_description'];
    	$air_ambulance_notice->air_ambulance_id 				  = $air_ambulance_id;

    	if($air_ambulance_notice->save())
        {
        	return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('air-ambulance/edit/notice/add'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getAirAmbulanceNoticeEdit($air_ambulance_notice_id)
    {
        $air_ambulance_notice = AirAmbulanceNotice::find($air_ambulance_notice_id);

        return view('airambulance::air_ambulance_notice_edit', compact('air_ambulance_notice_id', 'air_ambulance_notice'));
    }

    public function postAirAmbulanceNoticeEdit(Request $request, $air_ambulance_notice_id)
    {
        $data = $request->all();

        $air_ambulance_id = AirAmbulanceNotice::find($air_ambulance_notice_id)->airAmbulance->id;
        
        $air_ambulance_notice = AirAmbulanceNotice::find($air_ambulance_notice_id);


        $air_ambulance_notice->air_ambulance_notice_description     	= $data['air_ambulance_notice_description'];
        $air_ambulance_notice->b_air_ambulance_notice_description   	= $data['b_air_ambulance_notice_description'];
        $air_ambulance_notice->air_ambulance_id                      	= $air_ambulance_id;

        if($air_ambulance_notice->update())
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('air-ambulance/edit/notice/edit'.'/'.$air_ambulance_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function AirAmbulanceNoticeDelete($air_ambulance_notice_id)
    {
        $air_ambulance_notice = AirAmbulanceNotice::find($air_ambulance_notice_id);

        $air_ambulance_id = AirAmbulanceNotice::find($air_ambulance_notice_id)->airAmbulance->id;

        if($air_ambulance_notice->delete())
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
