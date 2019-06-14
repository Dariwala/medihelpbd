<?php

namespace App\Modules\Ambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ambulance;
use App\Models\AmbulancePricing;
use DB;

class AmbulancePriceController extends Controller
{
    public function getAmbulancePricingAdd($ambulance_id)
    {
    	return view('ambulance::ambulance_pricing_add', compact('ambulance_id'));
    }

    public function postAmbulancePricingAdd(Request $request, $ambulance_id)
    {
    	
    	$data = $request->all();

    	$ambulance_pricing = new AmbulancePricing;

    	$ambulance_pricing->package_details       = $data['package_details'];
    	$ambulance_pricing->b_package_details     = $data['b_package_details'];
    	$ambulance_pricing->ambulance_id 	  = $ambulance_id;

    	if($ambulance_pricing->save())
        {
        	return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('ambulance/edit/pricing/add'.'/'.$ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getAmbulancePricingEdit($ambulance_pricing_id)
    {
        $ambulance_pricing = AmbulancePricing::find($ambulance_pricing_id);

        return view('ambulance::ambulance_pricing_edit', compact('ambulance_pricing_id', 'ambulance_pricing'));
    }

    public function postAmbulancePricingEdit(Request $request, $ambulance_pricing_id)
    {
        $data = $request->all();

        $ambulance_id = AmbulancePricing::find($ambulance_pricing_id)->Ambulance->id;
        
        $ambulance_pricing = AmbulancePricing::find($ambulance_pricing_id);

        
        $ambulance_pricing->package_name           	= $data['package_name'];
        $ambulance_pricing->b_package_name         	= $data['b_package_name'];
        $ambulance_pricing->package_details     	= $data['package_details'];
        $ambulance_pricing->b_package_details   	= $data['b_package_details'];
        $ambulance_pricing->ambulance_id            = $ambulance_id;

        if($ambulance_pricing->update())
        {
            return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('ambulance/edit/pricing/edit'.'/'.$ambulance_pricing_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function AmbulancePricingDelete($ambulance_pricing_id)
    {
        $ambulance_pricing = AmbulancePricing::find($ambulance_pricing_id);

        $ambulance_id = AmbulancePricing::find($ambulance_pricing_id)->Ambulance->id;

        if($ambulance_pricing->delete())
        {
            return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('ambulance/edit/info'.'/'.$ambulance_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
