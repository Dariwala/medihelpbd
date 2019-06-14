<?php

namespace App\Modules\Parlour\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Parlour;
use App\Models\ParlourNotice;
use DB;


class ParlourNoticeController extends Controller
{
    public function getParlourNoticeAdd($parlour_id)
    {
    	return view('parlour::parlour_notice_add', compact('parlour_id'));
    }

    public function postParlourNoticeAdd(Request $request, $parlour_id)
    {
    	$data = $request->all();

    	$parlour_notice = new ParlourNotice;

    	$parlour_notice->parlour_notice_description 	= $data['parlour_notice_description'];
    	$parlour_notice->b_parlour_notice_description = $data['b_parlour_notice_description'];
    	$parlour_notice->parlour_id 					= $parlour_id;

    	if($parlour_notice->save())
        {
        	return redirect('parlour/edit/info'.'/'.$parlour_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('parlour/edit/notice/add'.'/'.$parlour_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getParlourNoticeEdit($parlour_notice_id)
    {
        $parlour_notice = ParlourNotice::find($parlour_notice_id);

        return view('parlour::parlour_notice_edit', compact('parlour_notice_id', 'parlour_notice'));
    }

    public function postParlourNoticeEdit(Request $request, $parlour_notice_id)
    {
        $data = $request->all();

        $parlour_id = ParlourNotice::find($parlour_notice_id)->parlour->id;
        
        $parlour_notice = ParlourNotice::find($parlour_notice_id);

        
        $parlour_notice->parlour_notice_description     	= $data['parlour_notice_description'];
        $parlour_notice->b_parlour_notice_description   	= $data['b_parlour_notice_description'];
        $parlour_notice->parlour_id                      	= $parlour_id;

        if($parlour_notice->update())
        {
            return redirect('parlour/edit/info'.'/'.$parlour_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('parlour/edit/notice/edit'.'/'.$parlour_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function ParlourNoticeDelete($parlour_notice_id)
    {
        $parlour_notice = ParlourNotice::find($parlour_notice_id);

        $parlour_id = ParlourNotice::find($parlour_notice_id)->parlour->id;

        if($parlour_notice->delete())
        {
            return redirect('parlour/edit/notice'.'/'.$parlour_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('parlour/edit/notice'.'/'.$parlour_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
