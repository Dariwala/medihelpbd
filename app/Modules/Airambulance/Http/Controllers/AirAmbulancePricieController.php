<?php

namespace App\Modules\Airambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AirAmbulance;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\AirAmbulancePricing;
use DB;

class AirAmbulancePricieController extends Controller
{
    public function getAirAmbulancePricingAdd($air_ambulance_id)
    {
    	return view('airambulance::air_ambulance_pricing_add', compact('air_ambulance_id'));
    }

    public function postAirAmbulancePricingAdd(Request $request, $air_ambulance_id)
    {
    	
    	$data = $request->all();

    	$air_ambulance_pricing = new AirAmbulancePricing;

    	$air_ambulance_pricing->package_details       = $data['package_details'];
    	$air_ambulance_pricing->b_package_details     = $data['b_package_details'];
    	$air_ambulance_pricing->air_ambulance_id 	  = $air_ambulance_id;

    	if($air_ambulance_pricing->save())
        {
        	return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('air-ambulance/edit/pricing/add'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getAirAmbulancePricingEdit($air_ambulance_pricing_id)
    {
        $air_ambulance_pricing = AirAmbulancePricing::find($air_ambulance_pricing_id);

        return view('airambulance::air_ambulance_pricing_edit', compact('air_ambulance_pricing_id', 'air_ambulance_pricing'));
    }

    public function postAirAmbulancePricingEdit(Request $request, $air_ambulance_pricing_id)
    {
        $data = $request->all();

        $air_ambulance_id = AirAmbulancePricing::find($air_ambulance_pricing_id)->airAmbulance->id;
        
        $air_ambulance_pricing = AirAmbulancePricing::find($air_ambulance_pricing_id);


        $air_ambulance_pricing->package_details     	= $data['package_details'];
        $air_ambulance_pricing->b_package_details   	= $data['b_package_details'];
        $air_ambulance_pricing->air_ambulance_id        = $air_ambulance_id;

        if($air_ambulance_pricing->update())
        {
            return redirect('air-ambulance/edit/info'.'/'.$air_ambulance_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('air-ambulance/edit/pricing/edit'.'/'.$air_ambulance_pricing_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function AirAmbulancePricingDelete($air_ambulance_pricing_id)
    {
        $air_ambulance_pricing = AirAmbulancePricing::find($air_ambulance_pricing_id);

        $air_ambulance_id = AirAmbulancePricing::find($air_ambulance_pricing_id)->airAmbulance->id;

        if($air_ambulance_pricing->delete())
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
}
