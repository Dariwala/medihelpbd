<?php

namespace App\Modules\Herbalcenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HerbalCenter;
use App\Models\HerbalCenterDoctor;
use DB;

class HerbalCenterDoctorController extends Controller
{
    public function getHerbalCenterDoctorAdd($id)
    {
    	$herbal_center_id = $id;
    	return view('herbalcenter::herbal_center_doctor_add', compact('herbal_center_id'));
    }


    public function postHerbalCenterDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $herbal_center_doctor = new HerbalCenterDoctor;

        $herbal_center_doctor->department_id 		  = $data['department_id'];
        $herbal_center_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $herbal_center_doctor->herbal_center_id 	    = $id;

        if($herbal_center_doctor->save())
        {
        	return redirect('herbal-center/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('herbal-center/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getHerbalCenterDoctorEdit($herbal_center_doctor_id)
    {
        $herbal_center_doctor = HerbalCenterDoctor::find($herbal_center_doctor_id);

        return view('herbalcenter::herbal_center_doctor_edit', compact('herbal_center_doctor_id', 'herbal_center_doctor'));
    }

    public function postHerbalCenterDoctorEdit(Request $request, $herbal_center_doctor_id)
    {
        $data = $request->all();

        $herbal_center_id     = HerbalCenterDoctor::find($herbal_center_doctor_id)->herbalCenter->id;
        
        $herbal_center_doctor = HerbalCenterDoctor::find($herbal_center_doctor_id);

        $herbal_center_doctor->herbal_center_id             = $herbal_center_id;
        $herbal_center_doctor->department_id           = $data['department_id'];
        $herbal_center_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($herbal_center_doctor->update())
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/doctor/edit'.'/'.$herbal_center_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HerbalCenterDoctorDelete($herbal_center_doctor_id)
    {
        $herbal_center_doctor = HerbalCenterDoctor::find($herbal_center_doctor_id);

        $herbal_center_id = HerbalCenterDoctor::find($herbal_center_doctor_id)->herbalCenter->id;

        if($herbal_center_doctor->delete())
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
