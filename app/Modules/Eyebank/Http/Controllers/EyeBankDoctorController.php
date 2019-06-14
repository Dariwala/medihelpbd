<?php

namespace App\Modules\Eyebank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EyeBank;
use App\Models\EyeBankDoctor;
use DB;

class EyeBankDoctorController extends Controller
{
    public function getEyeBankDoctorAdd($id)
    {
    	$eye_bank_id = $id;
    	return view('eyebank::eye_bank_doctor_add', compact('eye_bank_id'));
    }


    public function postEyeBankDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $eye_bank_doctor = new EyeBankDoctor;

        $eye_bank_doctor->department_id 		  = $data['department_id'];
        $eye_bank_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $eye_bank_doctor->eye_bank_id 	          = $id;

        if($eye_bank_doctor->save())
        {
        	return redirect('eye-bank/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('eye-bank/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getEyeBankDoctorEdit($eye_bank_doctor_id)
    {
        $eye_bank_doctor = EyeBankDoctor::find($eye_bank_doctor_id);

        return view('eyebank::eye_bank_doctor_edit', compact('eye_bank_doctor_id', 'eye_bank_doctor'));
    }

    public function postEyeBankDoctorEdit(Request $request, $eye_bank_doctor_id)
    {
        $data = $request->all();

        $eye_bank_id     = EyeBankDoctor::find($eye_bank_doctor_id)->eyeBank->id;
        
        $eye_bank_doctor = EyeBankDoctor::find($eye_bank_doctor_id);

        $eye_bank_doctor->eye_bank_id             = $eye_bank_id;
        $eye_bank_doctor->department_id           = $data['department_id'];
        $eye_bank_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($eye_bank_doctor->update())
        {
            return redirect('eye-bank/edit/doctor/edit'.'/'.$eye_bank_doctor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('eye-bank/edit/doctor/edit'.'/'.$eye_bank_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function EyeBankDoctorDelete($eye_bank_doctor_id)
    {
        $eye_bank_doctor = EyeBankDoctor::find($eye_bank_doctor_id);

        $eye_bank_id = EyeBankDoctor::find($eye_bank_doctor_id)->eyeBank->id;

        if($eye_bank_doctor->delete())
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
