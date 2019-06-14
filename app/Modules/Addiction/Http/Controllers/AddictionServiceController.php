<?php

namespace App\Modules\Addiction\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Addiction;
use App\Models\Service;
use App\Models\SubService;
use App\Models\AddictionService;
use DB;


class AddictionServiceController extends Controller
{
    public function getAddictionServiceAdd($id)
    {
    	$addiction_id = $id;
    	return view('addiction::addiction_service_add', compact('addiction_id'));
    }


    public function postAddictionServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = AddictionService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('addiction/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                      => 'required',
            'addiction_service_description'    => 'required',
            'b_addiction_service_description'  => 'required',
        ]);

        $addiction_service = new AddictionService;

        $addiction_service->service_id 					  	= $data['service_id'];
        $addiction_service->addiction_service_description 	= $data['addiction_service_description'];
        $addiction_service->b_addiction_service_description 	= $data['b_addiction_service_description'];
        $addiction_service->addiction_id 	                    = $id;

        if($addiction_service->save())
        {
        	return redirect('addiction/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('addiction/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getAddictionServiceEdit($addiction_service_id)
    {
        $addiction_service = AddictionService::find($addiction_service_id);
        
        $service_name = AddictionService::Join('service', 'service.id', 'addiction_service.service_id' )
                        ->where('addiction_service.id', $addiction_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('addiction::addiction_service_edit', compact('addiction_service_id', 'addiction_service','service_name'));
    }

    public function postAddictionServiceEdit(Request $request, $addiction_service_id)
    {
        $data = $request->all();

        $addiction_id = AddictionService::find($addiction_service_id)->addiction->id;
        
        $addiction_service = AddictionService::find($addiction_service_id);

        $addiction_service->addiction_service_description     = $data['addiction_service_description'];
        $addiction_service->b_addiction_service_description   = $data['b_addiction_service_description'];
        $addiction_service->addiction_id                      = $addiction_id;

        if($addiction_service->update())
        {
            return redirect('addiction/edit/service'.'/'.$addiction_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('addiction/edit/service'.'/'.$addiction_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function addictionServiceDelete($addiction_service_id)
    {
        $addiction_service = AddictionService::find($addiction_service_id);

        $addiction_id = AddictionService::find($addiction_service_id)->addiction->id;

        if($addiction_service->delete())
        {
            return redirect('addiction/edit/service'.'/'.$addiction_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('addiction/edit/service'.'/'.$addiction_id)
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
               $addiction_service = Addiction::select('b_addiction_subname as addiction_subname')->distinct()->orderBy('b_addiction_subname', 'ASC')->where('b_addiction_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $addiction_service = Addiction::select('addiction_subname as addiction_subname')->distinct()->orderBy('addiction_subname', 'ASC')->where('addiction_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
        }else{
            if(Session('language')=='bn') 
            {
               $addiction_service = Addiction::select('b_addiction_subname as addiction_subname')->distinct()->orderBy('b_addiction_subname', 'ASC')->where('b_addiction_subname', '!=', NULL)->get();
            }
            else
            {
               $addiction_service = Addiction::select('addiction_subname as addiction_subname')->distinct()->orderBy('addiction_subname', 'ASC')->where('addiction_subname', '!=', NULL)->get();
            }
        }

        return $addiction_service;
    }

}
