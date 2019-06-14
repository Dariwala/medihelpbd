<?php

namespace App\Modules\Hospital\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Hospital;
use App\Models\HospitalDoctor;
use DB;

class HospitalDoctorController extends Controller
{
    public function getHospitalDoctorAdd($id)
    {
    	$hospital_id = $id;
    	return view('hospital::hospital_doctor_add', compact('hospital_id'));
    }


    public function postHospitalDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $hospital_doctor = new HospitalDoctor;

        $hospital_doctor->department_id 		  = $data['department_id'];
        $hospital_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $hospital_doctor->hospital_id 	          = $id;

        if($hospital_doctor->save())
        {
        	return redirect('hospital/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('hospital/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getHospitalDoctorEdit($hospital_doctor_id)
    {
        $hospital_doctor = HospitalDoctor::find($hospital_doctor_id);

        return view('hospital::hospital_doctor_edit', compact('hospital_doctor_id', 'hospital_doctor'));
    }

    public function postHospitalDoctorEdit(Request $request, $hospital_doctor_id)
    {
        $data = $request->all();

        $hospital_id     = HospitalDoctor::find($hospital_doctor_id)->hospital->id;
        
        $hospital_doctor = HospitalDoctor::find($hospital_doctor_id);

        $hospital_doctor->hospital_id             = $hospital_id;
        $hospital_doctor->department_id           = $data['department_id'];
        $hospital_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($hospital_doctor->update())
        {
            return redirect('hospital/edit/doctor/edit'.'/'.$hospital_doctor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('hospital/edit/doctor/edit'.'/'.$hospital_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HospitalDoctorDelete($hospital_doctor_id)
    {
        $hospital_doctor = HospitalDoctor::find($hospital_doctor_id);

        $hospital_id = HospitalDoctor::find($hospital_doctor_id)->hospital->id;

        if($hospital_doctor->delete())
        {
            return redirect('hospital/edit/info'.'/'.$hospital_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('hospital/edit/info'.'/'.$hospital_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
