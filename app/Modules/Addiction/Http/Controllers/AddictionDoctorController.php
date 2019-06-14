<?php

namespace App\Modules\Addiction\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Addiction;
use App\Models\AddictionDoctor;
use DB;

class AddictionDoctorController extends Controller
{
    public function getAddictionDoctorAdd($id)
    {
    	$addiction_id = $id;
    	return view('addiction::addiction_doctor_add', compact('addiction_id'));
    }


    public function postAddictionDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $addiction_doctor = new AddictionDoctor;

        $addiction_doctor->department_id 		  = $data['department_id'];
        $addiction_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $addiction_doctor->addiction_id 	          = $id;

        if($addiction_doctor->save())
        {
        	return redirect('addiction/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('addiction/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getAddictionDoctorEdit($addiction_doctor_id)
    {
        $addiction_doctor = AddictionDoctor::find($addiction_doctor_id);

        return view('addiction::addiction_doctor_edit', compact('addiction_doctor_id', 'addiction_doctor'));
    }

    public function postAddictionDoctorEdit(Request $request, $addiction_doctor_id)
    {
        $data = $request->all();

        $addiction_id     = AddictionDoctor::find($addiction_doctor_id)->addiction->id;
        
        $addiction_doctor = AddictionDoctor::find($addiction_doctor_id);

        $addiction_doctor->addiction_id             = $addiction_id;
        $addiction_doctor->department_id           = $data['department_id'];
        $addiction_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($addiction_doctor->update())
        {
            return redirect('addiction/edit/doctor/edit'.'/'.$addiction_doctor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('addiction/edit/doctor/edit'.'/'.$addiction_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function AddictionDoctorDelete($addiction_doctor_id)
    {
        $addiction_doctor = AddictionDoctor::find($addiction_doctor_id);

        $addiction_id = AddictionDoctor::find($addiction_doctor_id)->addiction->id;

        if($addiction_doctor->delete())
        {
            return redirect('addiction/edit/info'.'/'.$addiction_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('addiction/edit/info'.'/'.$addiction_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
