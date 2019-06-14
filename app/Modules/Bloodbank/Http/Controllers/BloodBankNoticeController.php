<?php

namespace App\Modules\Bloodbank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Bloodbank;
use App\Models\BloodBankNotice;
use DB;

class BloodBankNoticeController extends Controller
{
    public function getBloodBankNoticeAdd($blood_bank_id)
    {

        return view('bloodbank::blood_bank_notice_add', compact('blood_bank_id'));
    }

    public function postBloodBankNoticeAdd(Request $request, $blood_bank_id)
    {
        
        $data = $request->all();

        $blood_bank_notice = new BloodBankNotice;

        $blood_bank_notice->blood_bank_notice_description   = $data['blood_bank_notice_description'];
        $blood_bank_notice->b_blood_bank_notice_description = $data['b_blood_bank_notice_description'];
        $blood_bank_notice->blood_bank_id                   = $blood_bank_id;

        if($blood_bank_notice->save())
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/notice/add'.'/'.$blood_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getBloodBankNoticeEdit($blood_bank_notice_id)
    {
        $blood_bank_notice = BloodBankNotice::find($blood_bank_notice_id);

        return view('bloodbank::blood_bank_notice_edit', compact('blood_bank_notice_id', 'blood_bank_notice'));
    }

    public function postBloodBankNoticeEdit(Request $request, $blood_bank_notice_id)
    {
        $data = $request->all();

        $blood_bank_id = BloodBankNotice::find($blood_bank_notice_id)->bloodBank->id;
        
        $blood_bank_notice = BloodBankNotice::find($blood_bank_notice_id);

        
        $blood_bank_notice->blood_bank_notice_description       = $data['blood_bank_notice_description'];
        $blood_bank_notice->b_blood_bank_notice_description     = $data['b_blood_bank_notice_description'];
        $blood_bank_notice->blood_bank_id                       = $blood_bank_id;

        if($blood_bank_notice->update())
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/notice/edit'.'/'.$blood_bank_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function BloodBankNoticeDelete($blood_bank_notice_id)
    {
        $blood_bank_notice = BloodBankNotice::find($blood_bank_notice_id);

        $blood_bank_id = BloodBankNotice::find($blood_bank_notice_id)->bloodBank->id;

        if($blood_bank_notice->delete())
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
