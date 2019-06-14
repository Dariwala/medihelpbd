<?php

namespace App\Modules\Parlour\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parlour;
use App\Models\ParlourDoctor;
use DB;

class ParlourDoctorController extends Controller
{
    public function getParlourDoctorAdd($id)
    {
    	$parlour_id = $id;
    	return view('parlour::parlour_doctor_add', compact('parlour_id'));
    }


    public function postParlourDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $parlour_doctor = new ParlourDoctor;

        $parlour_doctor->department_id 		  = $data['department_id'];
        $parlour_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $parlour_doctor->parlour_id 	          = $id;

        if($parlour_doctor->save())
        {
        	return redirect('parlour/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('parlour/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getParlourDoctorEdit($parlour_doctor_id)
    {
        $parlour_doctor = ParlourDoctor::find($parlour_doctor_id);

        return view('parlour::parlour_doctor_edit', compact('parlour_doctor_id', 'parlour_doctor'));
    }

    public function postParlourDoctorEdit(Request $request, $parlour_doctor_id)
    {
        $data = $request->all();

        $parlour_id     = ParlourDoctor::find($parlour_doctor_id)->parlour->id;
        
        $parlour_doctor = ParlourDoctor::find($parlour_doctor_id);

        $parlour_doctor->parlour_id             = $parlour_id;
        $parlour_doctor->department_id           = $data['department_id'];
        $parlour_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($parlour_doctor->update())
        {
            return redirect('parlour/edit/doctor/edit'.'/'.$parlour_doctor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('parlour/edit/doctor/edit'.'/'.$parlour_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function ParlourDoctorDelete($parlour_doctor_id)
    {
        $parlour_doctor = ParlourDoctor::find($parlour_doctor_id);

        $parlour_id = ParlourDoctor::find($parlour_doctor_id)->parlour->id;

        if($parlour_doctor->delete())
        {
            return redirect('parlour/edit/info'.'/'.$parlour_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('parlour/edit/info'.'/'.$parlour_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
