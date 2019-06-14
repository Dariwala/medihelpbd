<?php

namespace App\Modules\Hospital\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Hospital;
use App\Models\Service;
use App\Models\SubService;
use App\Models\HospitalService;
use DB;


class HospitalServiceController extends Controller
{
    public function getHospitalServiceAdd($id)
    {
    	$hospital_id = $id;
    	return view('hospital::hospital_service_add', compact('hospital_id'));
    }


    public function postHospitalServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = HospitalService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('hospital/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                      => 'required',
            'hospital_service_description'    => 'required',
            'b_hospital_service_description'  => 'required',
        ]);

        $hospital_service = new HospitalService;

        $hospital_service->service_id 					  	= $data['service_id'];
        $hospital_service->hospital_service_description 	= $data['hospital_service_description'];
        $hospital_service->b_hospital_service_description 	= $data['b_hospital_service_description'];
        $hospital_service->hospital_id 	                    = $id;

        if($hospital_service->save())
        {
        	return redirect('hospital/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('hospital/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getHospitalServiceEdit($hospital_service_id)
    {
        $hospital_service = HospitalService::find($hospital_service_id);
        
        $service_name = HospitalService::Join('service', 'service.id', 'hospital_service.service_id' )
                        ->where('hospital_service.id', $hospital_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('hospital::hospital_service_edit', compact('hospital_service_id', 'hospital_service','service_name'));
    }

    public function postHospitalServiceEdit(Request $request, $hospital_service_id)
    {
        $data = $request->all();

        $hospital_id = HospitalService::find($hospital_service_id)->hospital->id;
        
        $hospital_service = HospitalService::find($hospital_service_id);

        $hospital_service->hospital_service_description     = $data['hospital_service_description'];
        $hospital_service->b_hospital_service_description   = $data['b_hospital_service_description'];
        $hospital_service->hospital_id                      = $hospital_id;

        if($hospital_service->update())
        {
            return redirect('hospital/edit/service'.'/'.$hospital_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('hospital/edit/service'.'/'.$hospital_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function hospitalServiceDelete($hospital_service_id)
    {
        $hospital_service = HospitalService::find($hospital_service_id);

        $hospital_id = HospitalService::find($hospital_service_id)->hospital->id;

        if($hospital_service->delete())
        {
            return redirect('hospital/edit/service'.'/'.$hospital_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('hospital/edit/service'.'/'.$hospital_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function all(request $request)
    {
        $subDistrict = $request->subDistrict;
        
        if(isset($subDistrict)){
            if(Session('language')=='bn') 
            {
               $hospital_service = Hospital::select('b_hospital_subname as hospital_subname')->distinct()->orderBy('b_hospital_subname', 'ASC')->where('b_hospital_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $hospital_service = Hospital::select('hospital_subname as hospital_subname')->distinct()->orderBy('hospital_subname', 'ASC')->where('hospital_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
        }else{
            if(Session('language')=='bn') 
            {
               $hospital_service = Hospital::select('b_hospital_subname as hospital_subname')->distinct()->orderBy('b_hospital_subname', 'ASC')->where('b_hospital_subname', '!=', NULL)->get();
            }
            else
            {
               $hospital_service = Hospital::select('hospital_subname as hospital_subname')->distinct()->orderBy('hospital_subname', 'ASC')->where('hospital_subname', '!=', NULL)->get();
            }
        }

        return $hospital_service;
    }

}
