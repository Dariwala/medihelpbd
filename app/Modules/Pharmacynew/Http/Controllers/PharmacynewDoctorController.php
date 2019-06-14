<?php

namespace App\Modules\Pharmacynew\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pharmacynew;
use App\Models\PharmacynewDoctor;
use App\Models\MedicalSpecialist;
use DB;

class PharmacynewDoctorController extends Controller
{
    public function getPharmacynewDoctorAdd($id)
    {
    	$pharmacynew_id = $id;
    	return view('pharmacynew::pharmacynew_doctor_add', compact('pharmacynew_id'));
    }


    public function postPharmacynewDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $pharmacynew_doctor = new PharmacynewDoctor;

        $pharmacynew_doctor->department_id 		  = $data['department_id'];
        $pharmacynew_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $pharmacynew_doctor->pharmacynew_id 	          = $id;

        if($pharmacynew_doctor->save())
        {
        	return redirect('pharmacynew/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('pharmacynew/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getPharmacynewDoctorEdit($pharmacynew_doctor_id)
    {
        $pharmacynew_doctor = PharmacynewDoctor::find($pharmacynew_doctor_id);

        return view('pharmacynew::pharmacynew_doctor_edit', compact('pharmacynew_doctor_id', 'pharmacynew_doctor'));
    }

    public function postPharmacynewDoctorEdit(Request $request, $pharmacynew_doctor_id)
    {
        $data = $request->all();

        $pharmacynew_id     = PharmacynewDoctor::find($pharmacynew_doctor_id)->pharmacynew->id;
        
        $pharmacynew_doctor = PharmacynewDoctor::find($pharmacynew_doctor_id);

        $pharmacynew_doctor->pharmacynew_id             = $pharmacynew_id;
        $pharmacynew_doctor->department_id           = $data['department_id'];
        $pharmacynew_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($pharmacynew_doctor->update())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/doctor/edit'.'/'.$pharmacynew_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PharmacynewDoctorDelete($pharmacynew_doctor_id)
    {
        $pharmacynew_doctor = PharmacynewDoctor::find($pharmacynew_doctor_id);

        $pharmacynew_id = PharmacynewDoctor::find($pharmacynew_doctor_id)->pharmacynew->id;

        if($pharmacynew_doctor->delete())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPharmacynewDoctor($medical_specialist_id,$pharmacynew_id)
    {

        $doctor_ids = PharmacynewDoctor::where('pharmacynew_id', $pharmacynew_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
       
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
