<?php

namespace App\Modules\Herbalcenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HerbalCenter;
use App\Models\Service;
use App\Models\SubService;
use App\Models\HerbalCenterService;
use DB;


class HerbalCenterServiceController extends Controller
{
    public function getHerbalCenterServiceAdd($id)
    {
    	$herbal_center_id = $id;
    	return view('herbalcenter::herbal_center_service_add', compact('herbal_center_id'));
    }


    public function postHerbalCenterServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = HerbalCenterService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('herbal-center/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                          => 'required',
            'herbal_center_service_description'   => 'required',
            'b_herbal_center_service_description' => 'required',
        ]);

        $herbal_center_service = new HerbalCenterService;

        $herbal_center_service->service_id 					  	    = $data['service_id'];
        $herbal_center_service->herbal_center_service_description 	= $data['herbal_center_service_description'];
        $herbal_center_service->b_herbal_center_service_description = $data['b_herbal_center_service_description'];
        $herbal_center_service->herbal_center_id 	                = $id;

        if($herbal_center_service->save())
        {
        	return redirect('herbal-center/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('herbal-center/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getHerbalCenterServiceEdit($herbal_center_service_id)
    {
        $herbal_center_service = HerbalCenterService::find($herbal_center_service_id);
        
        $service_name = HerbalCenterService::Join('service', 'service.id', 'herbal_center_service.service_id' )
                        ->where('herbal_center_service.id', $herbal_center_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('herbalcenter::herbal_center_service_edit', compact('herbal_center_service_id', 'herbal_center_service','service_name'));
    }

    public function postHerbalCenterServiceEdit(Request $request, $herbal_center_service_id)
    {
        $data = $request->all();

        $herbal_center_id = HerbalCenterService::find($herbal_center_service_id)->herbalCenter->id;
        
        $herbal_center_service = HerbalCenterService::find($herbal_center_service_id);

        
        $herbal_center_service->herbal_center_service_description     = $data['herbal_center_service_description'];
        $herbal_center_service->b_herbal_center_service_description   = $data['b_herbal_center_service_description'];
        $herbal_center_service->herbal_center_id                      = $herbal_center_id;

        if($herbal_center_service->update())
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/service/edit'.'/'.$herbal_center_service_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function HerbalCenterServiceDelete($herbal_center_service_id)
    {
        $herbal_center_service = HerbalCenterService::find($herbal_center_service_id);

        $herbal_center_id = HerbalCenterService::find($herbal_center_service_id)->herbalCenter->id;

        if($herbal_center_service->delete())
        {
            return redirect('herbal-center/edit/service'.'/'.$herbal_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/service'.'/'.$herbal_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}

