<?php

namespace App\Modules\Vaccinepoint\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\VaccinePoint;
use App\Models\VaccinePointNotice;
use DB;


class VaccinePointNoticeController extends Controller
{
    public function getVaccinePointNoticeAdd($vaccine_point_id)
    {
    	return view('vaccinepoint::vaccine_point_notice_add', compact('vaccine_point_id'));
    }

    public function postVaccinePointNoticeAdd(Request $request, $vaccine_point_id)
    {
    	$data = $request->all();

    	$vaccine_point_notice = new VaccinePointNotice;

    	$vaccine_point_notice->vaccine_point_notice_description   = $data['vaccine_point_notice_description'];
    	$vaccine_point_notice->b_vaccine_point_notice_description = $data['b_vaccine_point_notice_description'];
    	$vaccine_point_notice->vaccine_point_id 				  = $vaccine_point_id;

    	if($vaccine_point_notice->save())
        {
        	return redirect('vaccine-point/edit/info'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('vaccine-point/edit/notice/add'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getVaccinePointNoticeEdit($vaccine_point_notice_id)
    {
        $vaccine_point_notice = VaccinePointNotice::find($vaccine_point_notice_id);

        return view('vaccinepoint::vaccine_point_notice_edit', compact('vaccine_point_notice_id', 'vaccine_point_notice'));
    }

    public function postVaccinePointNoticeEdit(Request $request, $vaccine_point_notice_id)
    {
        $data = $request->all();

        $vaccine_point_id     = VaccinePointNotice::find($vaccine_point_notice_id)->vaccinePoint->id;
        
        
        $vaccine_point_notice = VaccinePointNotice::find($vaccine_point_notice_id);


        $vaccine_point_notice->vaccine_point_notice_description     	= $data['vaccine_point_notice_description'];
        $vaccine_point_notice->b_vaccine_point_notice_description   	= $data['b_vaccine_point_notice_description'];
        $vaccine_point_notice->vaccine_point_id                      	= $vaccine_point_id;

        if($vaccine_point_notice->update())
        {
            return redirect('vaccine-point/edit/info'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('vaccine-point/edit/notice/edit'.'/'.$vaccine_point_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function VaccinePointNoticeDelete($vaccine_point_notice_id)
    {
        $vaccine_point_notice = VaccinePointNotice::find($vaccine_point_notice_id);

        $vaccine_point_id = VaccinePointNotice::find($vaccine_point_notice_id)->vaccinePoint->id;

        if($vaccine_point_notice->delete())
        {
            return redirect('vaccine-point/edit/notice'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('vaccine-point/edit/notice'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
