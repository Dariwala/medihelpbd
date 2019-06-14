<?php

namespace App\Modules\Eyebank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EyeBank;
use App\Models\EyeBankNotice;
use DB;

class EyeBankNoticeController extends Controller
{
    public function getEyeBankNoticeAdd($eye_bank_id)
    {

    	return view('eyebank::eye_bank_notice_add', compact('eye_bank_id'));
    }

    public function postEyeBankNoticeAdd(Request $request, $eye_bank_id)
    {
    	
    	$data = $request->all();

    	$eye_bank_notice = new EyeBankNotice;

    	$eye_bank_notice->eye_bank_notice_description   = $data['eye_bank_notice_description'];
    	$eye_bank_notice->b_eye_bank_notice_description = $data['b_eye_bank_notice_description'];
    	$eye_bank_notice->eye_bank_id 				    = $eye_bank_id;

    	if($eye_bank_notice->save())
        {
        	return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('eye-bank/edit/notice/add'.'/'.$eye_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getEyeBankNoticeEdit($eye_bank_notice_id)
    {
        $eye_bank_notice = EyeBankNotice::find($eye_bank_notice_id);

        return view('eyebank::eye_bank_notice_edit', compact('eye_bank_notice_id', 'eye_bank_notice'));
    }

    public function postEyeBankNoticeEdit(Request $request, $eye_bank_notice_id)
    {
        $data = $request->all();
        
        $eye_bank_id = EyeBankNotice::find($eye_bank_notice_id)->eyeBank->id;
        
        
        $eye_bank_notice = EyeBankNotice::find($eye_bank_notice_id);

        
        $eye_bank_notice->eye_bank_notice_description     	= $data['eye_bank_notice_description'];
        $eye_bank_notice->b_eye_bank_notice_description   	= $data['b_eye_bank_notice_description'];
        $eye_bank_notice->eye_bank_id                      	= $eye_bank_id;

        if($eye_bank_notice->update())
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('eye-bank/edit/notice/edit'.'/'.$eye_bank_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function EyeBankNoticeDelete($eye_bank_notice_id)
    {
        $eye_bank_notice = EyeBankNotice::find($eye_bank_notice_id);

        $eye_bank_id = EyeBankNotice::find($eye_bank_notice_id)->eyeBank->id;

        if($eye_bank_notice->delete())
        {
            return back()
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
