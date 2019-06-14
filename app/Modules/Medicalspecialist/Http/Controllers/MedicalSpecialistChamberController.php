<?php

namespace App\Modules\Medicalspecialist\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MedicalSpecialist;
use App\Models\MedicalSpecialistChamber;

class MedicalSpecialistChamberController extends Controller
{
    public function getMedicalSpecialistChamberAdd($medical_specialist_id)
    {

    	return view('medicalspecialist::medical_specialist_chamber_add', compact('medical_specialist_id'));
    }

    public function postMedicalSpecialistChamberAdd(Request $request, $medical_specialist_id)
    {
    	
    	$data = $request->all();

    	$medical_specialist_chamber = new MedicalSpecialistChamber;

    	$medical_specialist_chamber->medical_specialist_chamber_description   = $data['medical_specialist_chamber_description'];
    	$medical_specialist_chamber->b_medical_specialist_chamber_description = $data['b_medical_specialist_chamber_description'];
    	$medical_specialist_chamber->medical_specialist_id 				      = $medical_specialist_id;

    	if($medical_specialist_chamber->save())
        {
        	return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('medical-specialist/edit/chamber/add'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getMedicalSpecialistChamberEdit($medical_specialist_chamber_id)
    {
        $medical_specialist_chamber = MedicalSpecialistChamber::find($medical_specialist_chamber_id);

        return view('medicalspecialist::medical_specialist_chamber_edit', compact('medical_specialist_chamber_id', 'medical_specialist_chamber'));
    }

    public function postMedicalSpecialistChamberEdit(Request $request, $medical_specialist_chamber_id)
    {
        $data = $request->all();

        $medical_specialist_id = MedicalSpecialistChamber::find($medical_specialist_chamber_id)->medicalSpecialist->id;
        
        $medical_specialist_chamber = MedicalSpecialistChamber::find($medical_specialist_chamber_id);

        
        $medical_specialist_chamber->medical_specialist_chamber_description   = $data['medical_specialist_chamber_description'];
        $medical_specialist_chamber->b_medical_specialist_chamber_description = $data['b_medical_specialist_chamber_description'];
        $medical_specialist_chamber->medical_specialist_id                    = $medical_specialist_id;

        if($medical_specialist_chamber->update())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function MedicalSpecialistChamberDelete($medical_specialist_chamber_id)
    {
        $medical_specialist_chamber = MedicalSpecialistChamber::find($medical_specialist_chamber_id);

        $medical_specialist_id = MedicalSpecialistChamber::find($medical_specialist_chamber_id)->medicalSpecialist->id;

        if($medical_specialist_chamber->delete())
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('medical-specialist/edit/info'.'/'.$medical_specialist_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
