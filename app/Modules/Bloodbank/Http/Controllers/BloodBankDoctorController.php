<?php

namespace App\Modules\Bloodbank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BloodBankDoctor;
use App\Models\BloodBank;
use DB;

class BloodBankDoctorController extends Controller
{
    //
    public function getBloodBankDoctorAdd($id)
    {
    	$blood_bank_id = $id;
    	return view('bloodbank::blood_bank_doctor_add', compact('blood_bank_id'));
    }


    public function postBloodBankDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $blood_bank_doctor = new BloodBankDoctor;

        $blood_bank_doctor->department_id 		    = $data['department_id'];
        $blood_bank_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $blood_bank_doctor->blood_bank_id 	    = $id;

        if($blood_bank_doctor->save())
        {
        	return redirect('blood-bank/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('blood-bank/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getBloodBankDoctorEdit($blood_bank_doctor_id)
    {
        $blood_bank_doctor = BloodBankDoctor::find($blood_bank_doctor_id);

        return view('bloodbank::blood_bank_doctor_edit', compact('blood_bank_doctor_id', 'blood_bank_doctor'));
    }

    public function postBloodBankDoctorEdit(Request $request, $blood_bank_doctor_id)
    {
        $data = $request->all();

        $blood_bank_id     = BloodBankDoctor::find($blood_bank_doctor_id)->bloodBank->id;
        
        $blood_bank_doctor = BloodBankDoctor::find($blood_bank_doctor_id);

        $blood_bank_doctor->blood_bank_id             = $blood_bank_id;
        $blood_bank_doctor->department_id             = $data['department_id'];
        $blood_bank_doctor->medical_specialist_id     = $data['medical_specialist_id'];

        if($blood_bank_doctor->update())
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/doctor/edit'.'/'.$blood_bank_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function BloodBankDoctorDelete($blood_bank_doctor_id)
    {
        $blood_bank_doctor = BloodBankDoctor::find($blood_bank_doctor_id);

        $blood_bank_id = BloodBankDoctor::find($blood_bank_doctor_id)->bloodBank->id;

        if($blood_bank_doctor->delete())
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
