<?php

namespace App\Modules\Blooddonar\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodDonor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\BloodDonorPhone;
use App\Models\BloodDonorEmail;
use App\Models\BloodDonorPricing;
use DB;

class BloodDonorPricingController extends Controller
{
    //
    public function getBloodDonorPricingAdd($blood_donor_id)
    {
    	return view('blooddonar::blood_donor_pricing_add', compact('blood_donor_id'));
    }

    public function postBloodDonorPricingAdd(Request $request, $blood_donor_id)
    {
    	
    	$data = $request->all();

    	$blood_donor_pricing = new BloodDonorPricing;

    	$blood_donor_pricing->package_details       = $data['package_details'];
    	$blood_donor_pricing->b_package_details     = $data['b_package_details'];
    	$blood_donor_pricing->blood_donor_id 	    = $blood_donor_id;

    	if($blood_donor_pricing->save())
        {
        	return redirect('blood-donar/edit/info'.'/'.$blood_donor_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('blood-donar/edit/pricing/add'.'/'.$blood_donor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getBloodDonorPricingEdit($blood_donor_pricing_id)
    {
        $blood_donor_pricing = BloodDonorPricing::find($blood_donor_pricing_id);

        return view('blooddonar::blood_donor_pricing_edit', compact('blood_donor_pricing_id', 'blood_donor_pricing'));
    }

    public function postBloodDonorPricingEdit(Request $request, $blood_donor_pricing_id)
    {

        $data = $request->all();

        
        $blood_donor_id = BloodDonorPricing::find($blood_donor_pricing_id)->bloodDonor->id;
        
        $blood_donor_pricing = BloodDonorPricing::find($blood_donor_pricing_id);

        $blood_donor_pricing->package_details     	= $data['package_details'];
        $blood_donor_pricing->b_package_details   	= $data['b_package_details'];
        $blood_donor_pricing->blood_donor_id        = $blood_donor_id;

        if($blood_donor_pricing->update())
        {
            return redirect('blood-donar/edit/info'.'/'.$blood_donor_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-donar/edit/pricing/edit'.'/'.$blood_donor_pricing_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function BloodDonorPricingDelete($blood_donor_pricing_id)
    {
        $blood_donor_pricing = BloodDonorPricing::find($blood_donor_pricing_id);

        $blood_donor_id = BloodDonorPricing::find($blood_donor_pricing_id)->bloodDonor->id;

        if($blood_donor_pricing->delete())
        {
            return redirect('blood-donar/edit/info'.'/'.$blood_donor_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('blood-donar/edit/info'.'/'.$blood_donor_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }
}
