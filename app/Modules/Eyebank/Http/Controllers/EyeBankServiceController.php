<?php

namespace App\Modules\Eyebank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EyeBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\EyeBankService;
use DB;

class EyeBankServiceController extends Controller
{
    public function getEyeBankServiceAdd($id)
    {
    	$eye_bank_id = $id;
    	return view('eyebank::eye_bank_service_add', compact('eye_bank_id'));
    }


    public function postEyeBankServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = EyeBankService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('eye-bank/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                      => 'required',
            'eye_bank_service_description'    => 'required',
            'b_eye_bank_service_description'  => 'required',
        ]);

        $eye_bank_service = new EyeBankService;

        $eye_bank_service->service_id 					  	= $data['service_id'];
        $eye_bank_service->eye_bank_service_description 	= $data['eye_bank_service_description'];
        $eye_bank_service->b_eye_bank_service_description 	= $data['b_eye_bank_service_description'];
        $eye_bank_service->eye_bank_id 	= $id;

        if($eye_bank_service->save())
        {
        	return redirect('eye-bank/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('eye-bank/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
            
        }
    }




    public function getEyeBankServiceEdit($eye_bank_service_id)
    {
        $eye_bank_service = EyeBankService::find($eye_bank_service_id);
        
        $service_name = EyeBankService::Join('service', 'service.id', 'eye_bank_service.service_id' )
                        ->where('eye_bank_service.id', $eye_bank_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('eyebank::eye_bank_service_edit', compact('eye_bank_service_id', 'eye_bank_service','service_name'));
    }

    public function postEyeBankServiceEdit(Request $request, $eye_bank_service_id)
    {
        $data = $request->all();

        $eye_bank_id = EyeBankService::find($eye_bank_service_id)->eyeBank->id;
        
        $eye_bank_service = EyeBankService::find($eye_bank_service_id);

        
        $eye_bank_service->eye_bank_service_description     = $data['eye_bank_service_description'];
        $eye_bank_service->b_eye_bank_service_description   = $data['b_eye_bank_service_description'];
        $eye_bank_service->eye_bank_id                      = $eye_bank_id;


        if($eye_bank_service->update())
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('eye-bank/edit/service/edit'.'/'.$eye_bank_service_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function EyeBankServiceDelete($eye_bank_service_id)
    {
        $eye_bank_service = EyeBankService::find($eye_bank_service_id);

        $eye_bank_id = EyeBankService::find($eye_bank_service_id)->eyeBank->id;

        if($eye_bank_service->delete())
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('eye-bank/edit/info'.'/'.$eye_bank_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getEyeBankService($eye_bank_id, $service_id)
    {

         $services = DB::table('eye_bank_service')
            ->where('eye_bank_id', $eye_bank_id)
            ->where('service_id', $service_id)
            ->get();
            
        return $services;
    }

}
