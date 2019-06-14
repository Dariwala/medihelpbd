<?php

namespace App\Modules\Optical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Optical;
use App\Models\OpticalDoctor;
use App\Models\MedicalSpecialist;
use DB;

class OpticalDoctorController extends Controller
{
    public function getOpticalDoctorAdd($id)
    {
    	$optical_id = $id;
    	return view('optical::optical_doctor_add', compact('optical_id'));
    }


    public function postOpticalDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $optical_doctor = new OpticalDoctor;

        $optical_doctor->department_id 		  = $data['department_id'];
        $optical_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $optical_doctor->optical_id 	          = $id;

        if($optical_doctor->save())
        {
        	return redirect('optical/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('optical/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getOpticalDoctorEdit($optical_doctor_id)
    {
        $optical_doctor = OpticalDoctor::find($optical_doctor_id);

        return view('optical::optical_doctor_edit', compact('optical_doctor_id', 'optical_doctor'));
    }

    public function postOpticalDoctorEdit(Request $request, $optical_doctor_id)
    {
        $data = $request->all();

        $optical_id     = OpticalDoctor::find($optical_doctor_id)->optical->id;
        
        $optical_doctor = OpticalDoctor::find($optical_doctor_id);

        $optical_doctor->optical_id             = $optical_id;
        $optical_doctor->department_id           = $data['department_id'];
        $optical_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($optical_doctor->update())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/doctor/edit'.'/'.$optical_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function OpticalDoctorDelete($optical_doctor_id)
    {
        $optical_doctor = OpticalDoctor::find($optical_doctor_id);

        $optical_id = OpticalDoctor::find($optical_doctor_id)->optical->id;

        if($optical_doctor->delete())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getOpticalDoctor($medical_specialist_id,$optical_id)
    {

        $doctor_ids = OpticalDoctor::where('optical_id', $optical_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
       
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
