<?php

namespace App\Modules\Physiotherapy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\PhysiotherapyService;
use DB;

class PhysiotherapyServiceController extends Controller
{
    public function getPhysiotherapyServiceAdd($id)
    {   
        $services    = Service::all();
        $physiotherapy_id = $id;
        return view('physiotherapy::physiotherapy_service_add', compact('services', 'physiotherapy_id'));
    }


    public function postPhysiotherapyServiceAdd(Request $request, $id)
    {
        
        $data = $request->all();

        $check = PhysiotherapyService::where('service_id', $data['service_id'])->get();
        
        if(count($check)>0){

            return redirect('physiotherapy/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'physiotherapy_service_description'    => 'required',
            'b_physiotherapy_service_description'  => 'required',
        ]);

        $physiotherapy_service = new PhysiotherapyService;

        $physiotherapy_service->service_id                       = $data['service_id'];
        $physiotherapy_service->physiotherapy_service_description     = $data['physiotherapy_service_description'];
        $physiotherapy_service->b_physiotherapy_service_description   = $data['b_physiotherapy_service_description'];
        $physiotherapy_service->physiotherapy_id  = $id;

        if($physiotherapy_service->save())
        {
            return redirect('physiotherapy/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getPhysiotherapyServiceEdit($physiotherapy_service_id)
    {
        $physiotherapy_service   = PhysiotherapyService::find($physiotherapy_service_id);
        
        $service_name       = PhysiotherapyService::Join('service', 'service.id', 'physiotherapy_service.service_id' )
                                                ->where('physiotherapy_service.id', $physiotherapy_service_id)
                                                ->select('service.service_name')
                                                ->first();
        
        $physiotherapy_service_id = $physiotherapy_service_id;
        
        return view('physiotherapy::physiotherapy_service_edit', compact('physiotherapy_service_id', 'physiotherapy_service','service_name'));
    }

    public function postPhysiotherapyServiceEdit(Request $request, $physiotherapy_service_id)
    {
        $data = $request->all();

        $physiotherapy_id = PhysiotherapyService::find($physiotherapy_service_id)->physiotherapy->id;
        
        $physiotherapy_service = PhysiotherapyService::find($physiotherapy_service_id);


        $physiotherapy_service->physiotherapy_service_description     = $data['physiotherapy_service_description'];
        $physiotherapy_service->b_physiotherapy_service_description   = $data['b_physiotherapy_service_description'];
        $physiotherapy_service->physiotherapy_id                      = $physiotherapy_id;

        if($physiotherapy_service->update())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Updated Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/service/edit'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PhysiotherapyServiceDelete($physiotherapy_service_id)
    {
        $physiotherapy_service   = PhysiotherapyService::find($physiotherapy_service_id);

        $physiotherapy_id        = PhysiotherapyService::find($physiotherapy_service_id)->physiotherapy->id;

        if($physiotherapy_service->delete())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Deleted Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPhysiotherapyService($physiotherapy_id, $service_id){
        $services = DB::table('physiotherapy_service')
                        ->where('physiotherapy_id', $physiotherapy_id)
                        ->where('service_id', $service_id)
                        ->get();

        return $services;
    }
    

}
