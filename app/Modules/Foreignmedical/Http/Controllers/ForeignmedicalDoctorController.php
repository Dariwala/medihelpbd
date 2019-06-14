<?php

namespace App\Modules\Foreignmedical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Foreignmedical;
use App\Models\ForeignmedicalDoctor;
use App\Models\MedicalSpecialist;
use DB;

class ForeignmedicalDoctorController extends Controller
{
    public function getForeignmedicalDoctorAdd($id)
    {
    	$foreignmedical_id = $id;
    	return view('foreignmedical::foreignmedical_doctor_add', compact('foreignmedical_id'));
    }


    public function postForeignmedicalDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $foreignmedical_doctor = new ForeignmedicalDoctor;

        $foreignmedical_doctor->department_id 		  = $data['department_id'];
        $foreignmedical_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $foreignmedical_doctor->foreignmedical_id 	          = $id;

        if($foreignmedical_doctor->save())
        {
        	return redirect('foreignmedical/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('foreignmedical/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getForeignmedicalDoctorEdit($foreignmedical_doctor_id)
    {
        $foreignmedical_doctor = ForeignmedicalDoctor::find($foreignmedical_doctor_id);

        return view('foreignmedical::foreignmedical_doctor_edit', compact('foreignmedical_doctor_id', 'foreignmedical_doctor'));
    }

    public function postForeignmedicalDoctorEdit(Request $request, $foreignmedical_doctor_id)
    {
        $data = $request->all();

        $foreignmedical_id     = ForeignmedicalDoctor::find($foreignmedical_doctor_id)->foreignmedical->id;
        
        $foreignmedical_doctor = ForeignmedicalDoctor::find($foreignmedical_doctor_id);

        $foreignmedical_doctor->foreignmedical_id             = $foreignmedical_id;
        $foreignmedical_doctor->department_id           = $data['department_id'];
        $foreignmedical_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($foreignmedical_doctor->update())
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/doctor/edit'.'/'.$foreignmedical_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function ForeignmedicalDoctorDelete($foreignmedical_doctor_id)
    {
        $foreignmedical_doctor = ForeignmedicalDoctor::find($foreignmedical_doctor_id);

        $foreignmedical_id = ForeignmedicalDoctor::find($foreignmedical_doctor_id)->foreignmedical->id;

        if($foreignmedical_doctor->delete())
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getForeignmedicalDoctor($medical_specialist_id,$foreignmedical_id)
    {

        $doctor_ids = ForeignmedicalDoctor::where('foreignmedical_id', $foreignmedical_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
       
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
