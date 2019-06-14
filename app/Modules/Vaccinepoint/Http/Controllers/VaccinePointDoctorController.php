<?php

namespace App\Modules\Vaccinepoint\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\VaccinePoint;
use App\Models\VaccinePointDoctor;
use DB;

class VaccinePointDoctorController extends Controller
{
    public function getVaccinePointDoctorAdd($id)
    {
    	$vaccine_point_id = $id;
    	return view('vaccinepoint::vaccine_point_doctor_add', compact('vaccine_point_id'));
    }


    public function postVaccinePointDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $vaccine_point_doctor = new VaccinePointDoctor;

        $vaccine_point_doctor->department_id 		  = $data['department_id'];
        $vaccine_point_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $vaccine_point_doctor->vaccine_point_id 	    = $id;

        if($vaccine_point_doctor->save())
        {
        	return redirect('vaccine-point/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('vaccine-point/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getVaccinePointDoctorEdit($vaccine_point_doctor_id)
    {
        $vaccine_point_doctor = VaccinePointDoctor::find($vaccine_point_doctor_id);

        return view('vaccinepoint::vaccine_point_doctor_edit', compact('vaccine_point_doctor_id', 'vaccine_point_doctor'));
    }

    public function postVaccinePointDoctorEdit(Request $request, $vaccine_point_doctor_id)
    {
        $data = $request->all();

        $vaccine_point_id     = VaccinePointDoctor::find($vaccine_point_doctor_id)->vaccinePoint->id;
        
        $vaccine_point_doctor = VaccinePointDoctor::find($vaccine_point_doctor_id);

        $vaccine_point_doctor->vaccine_point_id             = $vaccine_point_id;
        $vaccine_point_doctor->department_id           = $data['department_id'];
        $vaccine_point_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($vaccine_point_doctor->update())
        {
            return redirect('vaccine-point/edit/info'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('vaccine-point/edit/doctor/edit'.'/'.$vaccine_point_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function VaccinePointDoctorDelete($vaccine_point_doctor_id)
    {
        $vaccine_point_doctor = VaccinePointDoctor::find($vaccine_point_doctor_id);

        $vaccine_point_id = VaccinePointDoctor::find($vaccine_point_doctor_id)->vaccinePoint->id;

        if($vaccine_point_doctor->delete())
        {
            return redirect('vaccine-point/edit/info'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('vaccine-point/edit/info'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
