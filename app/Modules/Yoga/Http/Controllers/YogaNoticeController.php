<?php

namespace App\Modules\Yoga\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Yoga;
use App\Models\YogaNotice;
use DB;


class YogaNoticeController extends Controller
{
    public function getYogaNoticeAdd($yoga_id)
    {
    	return view('yoga::yoga_notice_add', compact('yoga_id'));
    }

    public function postYogaNoticeAdd(Request $request, $yoga_id)
    {
    	$data = $request->all();

    	$yoga_notice = new YogaNotice;

    	$yoga_notice->yoga_notice_description 	= $data['yoga_notice_description'];
    	$yoga_notice->b_yoga_notice_description = $data['b_yoga_notice_description'];
    	$yoga_notice->yoga_id 					= $yoga_id;

    	if($yoga_notice->save())
        {
        	return redirect('yoga/edit/info'.'/'.$yoga_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('yoga/edit/notice/add'.'/'.$yoga_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getYogaNoticeEdit($yoga_notice_id)
    {
        $yoga_notice = YogaNotice::find($yoga_notice_id);

        return view('yoga::yoga_notice_edit', compact('yoga_notice_id', 'yoga_notice'));
    }

    public function postYogaNoticeEdit(Request $request, $yoga_notice_id)
    {
        $data = $request->all();

        $yoga_id = YogaNotice::find($yoga_notice_id)->yoga->id;
        
        $yoga_notice = YogaNotice::find($yoga_notice_id);

        
        $yoga_notice->yoga_notice_description     	= $data['yoga_notice_description'];
        $yoga_notice->b_yoga_notice_description   	= $data['b_yoga_notice_description'];
        $yoga_notice->yoga_id                      	= $yoga_id;

        if($yoga_notice->update())
        {
            return redirect('yoga/edit/info'.'/'.$yoga_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('yoga/edit/notice/edit'.'/'.$yoga_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function YogaNoticeDelete($yoga_notice_id)
    {
        $yoga_notice = YogaNotice::find($yoga_notice_id);

        $yoga_id = YogaNotice::find($yoga_notice_id)->yoga->id;

        if($yoga_notice->delete())
        {
            return redirect('yoga/edit/notice'.'/'.$yoga_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('yoga/edit/notice'.'/'.$yoga_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
