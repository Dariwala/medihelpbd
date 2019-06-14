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
use App\Models\AirAmbulancePhone;
use App\Models\AirAmbulanceEmail;
use App\Models\AirAmbulancePricing;
use App\Models\AirAmbulanceNotice;
use App\Models\AirAmbulanceService;
use DB;

class AirAmbulanceController extends Controller
{
    public function index()
    {
        $air_ambulances = AirAmbulance::join('subdistrict','subdistrict.id','air_ambulance.subdistrict_id')
                                        ->join('district','district.id','air_ambulance.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(air_ambulance.id ORDER BY subdistrict.sub_district_name) as air_ambulance_id,
                                                        group_concat(air_ambulance.air_ambulance_name ORDER BY subdistrict.sub_district_name) as air_ambulance_name,
                                                        group_concat(air_ambulance.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(air_ambulance.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_air_ambulance = [];
        
       foreach($air_ambulances as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["air_ambulance_id"]);
           $names           = explode(",", $value["air_ambulance_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_air_ambulance[$i]['sub_district_name']      = $sub_districts[$key];
               $new_air_ambulance[$i]['id']                     = $ids[$key];
               $new_air_ambulance[$i]['air_ambulance_name']     = $names[$key];
               $new_air_ambulance[$i]['created_at']             = $careated_ats[$key];
               $new_air_ambulance[$i]['updated_at']             = $updates_ats[$key];
               $new_air_ambulance[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $air_ambulances  = $new_air_ambulance;

    	return view('airambulance::air_ambulance', compact('air_ambulances'));
    }

    public function viewAirAmbulance($air_ambulance_id)
    {
        $air_ambulance = AirAmbulance::find($air_ambulance_id);
        $phones     = DB::table('air_ambulance_phone')->where('air_ambulance_id', $air_ambulance_id)->get();
        $emails     = DB::table('air_ambulance_email')->where('air_ambulance_id', $air_ambulance_id)->get();

        $prices = AirAmbulancePricing::where('air_ambulance_id', $air_ambulance_id)->get();

        $notices = AirAmbulanceNotice::where('air_ambulance_id', $air_ambulance_id)->get();

        return view('airambulance::air_ambulance_view',compact('air_ambulance','phones','emails','prices','notices'));
    }

   public function viewAddAirAmbulance()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('airambulance::air_ambulance_add', compact('districts','district_id'));
    }

    public function viewAddAirAmbulanceById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('airambulance::air_ambulance_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddAirAmbulance(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'district_id'          => 'required',
            'subdistrict_id'       => 'required',
        ]);

        $air_ambulance = new AirAmbulance;

        try {

            $air_ambulance->air_ambulance_name   = $data['air_ambulance_name'];
            $air_ambulance->b_air_ambulance_name = $data['b_air_ambulance_name'];
            $air_ambulance->district_id          = $data['district_id'];
            $air_ambulance->subdistrict_id       = $data['subdistrict_id'];

            if($air_ambulance->save())
            {
                return redirect('air-ambulance')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('air-ambulance')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditInfoAirAmbulance($id)
    {
    	
        $selected_district    = AirAmbulance::find($id)->district;
        $selected_subdistrict = AirAmbulance::find($id)->subDistrict;

        $air_ambulance_pricings = AirAmbulance::find($id)->airAmbulancePricings()->get();
        $air_ambulance_notices  = AirAmbulance::find($id)->airAmbulanceNotices()->get();

        $subdistricts           = SubDistrict::where('district_id', $selected_district->id)->get();
        
        $air_ambulance_services = AirAmbulance::find($id)->airAmbulanceServices()->get();  

        $districts = District::all();

        $air_ambulance = AirAmbulance::where('id', $id)->first();

        $air_ambulance_id = $id;
        

        try {

            if($districts)
            {
                return view('airambulance::air_ambulance_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'air_ambulance_id','air_ambulance','air_ambulance_notices','air_ambulance_pricings','air_ambulance_services'));
            }
            else
            {
                return redirect('district')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function postInfoEditAirAmbulance(Request $request , $id)
    {


        $data = $request->all();

        

        $air_ambulance = AirAmbulance::find($id);

        try {


            if($request->hasFile('air_ambulance_photo'))
            {
                $file = $request->file('air_ambulance_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/air_ambulance',$new_file_name);

                if($success)
                {
                    $air_ambulance->air_ambulance_photo = $new_file_name;
                    $air_ambulance->photo_path = 'uploads/air_ambulance/'.$new_file_name;
                }
            }

            $air_ambulance->air_ambulance_name = $data['air_ambulance_name'];
            $air_ambulance->b_air_ambulance_name = $data['b_air_ambulance_name'];
            $air_ambulance->air_ambulance_subname = $data['air_ambulance_subname'];
            $air_ambulance->b_air_ambulance_subname = $data['b_air_ambulance_subname'];
            $air_ambulance->district_id = $data['district_id'];
            $air_ambulance->subdistrict_id = $data['subdistrict_id'];

            if($air_ambulance)
            {
                if($air_ambulance->update())
                {
                     return redirect('air-ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('air-ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('air-ambulance/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditAirAmbulance(Request $request , $id)
    {

        $data = $request->all();
//        $phone = new AirAmbulancePhone;
//        $phone->air_ambulance_phone_no = $number[$i];
//        $air_ambulance->phones()->save($phone);
//
//        $email = $data['air_ambulance_email_ad'];
//        $email = array_filter($email);
//
//
//        if (!empty($number)) {
//
//            $phones = AirAmbulancePhone::where('air_ambulance_id', $id)->get();
//
//            if($phones)
//            {
//                $air_ambulance = AirAmbulance::find($id);
//                $air_ambulance->phones()->delete();
//            }
//
//            $phone_count = count($number);
//
//            $air_ambulance = AirAmbulance::find($id);
//
//            for ($i=0; $i < $phone_count; $i++) {
//
//
//            }
//        }
//
//
//        if (!empty($email)) {
//
//            $emails = AirAmbulanceEmail::where('air_ambulance_id', $id)->get();
//
//            if($emails)
//            {
//                $air_ambulance = AirAmbulance::find($id);
//                $air_ambulance->emails()->delete();
//            }
//
//            $email_count = count($email);
//
//            $air_ambulance = AirAmbulance::find($id);
//
//            for ($i=0; $i < $email_count; $i++) {
//                $emails = new AirAmbulanceEmail;
//                $emails->air_ambulance_email_ad = $email[$i];
//                $air_ambulance->emails()->save($emails);
//            }
//        }

        $air_ambulance = AirAmbulance::find($id);

        try {


            $air_ambulance->air_ambulance_address       = $data['air_ambulance_address'];
            $air_ambulance->b_air_ambulance_address     = $data['b_air_ambulance_address'];
            $air_ambulance->air_ambulance_phone         = $data['air_ambulance_phone'];
            $air_ambulance->b_air_ambulance_phone       = $data['b_air_ambulance_phone'];
            $air_ambulance->air_ambulance_email       = $data['air_ambulance_email'];
            $air_ambulance->total_air_ambulance         = $data['total_air_ambulance'];
            $air_ambulance->b_total_air_ambulance       = $data['b_total_air_ambulance'];
            $air_ambulance->air_ambulance_description   = $data['air_ambulance_description'];
            $air_ambulance->b_air_ambulance_description = $data['b_air_ambulance_description'];
            $air_ambulance->air_ambulance_web_link      = $data['air_ambulance_web_link'];
            $air_ambulance->air_ambulance_fb_link       = $data['air_ambulance_fb_link'];
            $air_ambulance->air_ambulance_latitude      = $data['air_ambulance_latitude'];
            $air_ambulance->air_ambulance_longitude     = $data['air_ambulance_longitude'];

            if($air_ambulance)
            {
                if($air_ambulance->update())
                {
                     return redirect('air-ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('air-ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('air-ambulance/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function deleteAirAmbulance($id)

    {
        
        $air_ambulance = AirAmbulance::find($id);

        try {

            if($air_ambulance)
            {
                if($air_ambulance->delete())
                {
                    return redirect('air-ambulance')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('air-ambulance')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('air-ambulance')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getAirAmbulancePhone($id)
    {

        $air_ambulance = AirAmbulance::find($id);

        $phones = $air_ambulance->phones()->select('air_ambulance_phone_no')->get();
        
        console.log($phones);

        return $phones;
    }

    public function getAirAmbulanceEmail($id)
    {

        $air_ambulance = AirAmbulance::find($id);

        $emails = $air_ambulance->emails()->select('air_ambulance_email_ad')->get();

        return $emails;
    }
}
