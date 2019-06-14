<?php

namespace App\Modules\Hospital\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Hospital;
use App\Models\HospitalNotice;
use DB;


class HospitalNoticeController extends Controller
{
    public function getHospitalNoticeAdd($hospital_id)
    {
    	return view('hospital::hospital_notice_add', compact('hospital_id'));
    }

    public function postHospitalNoticeAdd(Request $request, $hospital_id)
    {
    	$data = $request->all();

    	$hospital_notice = new HospitalNotice;

    	$hospital_notice->hospital_notice_description 	= $data['hospital_notice_description'];
    	$hospital_notice->b_hospital_notice_description = $data['b_hospital_notice_description'];
    	$hospital_notice->hospital_id 					= $hospital_id;

    	if($hospital_notice->save())
        {
        	return redirect('hospital/edit/info'.'/'.$hospital_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('hospital/edit/notice/add'.'/'.$hospital_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getHospitalNoticeEdit($hospital_notice_id)
    {
        $hospital_notice = HospitalNotice::find($hospital_notice_id);

        return view('hospital::hospital_notice_edit', compact('hospital_notice_id', 'hospital_notice'));
    }

    public function postHospitalNoticeEdit(Request $request, $hospital_notice_id)
    {
        $data = $request->all();

        $hospital_id = HospitalNotice::find($hospital_notice_id)->hospital->id;
        
        $hospital_notice = HospitalNotice::find($hospital_notice_id);

        
        $hospital_notice->hospital_notice_description     	= $data['hospital_notice_description'];
        $hospital_notice->b_hospital_notice_description   	= $data['b_hospital_notice_description'];
        $hospital_notice->hospital_id                      	= $hospital_id;

        if($hospital_notice->update())
        {
            return redirect('hospital/edit/info'.'/'.$hospital_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('hospital/edit/notice/edit'.'/'.$hospital_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HospitalNoticeDelete($hospital_notice_id)
    {
        $hospital_notice = HospitalNotice::find($hospital_notice_id);

        $hospital_id = HospitalNotice::find($hospital_notice_id)->hospital->id;

        if($hospital_notice->delete())
        {
            return redirect('hospital/edit/notice'.'/'.$hospital_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('hospital/edit/notice'.'/'.$hospital_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
