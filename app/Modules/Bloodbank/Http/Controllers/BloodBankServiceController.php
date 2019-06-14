<?php

namespace App\Modules\Bloodbank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\BloodBankService;
use DB;

class BloodBankServiceController extends Controller
{
    public function getBloodBankServiceAdd($id)
    {
        $blood_bank_id = $id;
        return view('bloodbank::blood_bank_service_add', compact('blood_bank_id'));
    }


    public function postBloodBankServiceAdd(Request $request, $id)
    {
        $data = $request->all();

        $check = BloodBankService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('blood-bank/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'blood_bank_service_description'    => 'required',
            'b_blood_bank_service_description'  => 'required',
        ]);

        $blood_bank_service = new BloodBankService;

        $blood_bank_service->service_id                         = $data['service_id'];
        $blood_bank_service->blood_bank_service_description     = $data['blood_bank_service_description'];
        $blood_bank_service->b_blood_bank_service_description   = $data['b_blood_bank_service_description'];
        $blood_bank_service->blood_bank_id  = $id;

        if($blood_bank_service->save())
        {
            return redirect('blood-bank/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getBloodBankServiceEdit($blood_bank_service_id)
    {
        $blood_bank_service = BloodBankService::find($blood_bank_service_id);
        $service_name = BloodBankService::Join('service', 'service.id', 'blood_bank_service.service_id' )
                        ->where('blood_bank_service.id', $blood_bank_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('bloodbank::blood_bank_service_edit', compact('blood_bank_service_id', 'blood_bank_service','service_name'));
    }

    public function postBloodBankServiceEdit(Request $request, $blood_bank_service_id)
    {
        $data = $request->all();

        $blood_bank_id = BloodBankService::find($blood_bank_service_id)->bloodbank->id;
        
        $blood_bank_service = BloodBankService::find($blood_bank_service_id);


        $blood_bank_service->blood_bank_service_description     = $data['blood_bank_service_description'];
        $blood_bank_service->b_blood_bank_service_description   = $data['b_blood_bank_service_description'];
        $blood_bank_service->blood_bank_id                      = $blood_bank_id;

        if($blood_bank_service->update())
        {
            return redirect('blood-bank/edit/info'.'/'.$blood_bank_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-bank/edit/service/edit'.'/'.$blood_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function BloodBankServiceDelete($blood_bank_service_id)
    {
        $blood_bank_service = BloodBankService::find($blood_bank_service_id);

        $blood_bank_id = BloodBankService::find($blood_bank_service_id)->bloodbank->id;

        if($blood_bank_service->delete())
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

    public function getBloodBankService($blood_bank_id, $service_id)
    {

         $services = DB::table('blood_bank_service')
            ->where('blood_bank_id', $blood_bank_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

}
