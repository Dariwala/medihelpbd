<?php

namespace App\Modules\Skinlasercenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SkinLaserCenter;
use App\Models\SkinLaserCenterNotice;
use DB;


class SkinLaserCenterNoticeController extends Controller
{
    public function getSkinLaserCenterNoticeAdd($skin_laser_center_id)
    {

    	return view('skinlasercenter::skin_laser_center_notice_add', compact('skin_laser_center_id'));
    }

    public function postSkinLaserCenterNoticeAdd(Request $request, $skin_laser_center_id)
    {
    	$data = $request->all();

    	$skin_laser_center_notice = new SkinLaserCenterNotice;

    	$skin_laser_center_notice->skin_laser_center_notice_description   = $data['skin_laser_center_notice_description'];
    	$skin_laser_center_notice->b_skin_laser_center_notice_description = $data['b_skin_laser_center_notice_description'];
    	$skin_laser_center_notice->skin_laser_center_id 				  = $skin_laser_center_id;

    	if($skin_laser_center_notice->save())
        {
        	return redirect('skin-laser-center/edit/info'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('skin-laser-center/edit/notice/add'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getSkinLaserCenterNoticeEdit($skin_laser_center_notice_id)
    {
        $skin_laser_center_notice = SkinLaserCenterNotice::find($skin_laser_center_notice_id);

        return view('skinlasercenter::skin_laser_center_notice_edit', compact('skin_laser_center_notice_id', 'skin_laser_center_notice'));
    }

    public function postSkinLaserCenterNoticeEdit(Request $request, $skin_laser_center_notice_id)
    {
        $data = $request->all();

        $skin_laser_center_id     = SkinLaserCenterNotice::find($skin_laser_center_notice_id)->skinLaserCenter->id;
        
        
        $skin_laser_center_notice = SkinLaserCenterNotice::find($skin_laser_center_notice_id);

        

        $skin_laser_center_notice->skin_laser_center_notice_description     	= $data['skin_laser_center_notice_description'];
        $skin_laser_center_notice->b_skin_laser_center_notice_description   	= $data['b_skin_laser_center_notice_description'];
        $skin_laser_center_notice->skin_laser_center_id                      	= $skin_laser_center_id;

        if($skin_laser_center_notice->update())
        {
            return redirect('skin-laser-center/edit/info'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('skin-laser-center/edit/notice/edit'.'/'.$skin_laser_center_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function SkinLaserCenterNoticeDelete($skin_laser_center_notice_id)
    {
        $skin_laser_center_notice = SkinLaserCenterNotice::find($skin_laser_center_notice_id);

        $skin_laser_center_id = SkinLaserCenterNotice::find($skin_laser_center_notice_id)->skinLaserCenter->id;

        if($skin_laser_center_notice->delete())
        {
            return redirect('skin-laser-center/edit/notice'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('skin-laser-center/edit/notice'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
