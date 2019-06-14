<?php

namespace App\Modules\Parlour\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parlour;
use App\Models\Service;
use App\Models\SubService;
use App\Models\ParlourService;
use DB;


class ParlourServiceController extends Controller
{
    public function getParlourServiceAdd($id)
    {
    	$parlour_id = $id;
    	return view('parlour::parlour_service_add', compact('parlour_id'));
    }


    public function postParlourServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = ParlourService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('parlour/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                      => 'required',
            'parlour_service_description'    => 'required',
            'b_parlour_service_description'  => 'required',
        ]);

        $parlour_service = new ParlourService;

        $parlour_service->service_id 					  	= $data['service_id'];
        $parlour_service->parlour_service_description 	= $data['parlour_service_description'];
        $parlour_service->b_parlour_service_description 	= $data['b_parlour_service_description'];
        $parlour_service->parlour_id 	                    = $id;

        if($parlour_service->save())
        {
        	return redirect('parlour/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('parlour/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getParlourServiceEdit($parlour_service_id)
    {
        $parlour_service = ParlourService::find($parlour_service_id);
        
        $service_name = ParlourService::Join('service', 'service.id', 'parlour_service.service_id' )
                        ->where('parlour_service.id', $parlour_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('parlour::parlour_service_edit', compact('parlour_service_id', 'parlour_service','service_name'));
    }

    public function postParlourServiceEdit(Request $request, $parlour_service_id)
    {
        $data = $request->all();

        $parlour_id = ParlourService::find($parlour_service_id)->parlour->id;
        
        $parlour_service = ParlourService::find($parlour_service_id);

        $parlour_service->parlour_service_description     = $data['parlour_service_description'];
        $parlour_service->b_parlour_service_description   = $data['b_parlour_service_description'];
        $parlour_service->parlour_id                      = $parlour_id;

        if($parlour_service->update())
        {
            return redirect('parlour/edit/service'.'/'.$parlour_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('parlour/edit/service'.'/'.$parlour_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function parlourServiceDelete($parlour_service_id)
    {
        $parlour_service = ParlourService::find($parlour_service_id);

        $parlour_id = ParlourService::find($parlour_service_id)->parlour->id;

        if($parlour_service->delete())
        {
            return redirect('parlour/edit/service'.'/'.$parlour_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('parlour/edit/service'.'/'.$parlour_id)
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
               $parlour_service = Parlour::select('b_parlour_subname as parlour_subname')->distinct()->orderBy('b_parlour_subname', 'ASC')->where('b_parlour_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $parlour_service = Parlour::select('parlour_subname as parlour_subname')->distinct()->orderBy('parlour_subname', 'ASC')->where('parlour_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
        }else{
            if(Session('language')=='bn') 
            {
               $parlour_service = Parlour::select('b_parlour_subname as parlour_subname')->distinct()->orderBy('b_parlour_subname', 'ASC')->where('b_parlour_subname', '!=', NULL)->get();
            }
            else
            {
               $parlour_service = Parlour::select('parlour_subname as parlour_subname')->distinct()->orderBy('parlour_subname', 'ASC')->where('parlour_subname', '!=', NULL)->get();
            }
        }

        return $parlour_service;
    }

}
