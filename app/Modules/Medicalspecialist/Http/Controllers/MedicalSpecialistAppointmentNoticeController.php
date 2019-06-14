<?php

namespace App\Modules\Medicalspecialist\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalSpecialistAppointmentNotice;
use App\Models\MedicalSpecialistAppointment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedicalSpecialistAppointmentNoticeController extends Controller
{
    public function getMedicalSpecialistAppointmentNoticeAdd($medical_specialist_id)
    {
        return view('medicalspecialist::medical_specialist_appointment_notice_add', compact('medical_specialist_id'));
    }

    public function getMedicalSpecialistAppointmentNoticeStore(Request $request, $medical_specialist_id){

        $this->validate($request,[
            'notice'=>'required',
        ]);

        $appointment_notice = new MedicalSpecialistAppointmentNotice();

        $appointment_notice->medical_specialist_id = $medical_specialist_id;
        $appointment_notice->notice                = $request->notice;
        $appointment_notice->notice_bn             = $notice_bn->notice;

        if($appointment_notice->save())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/appointment/notice/add'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getMedicalSpecialistAppointmentNoticeEdit($appointment_notice_id)
    {
        $appointment_notice = MedicalSpecialistAppointmentNotice::find($appointment_notice_id);

        return view('medicalspecialist::medical_specialist_appointment_notice_edit', compact('appointment_notice', 'appointment_notice_id'));
    }

    public function getMedicalSpecialistAppointmentNoticeUpdate(Request $request, $appointment_notice_id){

        $this->validate($request,[
            'notice'=>'required',
        ]);

        $medical_specialist_id = MedicalSpecialistAppointmentNotice::find($appointment_notice_id)->medicalSpecialist['id'];

        $appointment_notice = MedicalSpecialistAppointmentNotice::find($appointment_notice_id);
        $appointment_notice->notice                = $request->notice;
        $appointment_notice->notice_bn             = $request->notice_bn;
        $appointment_notice->medical_specialist_id = $medical_specialist_id;

        if($appointment_notice->update())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id )
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/appointment/notice/add'.'/'.$medical_specialist_id )
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getMedicalSpecialistAppointmentNoticeDelete($medical_specialist_appointment_id)
    {
        $medical_specialist_appointment_notice = MedicalSpecialistAppointment::find($medical_specialist_appointment_id);

        $medical_specialist_id = MedicalSpecialistAppointment::find($medical_specialist_appointment_id)->medical_specialist_id;
        

        if($medical_specialist_appointment_notice->delete())
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
