<?php

namespace App\Modules\Ambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ambulance;
use App\Models\AmbulanceNotice;
use DB;

class AmbulanceNoticeController extends Controller
{
    public function getAmbulanceNoticeAdd($ambulance_id)
    {
    	return view('ambulance::ambulance_notice_add', compact('ambulance_id'));
    }

    public function postAmbulanceNoticeAdd(Request $request, $ambulance_id)
    {
    	
    	$data = $request->all();

    	$ambulance_notice = new AmbulanceNotice;

    	$ambulance_notice->ambulance_notice_description   = $data['ambulance_notice_description'];
    	$ambulance_notice->b_ambulance_notice_description = $data['b_ambulance_notice_description'];
    	$ambulance_notice->ambulance_id 				  = $ambulance_id;

    	if($ambulance_notice->save())
        {
        	return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('ambulance/edit/notice/add'.'/'.$ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getAmbulanceNoticeEdit($ambulance_notice_id)
    {
        $ambulance_notice = AmbulanceNotice::find($ambulance_notice_id);

        return view('ambulance::ambulance_notice_edit', compact('ambulance_notice_id', 'ambulance_notice'));
    }

    public function postAmbulanceNoticeEdit(Request $request, $ambulance_notice_id)
    {
        $data = $request->all();

        $ambulance_id = AmbulanceNotice::find($ambulance_notice_id)->Ambulance->id;
        
        $ambulance_notice = AmbulanceNotice::find($ambulance_notice_id);

        
        $ambulance_notice->ambulance_notice_description     	= $data['ambulance_notice_description'];
        $ambulance_notice->b_ambulance_notice_description   	= $data['b_ambulance_notice_description'];
        $ambulance_notice->ambulance_id                      	= $ambulance_id;

        if($ambulance_notice->update())
        {
            return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('ambulance/edit/notice/edit'.'/'.$ambulance_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function AmbulanceNoticeDelete($ambulance_notice_id)
    {
        $ambulance_notice = AmbulanceNotice::find($ambulance_notice_id);

        $ambulance_id = AmbulanceNotice::find($ambulance_notice_id)->Ambulance->id;

        if($ambulance_notice->delete())
        {
            return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
