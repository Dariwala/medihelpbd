<?php

namespace App\Modules\Optical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Optical;
use App\Models\OpticalNotice;

class OpticalNoticeController extends Controller
{
    public function getOpticalNoticeAdd($optical_id)
    {
    	return view('optical::optical_notice_add', compact('optical_id'));
    }

    public function postOpticalNoticeAdd(Request $request, $optical_id)
    {
    	$data = $request->all();

    	$optical_notice = new OpticalNotice;

    	$optical_notice->optical_notice_description 	= $data['optical_notice_description'];
    	$optical_notice->b_optical_notice_description = $data['b_optical_notice_description'];
    	$optical_notice->optical_id 					= $optical_id;

    	if($optical_notice->save())
        {
        	return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('optical/edit/notice/add'.'/'.$optical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getOpticalNoticeEdit($optical_notice_id)
    {
        $optical_notice = OpticalNotice::find($optical_notice_id);

        return view('optical::optical_notice_edit', compact('optical_notice_id', 'optical_notice'));
    }

    public function postOpticalNoticeEdit(Request $request, $optical_notice_id)
    {
        $data = $request->all();

        $optical_id = OpticalNotice::find($optical_notice_id)->optical->id;
        
        $optical_notice = OpticalNotice::find($optical_notice_id);

        

        $optical_notice->optical_notice_description     	= $data['optical_notice_description'];
        $optical_notice->b_optical_notice_description   	= $data['b_optical_notice_description'];
        $optical_notice->optical_id                      	= $optical_id;

        if($optical_notice->update())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/notice/edit'.'/'.$optical_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function OpticalNoticeDelete($optical_notice_id)
    {
        $optical_notice = OpticalNotice::find($optical_notice_id);
        $optical_id     = OpticalNotice::find($optical_notice_id)->optical->id;

        if($optical_notice->delete())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
