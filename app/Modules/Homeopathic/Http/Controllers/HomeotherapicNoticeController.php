<?php

namespace App\Modules\Homeopathic\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Homeopathic;
use App\Models\HomeopathicNotice;

class HomeopathicNoticeController extends Controller
{
    public function getHomeopathicNoticeAdd($homeopathic_id)
    {
    	return view('homeopathic::homeopathic_notice_add', compact('homeopathic_id'));
    }

    public function postHomeopathicNoticeAdd(Request $request, $homeopathic_id)
    {
    	$data = $request->all();

    	$homeopathic_notice = new HomeopathicNotice;

    	$homeopathic_notice->homeopathic_notice_description 	= $data['homeopathic_notice_description'];
    	$homeopathic_notice->b_homeopathic_notice_description = $data['b_homeopathic_notice_description'];
    	$homeopathic_notice->homeopathic_id 					= $homeopathic_id;

    	if($homeopathic_notice->save())
        {
        	return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('homeopathic/edit/notice/add'.'/'.$homeopathic_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getHomeopathicNoticeEdit($homeopathic_notice_id)
    {
        $homeopathic_notice = HomeopathicNotice::find($homeopathic_notice_id);

        return view('homeopathic::homeopathic_notice_edit', compact('homeopathic_notice_id', 'homeopathic_notice'));
    }

    public function postHomeopathicNoticeEdit(Request $request, $homeopathic_notice_id)
    {
        $data = $request->all();

        $homeopathic_id = HomeopathicNotice::find($homeopathic_notice_id)->homeopathic->id;
        
        $homeopathic_notice = HomeopathicNotice::find($homeopathic_notice_id);

        

        $homeopathic_notice->homeopathic_notice_description     	= $data['homeopathic_notice_description'];
        $homeopathic_notice->b_homeopathic_notice_description   	= $data['b_homeopathic_notice_description'];
        $homeopathic_notice->homeopathic_id                      	= $homeopathic_id;

        if($homeopathic_notice->update())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/notice/edit'.'/'.$homeopathic_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HomeopathicNoticeDelete($homeopathic_notice_id)
    {
        $homeopathic_notice = HomeopathicNotice::find($homeopathic_notice_id);
        $homeopathic_id     = HomeopathicNotice::find($homeopathic_notice_id)->homeopathic->id;

        if($homeopathic_notice->delete())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
