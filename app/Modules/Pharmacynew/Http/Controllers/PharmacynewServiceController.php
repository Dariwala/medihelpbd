<?php

namespace App\Modules\Pharmacynew\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\PharmacynewService;
use DB;

class PharmacynewServiceController extends Controller
{
    public function getPharmacynewServiceAdd($id)
    {   
        $services    = Service::all();
        $pharmacynew_id = $id;
        return view('pharmacynew::pharmacynew_service_add', compact('services', 'pharmacynew_id'));
    }


    public function postPharmacynewServiceAdd(Request $request, $id)
    {
        
        $data = $request->all();

        $check = PharmacynewService::where('service_id', $data['service_id'])->get();
        
        if(count($check)>0){

            return redirect('pharmacynew/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'pharmacynew_service_description'    => 'required',
            'b_pharmacynew_service_description'  => 'required',
        ]);

        $pharmacynew_service = new PharmacynewService;

        $pharmacynew_service->service_id                       = $data['service_id'];
        $pharmacynew_service->pharmacynew_service_description     = $data['pharmacynew_service_description'];
        $pharmacynew_service->b_pharmacynew_service_description   = $data['b_pharmacynew_service_description'];
        $pharmacynew_service->pharmacynew_id  = $id;

        if($pharmacynew_service->save())
        {
            return redirect('pharmacynew/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getPharmacynewServiceEdit($pharmacynew_service_id)
    {
        $pharmacynew_service   = PharmacynewService::find($pharmacynew_service_id);
        
        $service_name       = PharmacynewService::Join('service', 'service.id', 'pharmacynew_service.service_id' )
                                                ->where('pharmacynew_service.id', $pharmacynew_service_id)
                                                ->select('service.service_name')
                                                ->first();
        
        $pharmacynew_service_id = $pharmacynew_service_id;
        
        return view('pharmacynew::pharmacynew_service_edit', compact('pharmacynew_service_id', 'pharmacynew_service','service_name'));
    }

    public function postPharmacynewServiceEdit(Request $request, $pharmacynew_service_id)
    {
        $data = $request->all();

        $pharmacynew_id = PharmacynewService::find($pharmacynew_service_id)->pharmacynew->id;
        
        $pharmacynew_service = PharmacynewService::find($pharmacynew_service_id);


        $pharmacynew_service->pharmacynew_service_description     = $data['pharmacynew_service_description'];
        $pharmacynew_service->b_pharmacynew_service_description   = $data['b_pharmacynew_service_description'];
        $pharmacynew_service->pharmacynew_id                      = $pharmacynew_id;

        if($pharmacynew_service->update())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/service/edit'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PharmacynewServiceDelete($pharmacynew_service_id)
    {
        $pharmacynew_service   = PharmacynewService::find($pharmacynew_service_id);

        $pharmacynew_id        = PharmacynewService::find($pharmacynew_service_id)->pharmacynew->id;

        if($pharmacynew_service->delete())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPharmacynewService($pharmacynew_id, $service_id){
        $services = DB::table('pharmacynew_service')
                        ->where('pharmacynew_id', $pharmacynew_id)
                        ->where('service_id', $service_id)
                        ->get();

        return $services;
    }
    

}
