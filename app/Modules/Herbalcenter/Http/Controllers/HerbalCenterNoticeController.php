<?php

namespace App\Modules\Herbalcenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HerbalCenter;
use App\Models\HerbalCenterNotice;
use DB;


class HerbalCenterNoticeController extends Controller
{
    public function getHerbalCenterNoticeAdd($herbal_center_id)
    {
    	return view('herbalcenter::herbal_center_notice_add', compact('herbal_center_id'));
    }

    public function postHerbalCenterNoticeAdd(Request $request, $herbal_center_id)
    {
    	$data = $request->all();

    	$herbal_center_notice = new HerbalCenterNotice;


    	$herbal_center_notice->herbal_center_notice_description   = $data['herbal_center_notice_description'];
    	$herbal_center_notice->b_herbal_center_notice_description = $data['b_herbal_center_notice_description'];
    	$herbal_center_notice->herbal_center_id 				  = $herbal_center_id;

    	if($herbal_center_notice->save())
        {
        	return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('herbal-center/edit/notice/add'.'/'.$herbal_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getHerbalCenterNoticeEdit($herbal_center_notice_id)
    {
        $herbal_center_notice = HerbalCenterNotice::find($herbal_center_notice_id);

        return view('herbalcenter::herbal_center_notice_edit', compact('herbal_center_notice_id', 'herbal_center_notice'));
    }

    public function postHerbalCenterNoticeEdit(Request $request, $herbal_center_notice_id)
    {
        $data = $request->all();

        $herbal_center_id     = HerbalCenterNotice::find($herbal_center_notice_id)->herbalCenter->id;
        
        $herbal_center_notice = HerbalCenterNotice::find($herbal_center_notice_id);


        $herbal_center_notice->herbal_center_notice_description     	= $data['herbal_center_notice_description'];
        $herbal_center_notice->b_herbal_center_notice_description   	= $data['b_herbal_center_notice_description'];
        $herbal_center_notice->herbal_center_id                      	= $herbal_center_id;

        if($herbal_center_notice->update())
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/notice/edit'.'/'.$herbal_center_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HerbalCenterNoticeDelete($herbal_center_notice_id)
    {
        $herbal_center_notice = HerbalCenterNotice::find($herbal_center_notice_id);

        $herbal_center_id = HerbalCenterNotice::find($herbal_center_notice_id)->herbalCenter->id;

        if($herbal_center_notice->delete())
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
