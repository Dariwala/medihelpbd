<?php

namespace App\Modules\Pharmacynew\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pharmacynew;
use App\Models\PharmacynewNotice;

class PharmacynewNoticeController extends Controller
{
    public function getPharmacynewNoticeAdd($pharmacynew_id)
    {
    	return view('pharmacynew::pharmacynew_notice_add', compact('pharmacynew_id'));
    }

    public function postPharmacynewNoticeAdd(Request $request, $pharmacynew_id)
    {
    	$data = $request->all();

    	$pharmacynew_notice = new PharmacynewNotice;

    	$pharmacynew_notice->pharmacynew_notice_description 	= $data['pharmacynew_notice_description'];
    	$pharmacynew_notice->b_pharmacynew_notice_description = $data['b_pharmacynew_notice_description'];
    	$pharmacynew_notice->pharmacynew_id 					= $pharmacynew_id;

    	if($pharmacynew_notice->save())
        {
        	return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('pharmacynew/edit/notice/add'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getPharmacynewNoticeEdit($pharmacynew_notice_id)
    {
        $pharmacynew_notice = PharmacynewNotice::find($pharmacynew_notice_id);

        return view('pharmacynew::pharmacynew_notice_edit', compact('pharmacynew_notice_id', 'pharmacynew_notice'));
    }

    public function postPharmacynewNoticeEdit(Request $request, $pharmacynew_notice_id)
    {
        $data = $request->all();

        $pharmacynew_id = PharmacynewNotice::find($pharmacynew_notice_id)->pharmacynew->id;
        
        $pharmacynew_notice = PharmacynewNotice::find($pharmacynew_notice_id);

        

        $pharmacynew_notice->pharmacynew_notice_description     	= $data['pharmacynew_notice_description'];
        $pharmacynew_notice->b_pharmacynew_notice_description   	= $data['b_pharmacynew_notice_description'];
        $pharmacynew_notice->pharmacynew_id                      	= $pharmacynew_id;

        if($pharmacynew_notice->update())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/notice/edit'.'/'.$pharmacynew_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PharmacynewNoticeDelete($pharmacynew_notice_id)
    {
        $pharmacynew_notice = PharmacynewNotice::find($pharmacynew_notice_id);
        $pharmacynew_id     = PharmacynewNotice::find($pharmacynew_notice_id)->pharmacynew->id;

        if($pharmacynew_notice->delete())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
