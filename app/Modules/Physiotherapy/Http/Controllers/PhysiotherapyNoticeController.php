<?php

namespace App\Modules\Physiotherapy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Physiotherapy;
use App\Models\PhysiotherapyNotice;

class PhysiotherapyNoticeController extends Controller
{
    public function getPhysiotherapyNoticeAdd($physiotherapy_id)
    {
    	return view('physiotherapy::physiotherapy_notice_add', compact('physiotherapy_id'));
    }

    public function postPhysiotherapyNoticeAdd(Request $request, $physiotherapy_id)
    {
    	$data = $request->all();

    	$physiotherapy_notice = new PhysiotherapyNotice;

    	$physiotherapy_notice->physiotherapy_notice_description 	= $data['physiotherapy_notice_description'];
    	$physiotherapy_notice->b_physiotherapy_notice_description = $data['b_physiotherapy_notice_description'];
    	$physiotherapy_notice->physiotherapy_id 					= $physiotherapy_id;

    	if($physiotherapy_notice->save())
        {
        	return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Added Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('physiotherapy/edit/notice/add'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getPhysiotherapyNoticeEdit($physiotherapy_notice_id)
    {
        $physiotherapy_notice = PhysiotherapyNotice::find($physiotherapy_notice_id);

        return view('physiotherapy::physiotherapy_notice_edit', compact('physiotherapy_notice_id', 'physiotherapy_notice'));
    }

    public function postPhysiotherapyNoticeEdit(Request $request, $physiotherapy_notice_id)
    {
        $data = $request->all();

        $physiotherapy_id = PhysiotherapyNotice::find($physiotherapy_notice_id)->physiotherapy->id;
        
        $physiotherapy_notice = PhysiotherapyNotice::find($physiotherapy_notice_id);

        

        $physiotherapy_notice->physiotherapy_notice_description     	= $data['physiotherapy_notice_description'];
        $physiotherapy_notice->b_physiotherapy_notice_description   	= $data['b_physiotherapy_notice_description'];
        $physiotherapy_notice->physiotherapy_id                      	= $physiotherapy_id;

        if($physiotherapy_notice->update())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Updated Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/notice/edit'.'/'.$physiotherapy_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PhysiotherapyNoticeDelete($physiotherapy_notice_id)
    {
        $physiotherapy_notice = PhysiotherapyNotice::find($physiotherapy_notice_id);
        $physiotherapy_id     = PhysiotherapyNotice::find($physiotherapy_notice_id)->physiotherapy->id;

        if($physiotherapy_notice->delete())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Deleted Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
