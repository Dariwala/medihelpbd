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
use App\Models\HerbalCenterService;
use App\Models\SkinLaserCenterService;
use App\Models\VaccinePointService;
use App\Models\BloodBankService;
use App\Models\PharmacyService;
use App\Models\EyeBankService;
use App\Models\AirAmbulanceService;
use DB;

use Exception;

class SubServiceController extends Controller
{
    public function index()
    {
        $sub_services = SubService::all();
    	return view('service::sub_service', compact('sub_services'));
    }

    public function viewAddSubService()
    {
        $services = Service::all();
    	return view('service::sub_service_add', compact('services'));
    }

    public function postAddSubService(Request $request)
    {
    	$data = $request->all();


        $this->validate($request, [
            'sub_service_name'   => 'required',
            'b_sub_service_name' => 'required',
            'service_id'         => 'required',
        ]);

        $sub_service = new SubService;

        try {

            $sub_service->sub_service_name   = $data['sub_service_name'];
            $sub_service->b_sub_service_name = $data['b_sub_service_name'];
            $sub_service->service_id         = $data['service_id'];

            if($sub_service->save())
            {
                return redirect('service/sub-service')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('service/sub-service')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }

        
    }

    public function viewSubService($id)
    {

        try {

            $service = SubService::find($id)->service;

            $sub_service = SubService::find($id);

            if($sub_service && $service)
            {
                return view('service::sub_service_view', compact('service','sub_service'));
            }
            else
            {
                return redirect('service/sub-service')
                    ->with('flash_message', 'Invalid!!! No Data found!!!')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        
    }


    

    public function viewEditSubService($id)
    {

        try {

            $selected_service = SubService::find($id)->service->id;
            $services = service::all();
            $sub_service = SubService::find($id);


            if($sub_service)
            {

                return view('service::sub_service_edit', compact('selected_service', 'sub_service', 'services'));
            }
            else
            {
                return redirect('service')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function postEditSubService(Request $request, $id)
    {
        try {

            $data = $request->all();
            $sub_service = SubService::find($id);

            $sub_service->sub_service_name   = $data['sub_service_name'];
            $sub_service->b_sub_service_name = $data['b_sub_service_name'];
            $sub_service->service_id         = $data['service_id'];

            if($sub_service)
            {
                if($sub_service->update())
                {
                     return redirect('service/sub-service')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('service/sub-service')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('service/sub-service')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }




    public function deleteSubService($id)
    {

        try {

            $sub_service = SubService::find($id);

            if($sub_service)
            {
                if($sub_service->delete())
                {
                    return redirect('service/sub-service')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('service/sub-service')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('service/sub-service')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            $e.getMessage();
        }
        
    }




    // for api

    public function getSubService($id)
    {
        $subservices = DB::table('subservice')->orderBy('sub_service_name', 'asc')->where('service_id', $id)->select('sub_service_name as text', 'id as value')->get();
        return $subservices;
    }

    public function getSelectedHospitalSubService($hospital_service_id)
    {

        $selected_subservice = HospitalService::find($hospital_service_id)->subService->id;
        $selected_service    = HospitalService::find($hospital_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function getSelectedAddictionSubService($addiction_service_id)
    {

        $selected_subservice = AddictionService::find($addiction_service_id)->subService->id;
        $selected_service    = AddictionService::find($addiction_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function getSelectedSkinLaserCenterSubService($skin_laser_center_service_id)
    {

        $selected_subservice = SkinLaserCenterService::find($skin_laser_center_service_id)->subService->id;
        $selected_service    = SkinLaserCenterService::find($skin_laser_center_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function getSelectedVaccinePointSubService($vaccine_point_service_id)
    {

        $selected_subservice = VaccinePointService::find($vaccine_point_service_id)->subService->id;
        $selected_service    = VaccinePointService::find($vaccine_point_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function getSelectedHerbalCenterSubService($herbal_center_service_id)
    {

        $selected_subservice = HerbalCenterService::find($herbal_center_service_id)->subService->id;
        $selected_service    = HerbalCenterService::find($herbal_center_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function getSelectedBloodBankSubService($blood_bank_service_id)
    {

        $selected_subservice = BloodBankService::find($blood_bank_service_id)->subService->id;
        $selected_service    = BloodBankService::find($blood_bank_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function getSelectedEyeBankSubService($eye_bank_service_id)
    {

        $selected_subservice = EyeBankService::find($eye_bank_service_id)->subService->id;
        $selected_service    = EyeBankService::find($eye_bank_service_id)->service->id;

        $subservices = DB::table('subservice')->where('service_id', $selected_service)->select('sub_service_name as text', 'id as value')->get();

        return response()->json([
            'subservices' =>  $subservices,
            'selected_subservice' => $selected_subservice,
            ], 201);
    }

    public function viewHospitalSubService($service_id,$hospital_id)
    {

        $subservice_ids = HospitalService::where('hospital_id', $hospital_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
            $hospitalsubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get();
        }
        else
        {
            $hospitalsubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'hospitalsubservice' =>  $hospitalsubservice,
            ], 201);
    }

     public function viewHerbalCenterSubService($service_id,$herbal_center_id)
    {

        $subservice_ids = HerbalCenterService::where('herbal_center_id', $herbal_center_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
            $herbalcentersubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get();
        }

        else
        {
           $herbalcentersubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get(); 
        }
        
        
        return response()->json([
            'herbalcentersubservice' =>  $herbalcentersubservice,
            ], 201);
    }
     public function viewSkinLaserCenterSubService($service_id,$skin_laser_center_id)
    {

        $subservice_ids = SkinLaserCenterService::where('skin_laser_center_id', $skin_laser_center_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
            $skinlasercentersubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get();
        }

        else
        {
            $skinlasercentersubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'skinlasercentersubservice' =>  $skinlasercentersubservice,
            ], 201);
    }
     public function viewVaccinePointSubService($service_id,$vaccine_point_id)
    {

        $subservice_ids = VaccinePointService::where('vaccine_point_id', $vaccine_point_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
            $vaccinepointsubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get();
        }

        else
        {
           $vaccinepointsubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get(); 
        }
        
        
        return response()->json([
            'vaccinepointsubservice' =>  $vaccinepointsubservice,
            ], 201);
    }

    public function viewBloodBankSubService($service_id,$blood_bank_id)
    {

        $subservice_ids = BloodBankService::where('blood_bank_id', $blood_bank_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $bloodbanksubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $bloodbanksubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'bloodbanksubservice' =>  $bloodbanksubservice,
            ], 201);
    }

    public function viewPharmacySubService($service_id, $pharmacy_id)
    {

        $subservice_ids = PharmacyService::where('pharmacy_id', $pharmacy_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $pharmacysubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $pharmacysubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'pharmacysubservice' =>  $pharmacysubservice,
            ], 201);
    }

    public function viewAirAmbulanceSubService($service_id, $air_ambulance_id)
    {

        $subservice_ids = AirAmbulanceService::where('air_ambulance_id', $air_ambulance_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $airambulancesubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $airambulancesubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'airambulancesubservice' =>  $airambulancesubservice,
            ], 201);
    }

    public function viewEyeBankSubService($service_id,$eye_bank_id)
    {

        $subservice_ids = EyeBankService::where('eye_bank_id', $eye_bank_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
            $eyebanksubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get();
        }

        else
        {
            $eyebanksubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'eyebanksubservice' =>  $eyebanksubservice,
            ], 201);
    }



    public function viewForeignmedicalSubService($service_id, $foreignmedical_id)
    {

        $subservice_ids = ForeignmedicalService::where('foreignmedical_id', $foreignmedical_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $foreignmedicalsubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $foreignmedicalsubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'foreignmedicalsubservice' =>  $foreignmedicalsubservice,
            ], 201);
    }

    public function viewHomeopathicSubService($service_id, $homeopathic_id)
    {

        $subservice_ids = HomeopathicService::where('homeopathic_id', $homeopathic_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $homeopathicsubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $homeopathicsubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'homeopathicsubservice' =>  $homeopathicsubservice,
            ], 201);
    }

    public function viewOpticalSubService($service_id, $optical_id)
    {

        $subservice_ids = OpticalService::where('optical_id', $optical_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $opticalsubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $opticalsubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'opticalsubservice' =>  $opticalsubservice,
            ], 201);
    }

    public function viewPharmacynewSubService($service_id, $pharmacynew_id)
    {

        $subservice_ids = PharmacynewService::where('pharmacynew_id', $pharmacynew_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $pharmacynewsubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $pharmacynewsubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'pharmacynewsubservice' =>  $pharmacynewsubservice,
            ], 201);
    }

    public function viewPhysiotherapySubService($service_id, $physiotherapy_id)
    {

        $subservice_ids = PhysiotherapyService::where('physiotherapy_id', $physiotherapy_id)->where('service_id', $service_id)->select('subservice_id')->get();

        if(Session('language')=='bn')
        {
           $physiotherapysubservice = SubService::whereIn('id', $subservice_ids)->select('b_sub_service_name as text', 'id as value')->get(); 
        }
        else
        {
            $physiotherapysubservice = SubService::whereIn('id', $subservice_ids)->select('sub_service_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'physiotherapysubservice' =>  $physiotherapysubservice,
            ], 201);
    }

    

}
