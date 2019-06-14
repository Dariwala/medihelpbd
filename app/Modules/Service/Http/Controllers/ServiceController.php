<?php

namespace App\Modules\Service\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Hospital;
use App\Models\BloodBank;
use App\Models\Service;
use App\Models\SubService;
use App\Models\HospitalService;
use App\Models\ForeignmedicalService;
use App\Models\HomeopathicService;
use App\Models\OpticalService;
use App\Models\PharmacynewService;
use App\Models\PhysiotherapyService;
use App\Models\AddictionService;
use App\Models\GymService;
use App\Models\YogaService;
use App\Models\ParlourService;
use App\Models\HerbalCenterService;
use App\Models\SkinLaserCenterService;
use App\Models\VaccinePointService;
use App\Models\BloodBankService;
use App\Models\EyeBankService;
use App\Models\PharmacyService;
use App\Models\AirAmbulanceService;
use DB;

use Exception;

class ServiceController extends Controller
{
    public function index()
    {
    	try {

    		$services = Service::orderBy('service_name','asc')->get();
    		return view('service::service', compact('services'));
    		
    	} catch (Exception $e) {
    		return $e->getMessage();
    	}
    }

    public function viewAddService()
    {
    	return view('service::service_add');
    }

    public function postAddService(Request $request)
    {
    	
    	try {

    		$data = $request->all();
    		$service = new Service;

    		$service->service_name = $data['service_name'];
    		$service->b_service_name = $data['b_service_name'];

    		if($service->save())
    		{
    			return redirect('service')
    				->with('flash_message', 'Added Successfully.')
    				->with('flash_notification', 'success');
    		}
    		else
    		{
    			return redirect('service')
    				->with('flash_message', 'Something went to wrong! service does not added!')
    				->with('flash_notification', 'danger');
    		}

    		
    	} catch (Exception $e) {
    		return $e->getMessage();
    	}
    }

    public function viewService($id)
    {
    	try {
    		
    		$service = Service::find($id);
    		if($service)
    		{
    			return view('service::service_view', compact('service'));
    		}
    		else
    		{
    			return redirect('service')
    				->with('flash_message', 'Something went to wrong! service does not found!')
    				->with('flash_notification', 'danger');
    		}

    	} catch (Exception $e) {
    		return $e->getMessage();
    	}
    }

    public function viewEditService($id)
    {
    	try {

    		$service = Service::find($id);
    		if($service)
    		{
    			return view('service::service_edit', compact('service'));
    		}
    		else
    		{
    			return redirect('service')
    				->with('flash_message', 'Invalid! Something went to wrong!')
    				->with('flash_notification', 'danger');
    		}
    		
    	} catch (Exception $e) {
    		$e->getMessage();
    	}
    }

    public function postEditService(Request $request, $id)
    {
    	try {
    		
    		$data = $request->all();
    		$service = Service::find($id);

    		if($service)
    		{
    			$service->service_name   = $data['service_name'];
	    		$service->b_service_name = $data['b_service_name'];

	    		if($service->save())
	    		{
	    			return redirect('service')
	    				->with('flash_message', 'Edited Successfully.')
	    				->with('flash_notification', 'success');
	    		}
	    		else
	    		{
	    			return redirect('service')
	    				->with('flash_message', 'Service does not Edit Successfully!')
	    				->with('flash_notification', 'danger');
	    		}
    		}
    		else
    		{
    			return redirect('service')
	    			->with('flash_message', 'Invalid! Something went to wrong!')
	    			->with('flash_notification', 'danger');
    		}

    		

    	} catch (Exception $e) {
    		$e->getMessage();
    	}
    }

    public function deleteService( $id )
    {

    	try {

    		$service = Service::find($id);

    		if($service)
    		{
    			if($service->delete())
    			{
    				return redirect('service')
	    				->with('flash_message', 'Deleted Successfully.')
	    				->with('flash_notification', 'success');
    			}
    			else
    			{
    				return redirect('service')
	    			->with('flash_message', 'Something went to wrong!')
	    			->with('flash_notification', 'danger');
    			}
    		}
    		else
    		{
    			return redirect('service')
	    			->with('flash_message', 'Invalid! Something went to wrong!')
	    			->with('flash_notification', 'danger');
    		}
    		
    	} catch (Exception $e) {
    		$e->getMessage();
    	}
    }




    //for service api
    
    public function getService()
    {
        $services = DB::table('service')->orderBy('service_name', 'asc')->select('service_name as text', 'id as value')->get();
        return $services;
    }


    public function getSelectedHospitalService($hospital_service_id)
    {

        $selected_service = HospitalService::find($hospital_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedAddictionService($addiction_service_id)
    {

        $selected_service = AddictionService::find($addiction_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedGymService($gym_service_id)
    {

        $selected_service = GymService::find($gym_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedYogaService($yoga_service_id)
    {

        $selected_service = YogaService::find($yoga_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedParlourService($parlour_service_id)
    {

        $selected_service = ParlourService::find($parlour_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedHerbalCenterService($herbal_center_service_id)
    {

        $selected_service = HerbalCenterService::find($herbal_center_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedSkinLaserCenterService($skin_laser_center_service_id)
    {

        $selected_service = SkinLaserCenterService::find($skin_laser_center_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedVaccinePointService($vaccine_point_service_id)
    {

        $selected_service = VaccinePointService::find($vaccine_point_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedBloodBankService($blood_bank_service_id)
    {

        $selected_service = BloodBankService::find($blood_bank_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function getSelectedEyeBankService($eye_bank_service_id)
    {

        $selected_service = EyeBankService::find($eye_bank_service_id)->service->id;

        $services = DB::table('service')->select('service_name as text', 'id as value')->get();

        return response()->json([
            'services' =>  $services,
            'selected_service' => $selected_service,
            ], 201);
    }

    public function viewHospitalService($hospital_id)
    {

        $service_ids = HospitalService::where('hospital_id', $hospital_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $hospitalservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $hospitalservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();  
        }
        
        
        return response()->json([
            'hospitalservice' =>  $hospitalservice,
            ], 201);
    }

    public function viewAddictionService($addiction_id)
    {

        $service_ids = AddictionService::where('addiction_id', $addiction_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $addictionservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $addictionservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();  
        }
        
        
        return response()->json([
            'addictionservice' =>  $addictionservice,
            ], 201);
    }

    public function viewGymService($gym_id)
    {

        $service_ids = GymService::where('gym_id', $gym_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $gymservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $gymservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();  
        }
        
        
        return response()->json([
            'gymservice' =>  $gymservice,
            ], 201);
    }

    public function viewYogaService($yoga_id)
    {

        $service_ids = YogaService::where('yoga_id', $yoga_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $yogaservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $yogaservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();  
        }
        
        
        return response()->json([
            'yogaservice' =>  $yogaservice,
            ], 201);
    }

    public function viewParlourService($parlour_id)
    {

        $service_ids = ParlourService::where('parlour_id', $parlour_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $parlourservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $parlourservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();  
        }
        
        
        return response()->json([
            'parlourservice' =>  $parlourservice,
            ], 201);
    }

    public function viewHerbalCenterService($herbal_center_id)
    {

        $service_ids = HerbalCenterService::where('herbal_center_id', $herbal_center_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $herbalcenterservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $herbalcenterservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'herbalcenterservice' =>  $herbalcenterservice,
            ], 201);
    }
    public function viewSkinLaserCenterService($skin_laser_center_id)
    {

        $service_ids = SkinLaserCenterService::where('skin_laser_center_id', $skin_laser_center_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $skinlasercenterservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $skinlasercenterservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get(); 
        }
        
        
        return response()->json([
            'skinlasercenterservice' =>  $skinlasercenterservice,
            ], 201);
    }
    
    public function viewVaccinePointService($vaccine_point_id)
    {

        $service_ids = VaccinePointService::where('vaccine_point_id', $vaccine_point_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $vaccinepointservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $vaccinepointservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'vaccinepointservice' => $vaccinepointservice,
            ], 201);
    }

    public function viewEyeBankService($eye_bank_id)
    {

        $service_ids = EyeBankService::where('eye_bank_id', $eye_bank_id)->select('service_id')->get();

        if(Session('language')=='bn')
        {
            $eyebankservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }

        else
        {
           $eyebankservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get(); 
        }
        
        
        return response()->json([
            'eyebankservice' =>  $eyebankservice,
            ], 201);
    }

    public function viewBloodBankService($blood_bank_id)
    {

        $service_ids = BloodBankService::where('blood_bank_id', $blood_bank_id)->select('service_id')->get();
       
        if(Session('language')=='bn')
        {
            $bloodbankservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $bloodbankservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'bloodbankservice' =>  $bloodbankservice,
            ], 201);
    }

    public function viewPharmacyService($pharmacy_id)
    {
        
        $service_ids = PharmacyService::where('pharmacy_id', $pharmacy_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $pharmacyservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacyservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'pharmacyservice' =>  $pharmacyservice,
            ], 201);
    }



    public function viewForeignmedicalService($foreignmedical_id)
    {
        
        $service_ids = ForeignmedicalService::where('foreignmedical_id', $foreignmedical_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $foreignmedicalservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $foreignmedicalservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'foreignmedicalservice' =>  $foreignmedicalservice,
            ], 201);
    }

    public function viewHomeopathicService($homeopathic_id)
    {
        
        $service_ids = HomeopathicService::where('homeopathic_id', $homeopathic_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $homeopathicservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $homeopathicservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'homeopathicservice' =>  $homeopathicservice,
            ], 201);
    }

    public function viewOpticalService($optical_id)
    {
        
        $service_ids = OpticalService::where('optical_id', $optical_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $opticalservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $opticalservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'opticalservice' =>  $opticalservice,
            ], 201);
    }

    public function viewPharmacynewService($pharmacynew_id)
    {
        
        $service_ids = PharmacynewService::where('pharmacynew_id', $pharmacynew_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $pharmacynewservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacynewservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'pharmacynewservice' =>  $pharmacynewservice,
            ], 201);
    }

    public function viewPhysiotherapyService($physiotherapy_id)
    {
        
        $service_ids = PhysiotherapyService::where('physiotherapy_id', $physiotherapy_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $physiotherapyservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $physiotherapyservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'physiotherapyservice' =>  $physiotherapyservice,
            ], 201);
    }

    public function viewAirAmbulanceService($air_ambulance_id)
    {
        
        $service_ids = AirAmbulanceService::where('air_ambulance_id', $air_ambulance_id)->select('service_id')->get();
        
        if(Session('language')=='bn')
        {
            $airambulanceservice = Service::whereIn('id', $service_ids)->select('b_service_name as text', 'id as value')->get();
        }
        else
        {
            $airambulanceservice = Service::whereIn('id', $service_ids)->select('service_name as text', 'id as value')->get();

        }
        
        return response()->json([
            'airambulanceservice' =>  $airambulanceservice,
            ], 201);
    }


}
