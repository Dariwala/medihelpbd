<?php

namespace App\Modules\Gym\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gym;
use App\Models\GymDoctor;
use DB;

class GymDoctorController extends Controller
{
    public function getGymDoctorAdd($id)
    {
    	$gym_id = $id;
    	return view('gym::gym_doctor_add', compact('gym_id'));
    }


    public function postGymDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $gym_doctor = new GymDoctor;

        $gym_doctor->department_id 		  = $data['department_id'];
        $gym_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $gym_doctor->gym_id 	          = $id;

        if($gym_doctor->save())
        {
        	return redirect('gym/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('gym/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getGymDoctorEdit($gym_doctor_id)
    {
        $gym_doctor = GymDoctor::find($gym_doctor_id);

        return view('gym::gym_doctor_edit', compact('gym_doctor_id', 'gym_doctor'));
    }

    public function postGymDoctorEdit(Request $request, $gym_doctor_id)
    {
        $data = $request->all();

        $gym_id     = GymDoctor::find($gym_doctor_id)->gym->id;
        
        $gym_doctor = GymDoctor::find($gym_doctor_id);

        $gym_doctor->gym_id             = $gym_id;
        $gym_doctor->department_id           = $data['department_id'];
        $gym_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($gym_doctor->update())
        {
            return redirect('gym/edit/doctor/edit'.'/'.$gym_doctor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('gym/edit/doctor/edit'.'/'.$gym_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function GymDoctorDelete($gym_doctor_id)
    {
        $gym_doctor = GymDoctor::find($gym_doctor_id);

        $gym_id = GymDoctor::find($gym_doctor_id)->gym->id;

        if($gym_doctor->delete())
        {
            return redirect('gym/edit/info'.'/'.$gym_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('gym/edit/info'.'/'.$gym_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
