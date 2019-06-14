<?php

namespace App\Modules\Homeopathic\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Homeopathic;
use App\Models\HomeopathicDoctor;
use App\Models\MedicalSpecialist;
use DB;

class HomeopathicDoctorController extends Controller
{
    public function getHomeopathicDoctorAdd($id)
    {
    	$homeopathic_id = $id;
    	return view('homeopathic::homeopathic_doctor_add', compact('homeopathic_id'));
    }


    public function postHomeopathicDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $homeopathic_doctor = new HomeopathicDoctor;

        $homeopathic_doctor->department_id 		  = $data['department_id'];
        $homeopathic_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $homeopathic_doctor->homeopathic_id 	          = $id;

        if($homeopathic_doctor->save())
        {
        	return redirect('homeopathic/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('homeopathic/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getHomeopathicDoctorEdit($homeopathic_doctor_id)
    {
        $homeopathic_doctor = HomeopathicDoctor::find($homeopathic_doctor_id);

        return view('homeopathic::homeopathic_doctor_edit', compact('homeopathic_doctor_id', 'homeopathic_doctor'));
    }

    public function postHomeopathicDoctorEdit(Request $request, $homeopathic_doctor_id)
    {
        $data = $request->all();

        $homeopathic_id     = HomeopathicDoctor::find($homeopathic_doctor_id)->homeopathic->id;
        
        $homeopathic_doctor = HomeopathicDoctor::find($homeopathic_doctor_id);

        $homeopathic_doctor->homeopathic_id             = $homeopathic_id;
        $homeopathic_doctor->department_id           = $data['department_id'];
        $homeopathic_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($homeopathic_doctor->update())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/doctor/edit'.'/'.$homeopathic_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HomeopathicDoctorDelete($homeopathic_doctor_id)
    {
        $homeopathic_doctor = HomeopathicDoctor::find($homeopathic_doctor_id);

        $homeopathic_id = HomeopathicDoctor::find($homeopathic_doctor_id)->homeopathic->id;

        if($homeopathic_doctor->delete())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getHomeopathicDoctor($medical_specialist_id,$homeopathic_id)
    {

        $doctor_ids = HomeopathicDoctor::where('homeopathic_id', $homeopathic_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
       
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
