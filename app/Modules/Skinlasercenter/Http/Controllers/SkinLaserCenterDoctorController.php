<?php

namespace App\Modules\Skinlasercenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SkinLaserCenter;
use App\Models\SkinLaserCenterDoctor;
use DB;

class SkinLaserCenterDoctorController extends Controller
{
    public function getSkinLaserCenterDoctorAdd($id)
    {
    	$skin_laser_center_id = $id;
    	return view('skinlasercenter::skin_laser_center_doctor_add', compact('skin_laser_center_id'));
    }


    public function postSkinLaserCenterDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $skin_laser_center_doctor = new SkinLaserCenterDoctor;

        $skin_laser_center_doctor->department_id 		  = $data['department_id'];
        $skin_laser_center_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $skin_laser_center_doctor->skin_laser_center_id 	    = $id;

        if($skin_laser_center_doctor->save())
        {
        	return redirect('skin-laser-center/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('skin-laser-center/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getSkinLaserCenterDoctorEdit($skin_laser_center_doctor_id)
    {
        $skin_laser_center_doctor = SkinLaserCenterDoctor::find($skin_laser_center_doctor_id);

        return view('skinlasercenter::skin_laser_center_doctor_edit', compact('skin_laser_center_doctor_id', 'skin_laser_center_doctor'));
    }

    public function postSkinLaserCenterDoctorEdit(Request $request, $skin_laser_center_doctor_id)
    {
        $data = $request->all();

        $skin_laser_center_id     = SkinLaserCenterDoctor::find($skin_laser_center_doctor_id)->skinLaserCenter->id;
        
        $skin_laser_center_doctor = SkinLaserCenterDoctor::find($skin_laser_center_doctor_id);

        $skin_laser_center_doctor->skin_laser_center_id             = $skin_laser_center_id;
        $skin_laser_center_doctor->department_id           = $data['department_id'];
        $skin_laser_center_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($skin_laser_center_doctor->update())
        {
            return redirect('skin-laser-center/edit/info'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('skin-laser-center/edit/doctor/edit'.'/'.$skin_laser_center_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function SkinLaserCenterDoctorDelete($skin_laser_center_doctor_id)
    {
        $skin_laser_center_doctor = SkinLaserCenterDoctor::find($skin_laser_center_doctor_id);

        $skin_laser_center_id = SkinLaserCenterDoctor::find($skin_laser_center_doctor_id)->skinLaserCenter->id;

        if($skin_laser_center_doctor->delete())
        {
            return redirect('skin-laser-center/edit/info'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('skin-laser-center/edit/info'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
