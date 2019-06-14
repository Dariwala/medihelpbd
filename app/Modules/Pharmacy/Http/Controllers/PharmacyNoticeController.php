<?php

namespace App\Modules\Pharmacy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pharmacy;
use App\Models\PharmacyNotice;

class PharmacyNoticeController extends Controller
{
    public function getPharmacyNoticeAdd($pharmacy_id)
    {
    	return view('pharmacy::pharmacy_notice_add', compact('pharmacy_id'));
    }

    public function postPharmacyNoticeAdd(Request $request, $pharmacy_id)
    {
    	$data = $request->all();

    	$pharmacy_notice = new PharmacyNotice;

    	$pharmacy_notice->pharmacy_notice_description 	= $data['pharmacy_notice_description'];
    	$pharmacy_notice->b_pharmacy_notice_description = $data['b_pharmacy_notice_description'];
    	$pharmacy_notice->pharmacy_id 					= $pharmacy_id;

    	if($pharmacy_notice->save())
        {
        	return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('pharmacy/edit/notice/add'.'/'.$pharmacy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getPharmacyNoticeEdit($pharmacy_notice_id)
    {
        $pharmacy_notice = PharmacyNotice::find($pharmacy_notice_id);

        return view('pharmacy::pharmacy_notice_edit', compact('pharmacy_notice_id', 'pharmacy_notice'));
    }

    public function postPharmacyNoticeEdit(Request $request, $pharmacy_notice_id)
    {
        $data = $request->all();

        $pharmacy_id = PharmacyNotice::find($pharmacy_notice_id)->pharmacy->id;
        
        $pharmacy_notice = PharmacyNotice::find($pharmacy_notice_id);

        

        $pharmacy_notice->pharmacy_notice_description     	= $data['pharmacy_notice_description'];
        $pharmacy_notice->b_pharmacy_notice_description   	= $data['b_pharmacy_notice_description'];
        $pharmacy_notice->pharmacy_id                      	= $pharmacy_id;

        if($pharmacy_notice->update())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/notice/edit'.'/'.$pharmacy_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PharmacyNoticeDelete($pharmacy_notice_id)
    {
        $pharmacy_notice = PharmacyNotice::find($pharmacy_notice_id);
        $pharmacy_id     = PharmacyNotice::find($pharmacy_notice_id)->pharmacy->id;

        if($pharmacy_notice->delete())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
