<?php

namespace App\Modules\Gym\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gym;
use App\Models\Service;
use App\Models\SubService;
use App\Models\GymService;
use DB;


class GymServiceController extends Controller
{
    public function getGymServiceAdd($id)
    {
    	$gym_id = $id;
    	return view('gym::gym_service_add', compact('gym_id'));
    }


    public function postGymServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = GymService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('gym/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                      => 'required',
            'gym_service_description'    => 'required',
            'b_gym_service_description'  => 'required',
        ]);

        $gym_service = new GymService;

        $gym_service->service_id 					  	= $data['service_id'];
        $gym_service->gym_service_description 	= $data['gym_service_description'];
        $gym_service->b_gym_service_description 	= $data['b_gym_service_description'];
        $gym_service->gym_id 	                    = $id;

        if($gym_service->save())
        {
        	return redirect('gym/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('gym/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getGymServiceEdit($gym_service_id)
    {
        $gym_service = GymService::find($gym_service_id);
        
        $service_name = GymService::Join('service', 'service.id', 'gym_service.service_id' )
                        ->where('gym_service.id', $gym_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('gym::gym_service_edit', compact('gym_service_id', 'gym_service','service_name'));
    }

    public function postGymServiceEdit(Request $request, $gym_service_id)
    {
        $data = $request->all();

        $gym_id = GymService::find($gym_service_id)->gym->id;
        
        $gym_service = GymService::find($gym_service_id);

        $gym_service->gym_service_description     = $data['gym_service_description'];
        $gym_service->b_gym_service_description   = $data['b_gym_service_description'];
        $gym_service->gym_id                      = $gym_id;

        if($gym_service->update())
        {
            return redirect('gym/edit/service'.'/'.$gym_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('gym/edit/service'.'/'.$gym_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function gymServiceDelete($gym_service_id)
    {
        $gym_service = GymService::find($gym_service_id);

        $gym_id = GymService::find($gym_service_id)->gym->id;

        if($gym_service->delete())
        {
            return redirect('gym/edit/service'.'/'.$gym_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('gym/edit/service'.'/'.$gym_id)
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
               $gym_service = Gym::select('b_gym_subname as gym_subname')->distinct()->orderBy('b_gym_subname', 'ASC')->where('b_gym_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $gym_service = Gym::select('gym_subname as gym_subname')->distinct()->orderBy('gym_subname', 'ASC')->where('gym_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
        }else{
            if(Session('language')=='bn') 
            {
               $gym_service = Gym::select('b_gym_subname as gym_subname')->distinct()->orderBy('b_gym_subname', 'ASC')->where('b_gym_subname', '!=', NULL)->get();
            }
            else
            {
               $gym_service = Gym::select('gym_subname as gym_subname')->distinct()->orderBy('gym_subname', 'ASC')->where('gym_subname', '!=', NULL)->get();
            }
        }

        return $gym_service;
    }

}
