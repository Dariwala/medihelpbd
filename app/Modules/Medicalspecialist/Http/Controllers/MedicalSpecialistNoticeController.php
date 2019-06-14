<?php

namespace App\Modules\Medicalspecialist\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MedicalSpecialist;
use App\Models\MedicalSpecialistNotice;

class MedicalSpecialistNoticeController extends Controller
{
    public function getMedicalSpecialistNoticeAdd($medical_specialist_id)
    {

    	return view('medicalspecialist::medical_specialist_notice_add', compact('medical_specialist_id'));
    }

    public function postMedicalSpecialistNoticeAdd(Request $request, $medical_specialist_id)
    {
    	
    	$data = $request->all();

    	$medical_specialist_notice = new MedicalSpecialistNotice;

    	$medical_specialist_notice->medical_specialist_notice_description   = $data['medical_specialist_notice_description'];
    	$medical_specialist_notice->b_medical_specialist_notice_description = $data['b_medical_specialist_notice_description'];
    	$medical_specialist_notice->medical_specialist_id 				    = $medical_specialist_id;

    	if($medical_specialist_notice->save())
        {
        	return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('medical-specialist/edit/notice/add'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getMedicalSpecialistNoticeEdit($medical_specialist_notice_id)
    {
        $medical_specialist_notice = MedicalSpecialistNotice::find($medical_specialist_notice_id);

        return view('medicalspecialist::medical_specialist_notice_edit', compact('medical_specialist_notice_id', 'medical_specialist_notice'));
    }

    public function postMedicalSpecialistNoticeEdit(Request $request, $medical_specialist_notice_id)
    {
        $data = $request->all();

        $medical_specialist_id = MedicalSpecialistNotice::find($medical_specialist_notice_id)->medicalSpecialist->id;
        
        $medical_specialist_notice = MedicalSpecialistNotice::find($medical_specialist_notice_id);


        $medical_specialist_notice->medical_specialist_notice_description     	= $data['medical_specialist_notice_description'];
        $medical_specialist_notice->b_medical_specialist_notice_description   	= $data['b_medical_specialist_notice_description'];
        $medical_specialist_notice->medical_specialist_id                      	= $medical_specialist_id;

        if($medical_specialist_notice->update())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function MedicalSpecialistNoticeDelete($medical_specialist_notice_id)
    {
        $medical_specialist_notice = MedicalSpecialistNotice::find($medical_specialist_notice_id);

        $medical_specialist_id = MedicalSpecialistNotice::find($medical_specialist_notice_id)->medicalSpecialist->id;

        if($medical_specialist_notice->delete())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
