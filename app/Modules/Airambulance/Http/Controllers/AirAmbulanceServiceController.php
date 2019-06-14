<?php

namespace App\Modules\Airambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\BloodBankService;
use App\Models\AirAmbulanceService;
use DB;

class AirAmbulanceServiceController extends Controller
{
    public function getAirAmbulanceServiceAdd($id)
    {
        $air_ambulance_id = $id;
        return view('airambulance::air_ambulance_service_add', compact('air_ambulance_id'));
    }


    public function postAirAmbulanceServiceAdd(Request $request, $id)
    {
        $data = $request->all();

        $check = AirAmbulanceService::where('service_id',$data['service_id'])->get();
        
        if(isset($check) && count($check)>0){

            return redirect('air-ambulance/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');
        }    

        else{     

        $this->validate($request, [
            'service_id'                           => 'required',
            'air_ambulance_service_description'    => 'required',
            'b_air_ambulance_service_description'  => 'required',
        ]);

        $air_ambulance_service = new AirAmbulanceService;

        $air_ambulance_service->service_id                            = $data['service_id'];
        $air_ambulance_service->air_ambulance_service_description     = $data['air_ambulance_service_description'];
        $air_ambulance_service->b_air_ambulance_service_description   = $data['b_air_ambulance_service_description'];
        $air_ambulance_service->air_ambulance_id  = $id;

        if($air_ambulance_service->save())
        {
            return redirect('air-ambulance/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('air-ambulance/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getAirAmbulanceServiceEdit($air_ambulance_service_id)
    {
        $air_ambulance_service  = AirAmbulanceService::find($air_ambulance_service_id);
        $services               = Service::all(); 
        $service_by_id          = AirAmbulanceService::Join('service', 'service.id', 'air_ambulance_service.service_id' )
                                                        ->where('air_ambulance_service.id', $air_ambulance_service_id)
                                                        ->select('service.service_name','service.id')
                                                        ->first();

        return view('airambulance::air_ambulance_service_edit', compact('air_ambulance_service_id', 'air_ambulance_service', 'services', 'service_by_id'));
    }

    public function postAirAmbulanceServiceEdit(Request $request, $air_ambulance_service_id)
    {
        $data = $request->all();

        $air_ambulance_id       = AirAmbulanceService::find($air_ambulance_service_id)->airAmbulance->id;
        
        $air_ambulance_service  = AirAmbulanceService::find($air_ambulance_service_id);


        $air_ambulance_service->air_ambulance_service_description     = $data['air_ambulance_service_description'];
        $air_ambulance_service->b_air_ambulance_service_description   = $data['b_air_ambulance_service_description'];
        $air_ambulance_service->air_ambulance_id                      = $air_ambulance_id;

        if($air_ambulance_service->update())
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('air-ambulance/edit/service/edit'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function airAmbulanceServiceDelete($air_ambulance_service_id)
    { 
        $air_ambulance_service  = AirAmbulanceService::find($air_ambulance_service_id);

        $air_ambulance_id       = AirAmbulanceService::find($air_ambulance_service_id)->airAmbulance->id;

        if($air_ambulance_service->delete())
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getAirAmbulanceService($air_ambulance_id, $service_id)
    {

         $services = DB::table('air_ambulance_service')
                    ->where('air_ambulance_id', $air_ambulance_id)
                    ->where('service_id', $service_id)
                    ->get();
       
        return $services;
    }

}
