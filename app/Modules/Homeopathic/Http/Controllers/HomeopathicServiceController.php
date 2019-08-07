<?php

namespace App\Modules\Homeopathic\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\HomeopathicService;
use DB;

class HomeopathicServiceController extends Controller
{
    public function getHomeopathicServiceAdd($id)
    {   
        $services    = Service::all();
        $homeopathic_id = $id;
        return view('homeopathic::homeopathic_service_add', compact('services', 'homeopathic_id'));
    }


    public function postHomeopathicServiceAdd(Request $request, $id)
    {
        
        $data = $request->all();

        $check = HomeopathicService::where('service_id', $data['service_id'])->get();
        
        if(count($check)>0){

            return redirect('homeopathic/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'homeopathic_service_description'    => 'required',
            'b_homeopathic_service_description'  => 'required',
        ]);

        $homeopathic_service = new HomeopathicService;

        $homeopathic_service->service_id                       = $data['service_id'];
        $homeopathic_service->homeopathic_service_description     = $data['homeopathic_service_description'];
        $homeopathic_service->b_homeopathic_service_description   = $data['b_homeopathic_service_description'];
        $homeopathic_service->homeopathic_id  = $id;

        if($homeopathic_service->save())
        {
            return redirect('homeopathic/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getHomeopathicServiceEdit($homeopathic_service_id)
    {
        $homeopathic_service   = HomeopathicService::find($homeopathic_service_id);
        
        $service_name       = HomeopathicService::Join('service', 'service.id', 'homeopathic_service.service_id' )
                                                ->where('homeopathic_service.id', $homeopathic_service_id)
                                                ->select('service.service_name')
                                                ->first();
        
        $homeopathic_service_id = $homeopathic_service_id;
        
        return view('homeopathic::homeopathic_service_edit', compact('homeopathic_service_id', 'homeopathic_service','service_name'));
    }

    public function postHomeopathicServiceEdit(Request $request, $homeopathic_service_id)
    {
        $data = $request->all();

        $homeopathic_id = HomeopathicService::find($homeopathic_service_id)->homeopathic->id;
        
        $homeopathic_service = HomeopathicService::find($homeopathic_service_id);


        $homeopathic_service->homeopathic_service_description     = $data['homeopathic_service_description'];
        $homeopathic_service->b_homeopathic_service_description   = $data['b_homeopathic_service_description'];
        $homeopathic_service->homeopathic_id                      = $homeopathic_id;

        if($homeopathic_service->update())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/service/edit'.'/'.$homeopathic_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HomeopathicServiceDelete($homeopathic_service_id)
    {
        $homeopathic_service   = HomeopathicService::find($homeopathic_service_id);

        $homeopathic_id        = HomeopathicService::find($homeopathic_service_id)->homeopathic->id;

        if($homeopathic_service->delete())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getHomeopathicService($homeopathic_id, $service_id){
        $services = DB::table('homeopathic_service')
                        ->where('homeopathic_id', $homeopathic_id)
                        ->where('service_id', $service_id)
                        ->get();

        return $services;
    }
    

}
