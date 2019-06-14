<?php

namespace App\Modules\Optical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\OpticalService;
use DB;

class OpticalServiceController extends Controller
{
    public function getOpticalServiceAdd($id)
    {   
        $services    = Service::all();
        $optical_id = $id;
        return view('optical::optical_service_add', compact('services', 'optical_id'));
    }


    public function postOpticalServiceAdd(Request $request, $id)
    {
        
        $data = $request->all();

        $check = OpticalService::where('service_id', $data['service_id'])->get();
        
        if(count($check)>0){

            return redirect('optical/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'optical_service_description'    => 'required',
            'b_optical_service_description'  => 'required',
        ]);

        $optical_service = new OpticalService;

        $optical_service->service_id                       = $data['service_id'];
        $optical_service->optical_service_description     = $data['optical_service_description'];
        $optical_service->b_optical_service_description   = $data['b_optical_service_description'];
        $optical_service->optical_id  = $id;

        if($optical_service->save())
        {
            return redirect('optical/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getOpticalServiceEdit($optical_service_id)
    {
        $optical_service   = OpticalService::find($optical_service_id);
        
        $service_name       = OpticalService::Join('service', 'service.id', 'optical_service.service_id' )
                                                ->where('optical_service.id', $optical_service_id)
                                                ->select('service.service_name')
                                                ->first();
        
        $optical_service_id = $optical_service_id;
        
        return view('optical::optical_service_edit', compact('optical_service_id', 'optical_service','service_name'));
    }

    public function postOpticalServiceEdit(Request $request, $optical_service_id)
    {
        $data = $request->all();

        $optical_id = OpticalService::find($optical_service_id)->optical->id;
        
        $optical_service = OpticalService::find($optical_service_id);


        $optical_service->optical_service_description     = $data['optical_service_description'];
        $optical_service->b_optical_service_description   = $data['b_optical_service_description'];
        $optical_service->optical_id                      = $optical_id;

        if($optical_service->update())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/service/edit'.'/'.$optical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function OpticalServiceDelete($optical_service_id)
    {
        $optical_service   = OpticalService::find($optical_service_id);

        $optical_id        = OpticalService::find($optical_service_id)->optical->id;

        if($optical_service->delete())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getOpticalService($optical_id, $service_id){
        $services = DB::table('optical_service')
                        ->where('optical_id', $optical_id)
                        ->where('service_id', $service_id)
                        ->get();

        return $services;
    }
    

}
