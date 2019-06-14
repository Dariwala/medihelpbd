<?php

namespace App\Modules\Pharmacy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pharmacy;
use App\Models\PharmacyDoctor;
use App\Models\MedicalSpecialist;
use DB;

class PharmacyDoctorController extends Controller
{
    public function getPharmacyDoctorAdd($id)
    {
    	$pharmacy_id = $id;
    	return view('pharmacy::pharmacy_doctor_add', compact('pharmacy_id'));
    }


    public function postPharmacyDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $pharmacy_doctor = new PharmacyDoctor;

        $pharmacy_doctor->department_id 		  = $data['department_id'];
        $pharmacy_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $pharmacy_doctor->pharmacy_id 	          = $id;

        if($pharmacy_doctor->save())
        {
        	return redirect('pharmacy/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('pharmacy/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getPharmacyDoctorEdit($pharmacy_doctor_id)
    {
        $pharmacy_doctor = PharmacyDoctor::find($pharmacy_doctor_id);

        return view('pharmacy::pharmacy_doctor_edit', compact('pharmacy_doctor_id', 'pharmacy_doctor'));
    }

    public function postPharmacyDoctorEdit(Request $request, $pharmacy_doctor_id)
    {
        $data = $request->all();

        $pharmacy_id     = PharmacyDoctor::find($pharmacy_doctor_id)->pharmacy->id;
        
        $pharmacy_doctor = PharmacyDoctor::find($pharmacy_doctor_id);

        $pharmacy_doctor->pharmacy_id             = $pharmacy_id;
        $pharmacy_doctor->department_id           = $data['department_id'];
        $pharmacy_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($pharmacy_doctor->update())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/doctor/edit'.'/'.$pharmacy_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PharmacyDoctorDelete($pharmacy_doctor_id)
    {
        $pharmacy_doctor = PharmacyDoctor::find($pharmacy_doctor_id);

        $pharmacy_id = PharmacyDoctor::find($pharmacy_doctor_id)->pharmacy->id;

        if($pharmacy_doctor->delete())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPharmacyDoctor($medical_specialist_id,$pharmacy_id)
    {

        $doctor_ids = PharmacyDoctor::where('pharmacy_id', $pharmacy_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
       
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
