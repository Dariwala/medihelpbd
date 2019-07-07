<?php

namespace App\Modules\Medicalspecialist\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MedicalSpecialist;

class MedicalSpecialistSpecialityController extends Controller
{
    public function index($medical_specialist_id)
    {
        $medical_specialist = MedicalSpecialist::find($medical_specialist_id);
        return view('medicalspecialist::medical_specialist_speciality', compact('medical_specialist','medical_specialist_id'));
    }

    public function postSpeciality(Request $request, $medical_specialist_id)
    {
        $data = $request->all();

        $medical_specialist = MedicalSpecialist::find($medical_specialist_id);
        $medical_specialist->specialty = data['specialty'];
        $medical_specialist->b_specialty = data['b_specialty'];

        if($medical_specialist->update())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
    }
}