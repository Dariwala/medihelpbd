<?php

namespace App\Modules\Foreignmedical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\ForeignmedicalService;
use DB;

class ForeignmedicalServiceController extends Controller
{
    public function getForeignmedicalServiceAdd($id)
    {   
        $services    = Service::all();
        $foreignmedical_id = $id;
        return view('foreignmedical::foreignmedical_service_add', compact('services', 'foreignmedical_id'));
    }


    public function postForeignmedicalServiceAdd(Request $request, $id)
    {
        
        $data = $request->all();

        $check = ForeignmedicalService::where('service_id', $data['service_id'])->get();
        
        if(count($check)>0){

            return redirect('foreignmedical/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'foreignmedical_service_description'    => 'required',
            'b_foreignmedical_service_description'  => 'required',
        ]);

        $foreignmedical_service = new ForeignmedicalService;

        $foreignmedical_service->service_id                       = $data['service_id'];
        $foreignmedical_service->foreignmedical_service_description     = $data['foreignmedical_service_description'];
        $foreignmedical_service->b_foreignmedical_service_description   = $data['b_foreignmedical_service_description'];
        $foreignmedical_service->foreignmedical_id  = $id;

        if($foreignmedical_service->save())
        {
            return redirect('foreignmedical/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getForeignmedicalServiceEdit($foreignmedical_service_id)
    {
        $foreignmedical_service   = ForeignmedicalService::find($foreignmedical_service_id);
        
        $service_name       = ForeignmedicalService::Join('service', 'service.id', 'foreignmedical_service.service_id' )
                                                ->where('foreignmedical_service.id', $foreignmedical_service_id)
                                                ->select('service.service_name')
                                                ->first();
        
        $foreignmedical_service_id = $foreignmedical_service_id;
        
        return view('foreignmedical::foreignmedical_service_edit', compact('foreignmedical_service_id', 'foreignmedical_service','service_name'));
    }

    public function postForeignmedicalServiceEdit(Request $request, $foreignmedical_service_id)
    {
        $data = $request->all();

        $foreignmedical_id = ForeignmedicalService::find($foreignmedical_service_id)->foreignmedical->id;
        
        $foreignmedical_service = ForeignmedicalService::find($foreignmedical_service_id);


        $foreignmedical_service->foreignmedical_service_description     = $data['foreignmedical_service_description'];
        $foreignmedical_service->b_foreignmedical_service_description   = $data['b_foreignmedical_service_description'];
        $foreignmedical_service->foreignmedical_id                      = $foreignmedical_id;

        if($foreignmedical_service->update())
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/service/edit'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function ForeignmedicalServiceDelete($foreignmedical_service_id)
    {
        $foreignmedical_service   = ForeignmedicalService::find($foreignmedical_service_id);

        $foreignmedical_id        = ForeignmedicalService::find($foreignmedical_service_id)->foreignmedical->id;

        if($foreignmedical_service->delete())
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getForeignmedicalService($foreignmedical_id, $service_id){
        $services = DB::table('foreignmedical_service')
                        ->where('foreignmedical_id', $foreignmedical_id)
                        ->where('service_id', $service_id)
                        ->get();

        return $services;
    }
    

}
