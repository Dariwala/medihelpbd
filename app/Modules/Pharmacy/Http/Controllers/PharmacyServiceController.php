<?php

namespace App\Modules\Pharmacy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\PharmacyService;
use DB;

class PharmacyServiceController extends Controller
{
    public function getPharmacyServiceAdd($id)
    {   
        $services    = Service::all();
        $pharmacy_id = $id;
        return view('pharmacy::pharmacy_service_add', compact('services', 'pharmacy_id'));
    }


    public function postPharmacyServiceAdd(Request $request, $id)
    {
        
        $data = $request->all();

        $check = PharmacyService::where('service_id', $data['service_id'])->get();
        
        if(count($check)>0){

            return redirect('pharmacy/edit/service/add'.'/'.$id)
                ->with('flash_message', 'This service is already added!!!')
                ->with('flash_notification', 'danger');

        }    

        else{     

        $this->validate($request, [
            'service_id'                      => 'required',
            'pharmacy_service_description'    => 'required',
            'b_pharmacy_service_description'  => 'required',
        ]);

        $pharmacy_service = new PharmacyService;

        $pharmacy_service->service_id                       = $data['service_id'];
        $pharmacy_service->pharmacy_service_description     = $data['pharmacy_service_description'];
        $pharmacy_service->b_pharmacy_service_description   = $data['b_pharmacy_service_description'];
        $pharmacy_service->pharmacy_id  = $id;

        if($pharmacy_service->save())
        {
            return redirect('pharmacy/edit/info'.'/'.$id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/service/add'.'/'.$id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
        }
    }


    public function getPharmacyServiceEdit($pharmacy_service_id)
    {
        $pharmacy_service   = PharmacyService::find($pharmacy_service_id);
        
        $service_name       = PharmacyService::Join('service', 'service.id', 'pharmacy_service.service_id' )
                                                ->where('pharmacy_service.id', $pharmacy_service_id)
                                                ->select('service.service_name')
                                                ->first();
        
        $pharmacy_service_id = $pharmacy_service_id;
        
        return view('pharmacy::pharmacy_service_edit', compact('pharmacy_service_id', 'pharmacy_service','service_name'));
    }

    public function postPharmacyServiceEdit(Request $request, $pharmacy_service_id)
    {
        $data = $request->all();

        $pharmacy_id = PharmacyService::find($pharmacy_service_id)->pharmacy->id;
        
        $pharmacy_service = PharmacyService::find($pharmacy_service_id);


        $pharmacy_service->pharmacy_service_description     = $data['pharmacy_service_description'];
        $pharmacy_service->b_pharmacy_service_description   = $data['b_pharmacy_service_description'];
        $pharmacy_service->pharmacy_id                      = $pharmacy_id;

        if($pharmacy_service->update())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/service/edit'.'/'.$pharmacy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function PharmacyServiceDelete($pharmacy_service_id)
    {
        $pharmacy_service   = PharmacyService::find($pharmacy_service_id);

        $pharmacy_id        = PharmacyService::find($pharmacy_service_id)->pharmacy->id;

        if($pharmacy_service->delete())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPharmacyService($pharmacy_id, $service_id){
        $services = DB::table('pharmacy_service')
                        ->where('pharmacy_id', $pharmacy_id)
                        ->where('service_id', $service_id)
                        ->get();
        return $services;
    }
    

}
