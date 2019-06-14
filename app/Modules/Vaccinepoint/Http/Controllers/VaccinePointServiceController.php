<?php

namespace App\Modules\Vaccinepoint\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\VaccinePoint;
use App\Models\Service;
use App\Models\SubService;
use App\Models\VaccinePointService;
use DB;


class VaccinePointServiceController extends Controller
{
    public function getVaccinePointServiceAdd($id)
    {
    	$vaccine_point_id = $id;
    	return view('vaccinepoint::vaccine_point_service_add', compact('vaccine_point_id'));
    }


    public function postVaccinePointServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = VaccinePointService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('vaccine-point/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                          => 'required',
            'vaccine_point_service_description'   => 'required',
            'b_vaccine_point_service_description' => 'required',
        ]);

        $vaccine_point_service = new VaccinePointService;

        $vaccine_point_service->service_id 					  	    = $data['service_id'];
        $vaccine_point_service->vaccine_point_service_description 	= $data['vaccine_point_service_description'];
        $vaccine_point_service->b_vaccine_point_service_description = $data['b_vaccine_point_service_description'];
        $vaccine_point_service->vaccine_point_id 	                = $id;

        if($vaccine_point_service->save())
        {
        	return redirect('vaccine-point/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('vaccine-point/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getVaccinePointServiceEdit($vaccine_point_service_id)
    {
        $vaccine_point_service = VaccinePointService::find($vaccine_point_service_id);
        
        $service_name = VaccinePointService::Join('service', 'service.id', 'vaccine_point_service.service_id' )
                        ->where('vaccine_point_service.id', $vaccine_point_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('vaccinepoint::vaccine_point_service_edit', compact('vaccine_point_service_id', 'vaccine_point_service','service_name'));
    }

    public function postVaccinePointServiceEdit(Request $request, $vaccine_point_service_id)
    {
        $data = $request->all();

        $vaccine_point_id = VaccinePointService::find($vaccine_point_service_id)->vaccinePoint->id;
        
        $vaccine_point_service = VaccinePointService::find($vaccine_point_service_id);

        
        $vaccine_point_service->vaccine_point_service_description     = $data['vaccine_point_service_description'];
        $vaccine_point_service->b_vaccine_point_service_description   = $data['b_vaccine_point_service_description'];
        $vaccine_point_service->vaccine_point_id                      = $vaccine_point_id;

        if($vaccine_point_service->update())
        {
            return redirect('vaccine-point/edit/info'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('vaccine-point/edit/service'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function VaccinePointServiceDelete($vaccine_point_service_id)
    {
        $vaccine_point_service = VaccinePointService::find($vaccine_point_service_id);

        $vaccine_point_id = VaccinePointService::find($vaccine_point_service_id)->vaccinePoint->id;

        if($vaccine_point_service->delete())
        {
            return redirect('vaccine-point/edit/service'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('vaccine-point/edit/service'.'/'.$vaccine_point_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
