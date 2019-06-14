<?php

namespace App\Modules\Addiction\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Addiction;
use App\Models\AddictionNotice;
use DB;


class AddictionNoticeController extends Controller
{
    public function getAddictionNoticeAdd($addiction_id)
    {
    	return view('addiction::addiction_notice_add', compact('addiction_id'));
    }

    public function postAddictionNoticeAdd(Request $request, $addiction_id)
    {
    	$data = $request->all();

    	$addiction_notice = new AddictionNotice;

    	$addiction_notice->addiction_notice_description 	= $data['addiction_notice_description'];
    	$addiction_notice->b_addiction_notice_description = $data['b_addiction_notice_description'];
    	$addiction_notice->addiction_id 					= $addiction_id;

    	if($addiction_notice->save())
        {
        	return redirect('addiction/edit/info'.'/'.$addiction_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('addiction/edit/notice/add'.'/'.$addiction_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getAddictionNoticeEdit($addiction_notice_id)
    {
        $addiction_notice = AddictionNotice::find($addiction_notice_id);

        return view('addiction::addiction_notice_edit', compact('addiction_notice_id', 'addiction_notice'));
    }

    public function postAddictionNoticeEdit(Request $request, $addiction_notice_id)
    {
        $data = $request->all();

        $addiction_id = AddictionNotice::find($addiction_notice_id)->addiction->id;
        
        $addiction_notice = AddictionNotice::find($addiction_notice_id);

        
        $addiction_notice->addiction_notice_description     	= $data['addiction_notice_description'];
        $addiction_notice->b_addiction_notice_description   	= $data['b_addiction_notice_description'];
        $addiction_notice->addiction_id                      	= $addiction_id;

        if($addiction_notice->update())
        {
            return redirect('addiction/edit/info'.'/'.$addiction_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('addiction/edit/notice/edit'.'/'.$addiction_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function AddictionNoticeDelete($addiction_notice_id)
    {
        $addiction_notice = AddictionNotice::find($addiction_notice_id);

        $addiction_id = AddictionNotice::find($addiction_notice_id)->addiction->id;

        if($addiction_notice->delete())
        {
            return redirect('addiction/edit/notice'.'/'.$addiction_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('addiction/edit/notice'.'/'.$addiction_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
