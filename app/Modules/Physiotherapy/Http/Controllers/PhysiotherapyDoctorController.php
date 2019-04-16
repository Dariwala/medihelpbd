<?php

namespace App\Modules\Physiotherapy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Physiotherapy;
use App\Models\PhysiotherapyDoctor;
use App\Models\MedicalSpecialist;
use DB;

class PhysiotherapyDoctorController extends Controller
{
    public function getPhysiotherapyDoctorAdd($id)
    {
    	$physiotherapy_id = $id;
    	return view('physiotherapy::physiotherapy_doctor_add', compact('physiotherapy_id'));
    }


    public function postPhysiotherapyDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $physiotherapy_doctor = new PhysiotherapyDoctor;

        $physiotherapy_doctor->department_id 		  = $data['department_id'];
        $physiotherapy_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $physiotherapy_doctor->physiotherapy_id 	          = $id;

        if($physiotherapy_doctor->save())
        {
        	return redirect('physiotherapy/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('physiotherapy/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getPhysiotherapyDoctorEdit($physiotherapy_doctor_id)
    {
        $physiotherapy_doctor = PhysiotherapyDoctor::find($physiotherapy_doctor_id);

        return view('physiotherapy::physiotherapy_doctor_edit', compact('physiotherapy_doctor_id', 'physiotherapy_doctor'));
    }

    public function postPhysiotherapyDoctorEdit(Request $request, $physiotherapy_doctor_id)
    {
        $data = $request->all();

        $physiotherapy_id     = PhysiotherapyDoctor::find($physiotherapy_doctor_id)->physiotherapy->id;
        
        $physiotherapy_doctor = PhysiotherapyDoctor::find($physiotherapy_doctor_id);

        $physiotherapy_doctor->physiotherapy_id             = $physiotherapy_id;
        $physiotherapy_doctor->department_id           = $data['department_id'];
        $physiotherapy_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($physiotherapy_doctor->update())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Updated Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/doctor/edit'.'/'.$physiotherapy_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PhysiotherapyDoctorDelete($physiotherapy_doctor_id)
    {
        $physiotherapy_doctor = PhysiotherapyDoctor::find($physiotherapy_doctor_id);

        $physiotherapy_id = PhysiotherapyDoctor::find($physiotherapy_doctor_id)->physiotherapy->id;

        if($physiotherapy_doctor->delete())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Deleted Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPhysiotherapyDoctor($medical_specialist_id,$physiotherapy_id)
    {

        $doctor_ids = PhysiotherapyDoctor::where('physiotherapy_id', $physiotherapy_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
       
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
