<?php

namespace App\Modules\Skinlasercenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SkinLaserCenter;
use App\Models\Service;
use App\Models\SubService;
use App\Models\SkinLaserCenterService;
use DB;


class SkinLaserCenterServiceController extends Controller
{
    public function getSkinLaserCenterServiceAdd($id)
    {
    	$skin_laser_center_id = $id;
    	return view('skinlasercenter::skin_laser_center_service_add', compact('skin_laser_center_id'));
    }


    public function postSkinLaserCenterServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = SkinLaserCenterService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('skin-laser-center/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                          => 'required',
            'skin_laser_center_service_description'   => 'required',
            'b_skin_laser_center_service_description' => 'required',
        ]);

        $skin_laser_center_service = new SkinLaserCenterService;

        $skin_laser_center_service->service_id 					  	        = $data['service_id'];
        $skin_laser_center_service->skin_laser_center_service_description 	= $data['skin_laser_center_service_description'];
        $skin_laser_center_service->b_skin_laser_center_service_description = $data['b_skin_laser_center_service_description'];
        $skin_laser_center_service->skin_laser_center_id 	                = $id;

        if($skin_laser_center_service->save())
        {
        	return redirect('skin-laser-center/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('skin-laser-center/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getSkinLaserCenterServiceEdit($skin_laser_center_service_id)
    {
        $skin_laser_center_service = SkinLaserCenterService::find($skin_laser_center_service_id);
        
        $service_name = SkinLaserCenterService::Join('service', 'service.id', 'skin_laser_center_service.service_id' )
                        ->where('skin_laser_center_service.id', $skin_laser_center_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('skinlasercenter::skin_laser_center_service_edit', compact('skin_laser_center_service_id', 'skin_laser_center_service','service_name'));
    }

    public function postSkinLaserCenterServiceEdit(Request $request, $skin_laser_center_service_id)
    {
        $data = $request->all();

        $skin_laser_center_id = SkinLaserCenterService::find($skin_laser_center_service_id)->skinLaserCenter->id;
        
        $skin_laser_center_service = SkinLaserCenterService::find($skin_laser_center_service_id);


        $skin_laser_center_service->skin_laser_center_service_description     = $data['skin_laser_center_service_description'];
        $skin_laser_center_service->b_skin_laser_center_service_description   = $data['b_skin_laser_center_service_description'];
        $skin_laser_center_service->skin_laser_center_id                      = $skin_laser_center_id;
        
        if($skin_laser_center_service->update())
        {
            return redirect('skin-laser-center/edit/info'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('skin-laser-center/edit/service'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function SkinLaserCenterServiceDelete($skin_laser_center_service_id)
    {
        $skin_laser_center_service = SkinLaserCenterService::find($skin_laser_center_service_id);

        $skin_laser_center_id = SkinLaserCenterService::find($skin_laser_center_service_id)->skinLaserCenter->id;

        if($skin_laser_center_service->delete())
        {
            return redirect('skin-laser-center/edit/service'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('skin-laser-center/edit/service'.'/'.$skin_laser_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
