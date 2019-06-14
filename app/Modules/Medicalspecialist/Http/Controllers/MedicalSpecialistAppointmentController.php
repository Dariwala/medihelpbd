<?php

namespace App\Modules\Medicalspecialist\Http\Controllers;

use App\Models\MedicalSpecialistAppointment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedicalSpecialistAppointmentController extends Controller
{
    public function getMedicalSpecialistAppointmentAdd($medical_specialist_id)
    {
        return view('medicalspecialist::medical_specialist_appointment_add', compact('medical_specialist_id'));
    }

    public function getMedicalSpecialistAppointmentStore(Request $request, $medical_specialist_id){

        $this->validate($request,[
           'chamber_name'=>'required',
        ]);
        $appointment = new MedicalSpecialistAppointment();

        $appointment->medical_specialist_id = $medical_specialist_id;
        $appointment->chamber_name          = $request->chamber_name;
        $appointment->chamber_name_bn       = $request->chamber_name_bn;
        $appointment->details               = $request->details;
        $appointment->details_bn            = $request->details_bn;
        //$appointment->start_time            = $request->start_time;
        //$appointment->end_time              = $request->end_time;
        //$appointment->max_serial_limit      = $request->max_serial_limit;
        //$appointment->max_serial_limit_en   = $request->max_serial_limit_en;
        //$appointment->max_serial_limit_bn   = $request->max_serial_limit_bn;
        //$appointment->serial_time_en        = $request->serial_time_en;
        //$appointment->serial_time_bn        = $request->serial_time_bn;
        $appointment->notice                = $request->notice;
        $appointment->notice_bn             = $request->notice_bn;
        $appointment->max_serial_limit_morning_new_en = $request->max_serial_limit_morning_new_en;
        $appointment->max_serial_limit_morning_new_bn = $request->max_serial_limit_morning_new_bn;
        $appointment->max_serial_limit_morning_report_en = $request->max_serial_limit_morning_report_en;
        $appointment->max_serial_limit_morning_report_bn = $request->max_serial_limit_morning_report_bn;
        $appointment->max_serial_limit_evening_new_en = $request->max_serial_limit_evening_new_en;
        $appointment->max_serial_limit_evening_new_bn = $request->max_serial_limit_evening_new_bn;
        $appointment->max_serial_limit_evening_report_en = $request->max_serial_limit_evening_report_en;
        $appointment->max_serial_limit_evening_report_bn = $request->max_serial_limit_evening_report_bn;
        $appointment->serial_time_morning_en = $request->serial_time_morning_en;
        $appointment->serial_time_morning_bn = $request->serial_time_morning_bn;
        $appointment->serial_time_evening_en = $request->serial_time_evening_en;
        $appointment->serial_time_evening_bn = $request->serial_time_evening_bn;
        $appointment->start_time_morning = $request->start_time_morning;
        $appointment->end_time_morning = $request->end_time_morning;
        $appointment->start_time_evening = $request->start_time_evening;
        $appointment->end_time_evening = $request->end_time_evening;
        $appointment->serial_given_before_days_en = $request->serial_given_before_days_en;
        $appointment->serial_given_before_days_bn = $request->serial_given_before_days_bn;
        //$appointment->note                  = $request->note;

        if($appointment->save())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/appointment/add'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getMedicalSpecialistAppointmentEdit($appointment_id)
    {
        $appointment = MedicalSpecialistAppointment::find($appointment_id);

        return view('medicalspecialist::medical_specialist_appointment_edit', compact('appointment_id', 'appointment'));
    }

    public function getMedicalSpecialistAppointmentUpdate(Request $request, $appointment_id){

        $this->validate($request,[
            'chamber_name'=>'required',
        ]);

        $medical_specialist_id = MedicalSpecialistAppointment::find($appointment_id)->medicalSpecialist['id'];

        $appointment = MedicalSpecialistAppointment::find($appointment_id);

        $appointment->medical_specialist_id = $medical_specialist_id;
        $appointment->chamber_name          = $request->chamber_name;
        $appointment->chamber_name_bn       = $request->chamber_name_bn;
        $appointment->details               = $request->details;
        $appointment->details_bn            = $request->details_bn;
        //$appointment->start_time            = $request->start_time;
        //$appointment->end_time              = $request->end_time;
        //$appointment->max_serial_limit      = $request->max_serial_limit;
        //$appointment->max_serial_limit_en   = $request->max_serial_limit_en;
        //$appointment->max_serial_limit_bn   = $request->max_serial_limit_bn;
        //$appointment->serial_time_en        = $request->serial_time_en;
        //$appointment->serial_time_bn        = $request->serial_time_bn;
        $appointment->notice                = $request->notice;
        $appointment->notice_bn             = $request->notice_bn;
        $appointment->max_serial_limit_morning_new_en = $request->max_serial_limit_morning_new_en;
        $appointment->max_serial_limit_morning_new_bn = $request->max_serial_limit_morning_new_bn;
        $appointment->max_serial_limit_morning_report_en = $request->max_serial_limit_morning_report_en;
        $appointment->max_serial_limit_morning_report_bn = $request->max_serial_limit_morning_report_bn;
        $appointment->max_serial_limit_evening_new_en = $request->max_serial_limit_evening_new_en;
        $appointment->max_serial_limit_evening_new_bn = $request->max_serial_limit_evening_new_bn;
        $appointment->max_serial_limit_evening_report_en = $request->max_serial_limit_evening_report_en;
        $appointment->max_serial_limit_evening_report_bn = $request->max_serial_limit_evening_report_bn;
        $appointment->serial_time_morning_en = $request->serial_time_morning_en;
        $appointment->serial_time_morning_bn = $request->serial_time_morning_bn;
        $appointment->serial_time_evening_en = $request->serial_time_evening_en;
        $appointment->serial_time_evening_bn = $request->serial_time_evening_bn;
        $appointment->start_time_morning = $request->start_time_morning;
        $appointment->end_time_morning = $request->end_time_morning;
        $appointment->start_time_evening = $request->start_time_evening;
        $appointment->end_time_evening = $request->end_time_evening;
        $appointment->serial_given_before_days_en = $request->serial_given_before_days_en;
        $appointment->serial_given_before_days_bn = $request->serial_given_before_days_bn;
        //$appointment->note                  = $request->note;

        if($appointment->update())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id )
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/appointment/add'.'/'.$medical_specialist_id )
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
    

    public function getMedicalSpecialistAppointmentDelete($medical_specialist_appointment_id)
    {
        $medical_specialist_appointment = MedicalSpecialistAppointment::find($medical_specialist_appointment_id);

        $medical_specialist_id = MedicalSpecialistAppointment::find($medical_specialist_appointment_id)->medicalSpecialist->id;

        if($medical_specialist_appointment->delete())
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
