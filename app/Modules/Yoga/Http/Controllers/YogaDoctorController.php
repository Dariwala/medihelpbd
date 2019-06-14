<?php

namespace App\Modules\Yoga\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Yoga;
use App\Models\YogaDoctor;
use DB;

class YogaDoctorController extends Controller
{
    public function getYogaDoctorAdd($id)
    {
    	$yoga_id = $id;
    	return view('yoga::yoga_doctor_add', compact('yoga_id'));
    }


    public function postYogaDoctorAdd(Request $request, $id)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_id'                   => 'required',
            'medical_specialist_id' 		  => 'required',
        ]);

        $yoga_doctor = new YogaDoctor;

        $yoga_doctor->department_id 		  = $data['department_id'];
        $yoga_doctor->medical_specialist_id   = $data['medical_specialist_id'];
        $yoga_doctor->yoga_id 	          = $id;

        if($yoga_doctor->save())
        {
        	return redirect('yoga/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('yoga/edit/doctor/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }




    public function getYogaDoctorEdit($yoga_doctor_id)
    {
        $yoga_doctor = YogaDoctor::find($yoga_doctor_id);

        return view('yoga::yoga_doctor_edit', compact('yoga_doctor_id', 'yoga_doctor'));
    }

    public function postYogaDoctorEdit(Request $request, $yoga_doctor_id)
    {
        $data = $request->all();

        $yoga_id     = YogaDoctor::find($yoga_doctor_id)->yoga->id;
        
        $yoga_doctor = YogaDoctor::find($yoga_doctor_id);

        $yoga_doctor->yoga_id             = $yoga_id;
        $yoga_doctor->department_id           = $data['department_id'];
        $yoga_doctor->medical_specialist_id   = $data['medical_specialist_id'];

        if($yoga_doctor->update())
        {
            return redirect('yoga/edit/doctor/edit'.'/'.$yoga_doctor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('yoga/edit/doctor/edit'.'/'.$yoga_doctor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function YogaDoctorDelete($yoga_doctor_id)
    {
        $yoga_doctor = YogaDoctor::find($yoga_doctor_id);

        $yoga_id = YogaDoctor::find($yoga_doctor_id)->yoga->id;

        if($yoga_doctor->delete())
        {
            return redirect('yoga/edit/info'.'/'.$yoga_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('yoga/edit/info'.'/'.$yoga_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
