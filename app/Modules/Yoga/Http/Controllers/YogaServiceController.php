<?php

namespace App\Modules\Yoga\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Yoga;
use App\Models\Service;
use App\Models\SubService;
use App\Models\YogaService;
use DB;


class YogaServiceController extends Controller
{
    public function getYogaServiceAdd($id)
    {
    	$yoga_id = $id;
    	return view('yoga::yoga_service_add', compact('yoga_id'));
    }


    public function postYogaServiceAdd(Request $request, $id)
    {
    	$data = $request->all();
    	$check = YogaService::
                 where('service_id',$data['service_id'])
                 ->get();
        if(count($check)>0){

            return redirect('yoga/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{  

        $this->validate($request, [
            'service_id'                      => 'required',
            'yoga_service_description'    => 'required',
            'b_yoga_service_description'  => 'required',
        ]);

        $yoga_service = new YogaService;

        $yoga_service->service_id 					  	= $data['service_id'];
        $yoga_service->yoga_service_description 	= $data['yoga_service_description'];
        $yoga_service->b_yoga_service_description 	= $data['b_yoga_service_description'];
        $yoga_service->yoga_id 	                    = $id;

        if($yoga_service->save())
        {
        	return redirect('yoga/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('yoga/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }




    public function getYogaServiceEdit($yoga_service_id)
    {
        $yoga_service = YogaService::find($yoga_service_id);
        
        $service_name = YogaService::Join('service', 'service.id', 'yoga_service.service_id' )
                        ->where('yoga_service.id', $yoga_service_id)
                        ->select('service.service_name')
                        ->get();

        return view('yoga::yoga_service_edit', compact('yoga_service_id', 'yoga_service','service_name'));
    }

    public function postYogaServiceEdit(Request $request, $yoga_service_id)
    {
        $data = $request->all();

        $yoga_id = YogaService::find($yoga_service_id)->yoga->id;
        
        $yoga_service = YogaService::find($yoga_service_id);

        $yoga_service->yoga_service_description     = $data['yoga_service_description'];
        $yoga_service->b_yoga_service_description   = $data['b_yoga_service_description'];
        $yoga_service->yoga_id                      = $yoga_id;

        if($yoga_service->update())
        {
            return redirect('yoga/edit/service'.'/'.$yoga_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('yoga/edit/service'.'/'.$yoga_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function yogaServiceDelete($yoga_service_id)
    {
        $yoga_service = YogaService::find($yoga_service_id);

        $yoga_id = YogaService::find($yoga_service_id)->yoga->id;

        if($yoga_service->delete())
        {
            return redirect('yoga/edit/service'.'/'.$yoga_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('yoga/edit/service'.'/'.$yoga_id)
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
               $yoga_service = Yoga::select('b_yoga_subname as yoga_subname')->distinct()->orderBy('b_yoga_subname', 'ASC')->where('b_yoga_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $yoga_service = Yoga::select('yoga_subname as yoga_subname')->distinct()->orderBy('yoga_subname', 'ASC')->where('yoga_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
        }else{
            if(Session('language')=='bn') 
            {
               $yoga_service = Yoga::select('b_yoga_subname as yoga_subname')->distinct()->orderBy('b_yoga_subname', 'ASC')->where('b_yoga_subname', '!=', NULL)->get();
            }
            else
            {
               $yoga_service = Yoga::select('yoga_subname as yoga_subname')->distinct()->orderBy('yoga_subname', 'ASC')->where('yoga_subname', '!=', NULL)->get();
            }
        }

        return $yoga_service;
    }

}
