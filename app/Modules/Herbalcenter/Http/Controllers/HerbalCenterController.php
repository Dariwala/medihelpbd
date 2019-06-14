<?php

namespace App\Modules\Herbalcenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HerbalCenter;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\MedicalSpecialist;
use App\Models\HerbalCenterPhone;
use App\Models\HerbalCenterEmail;
use App\Models\HerbalCenterService;
use App\Models\HerbalCenterDoctor;
use App\Models\HerbalCenterNotice;
use App\Models\HerbalCenterProduct;
use DB;

class HerbalCenterController extends Controller
{
    public function index()
    {
    	                    
        $herbal_centers = HerbalCenter::join('subdistrict','subdistrict.id','herbal_center.subdistrict_id')
                                        ->join('district','district.id','herbal_center.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(herbal_center.id ORDER BY subdistrict.sub_district_name) as herbal_center_id,
                                                        group_concat(herbal_center.herbal_center_name ORDER BY subdistrict.sub_district_name) as herbal_center_name,
                                                        group_concat(herbal_center.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(herbal_center.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_herbal_center = [];
        
       foreach($herbal_centers as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["herbal_center_id"]);
           $names           = explode(",", $value["herbal_center_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_herbal_center[$i]['sub_district_name']      = $sub_districts[$key];
               $new_herbal_center[$i]['id']                     = $ids[$key];
               $new_herbal_center[$i]['herbal_center_name']     = $names[$key];
               $new_herbal_center[$i]['created_at']             = $careated_ats[$key];
               $new_herbal_center[$i]['updated_at']             = $updates_ats[$key];
               $new_herbal_center[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $herbal_centers  = $new_herbal_center;

    	return view('herbalcenter::herbal_center', compact('herbal_centers'));
    }

    public function viewHerbalCenter($herbal_center_id)
    {
        $herbal_center = HerbalCenter::find($herbal_center_id);
        $phones = DB::table('herbal_center_phone')->where('herbal_center_id', $herbal_center_id)->get();
        $emails = DB::table('herbal_center_email')->where('herbal_center_id', $herbal_center_id)->get();
        $services = HerbalCenterService::with('service','SubService')->where('herbal_center_id', $herbal_center_id)->get();
        $doctors = HerbalCenterDoctor::with('medicalSpecialist','department')->where('herbal_center_id', $herbal_center_id)->get();
        $notices = HerbalCenterNotice::where('herbal_center_id', $herbal_center_id)->get();
        $products = HerbalCenterProduct::where('herbal_center_id', $herbal_center_id)->get();

        return view('herbalcenter::herbal_center_view',compact('herbal_center_id','herbal_center','phones','emails','services','doctors','notices','products'));
    }

   public function viewAddHerbalCenter()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('herbalcenter::herbal_center_add', compact('districts','district_id'));
    }

    public function viewAddHerbalCenterById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('herbalcenter::herbal_center_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddHerbalCenter(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'herbal_center_name'   => 'required',
            'b_herbal_center_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $herbal_center = new HerbalCenter;

        try {

            $herbal_center->herbal_center_name   = $data['herbal_center_name'];
            $herbal_center->b_herbal_center_name = $data['b_herbal_center_name'];
            $herbal_center->district_id          = $data['district_id'];
            $herbal_center->subdistrict_id       = $data['subdistrict_id'];

            if($herbal_center->save())
            {
                return redirect('herbal-center')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('herbal-center')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewDistrict($id)
    {
        $district = District::find($id);

        try {

            if($district)
            {
                return view('district::district_view', compact('district'));
            }
            else
            {
                return redirect('district')
                    ->with('flash_message', 'Invalid!!! No Data found!!!')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
        
    }


    

    public function viewEditHerbalCenter($id)
    {
        $selected_district      = HerbalCenter::find($id)->district;
        $selected_subdistrict   = HerbalCenter::find($id)->subDistrict;

        $herbal_center_products = HerbalCenter::find($id)->herbalCenterProducts()->get();
        $herbal_center_services = HerbalCenter::find($id)->HerbalCenterServices()->get();
        $herbal_center_notices  = HerbalCenter::find($id)->HerbalCenterNotices()->get();
        $herbal_center_doctors  = HerbalCenter::find($id)->HerbalCenterDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $herbal_center = HerbalCenter::where('id', $id)->first();

        $herbal_center_id = $id;
        

        try {

            if($districts)
            {
                return view('herbalcenter::herbal_center_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'herbal_center_id','herbal_center', 'herbal_center_services', 'herbal_center_notices','herbal_center_doctors','herbal_center_products'));
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

    public function postInfoEditHerbalCenter(Request $request, $id)
    {
        $data = $request->all();

        $herbal_center = HerbalCenter::find($id);

        try {


            if($request->hasFile('herbal_center_photo'))
            {
                $file = $request->file('herbal_center_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/herbal_center',$new_file_name);

                if($success)
                {
                    $herbal_center->herbal_center_photo = $new_file_name;
                    $herbal_center->photo_path = 'uploads/herbal_center/'.$new_file_name;
                }
            }

            $herbal_center->herbal_center_name = $data['herbal_center_name'];
            $herbal_center->b_herbal_center_name = $data['b_herbal_center_name'];
            $herbal_center->herbal_center_subname = $data['herbal_center_subname'];
            $herbal_center->b_herbal_center_subname = $data['b_herbal_center_subname'];
            $herbal_center->district_id = $data['district_id'];
            $herbal_center->subdistrict_id = $data['subdistrict_id'];

            if($herbal_center)
            {
                if($herbal_center->update())
                {
                     return redirect('herbal-center/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('herbal-center/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('herbal-center/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditHerbalCenter(Request $request, $id)
    {
        $data = $request->all();

        $herbal_center = HerbalCenter::find($id);

        try {

            $herbal_center->herbal_center_description    = $data['herbal_center_description'];
            $herbal_center->b_herbal_center_description  = $data['b_herbal_center_description'];
            $herbal_center->herbal_center_phone_no       = $data['herbal_center_phone_no'];
            $herbal_center->b_herbal_center_phone_no     = $data['b_herbal_center_phone_no'];
            $herbal_center->herbal_center_email_ad       = $data['herbal_center_email_ad'];
            $herbal_center->herbal_center_web_link       = $data['herbal_center_web_link'];
            $herbal_center->herbal_center_total_bed      = $data['herbal_center_total_bed'];
            $herbal_center->b_herbal_center_total_bed    = $data['b_herbal_center_total_bed'];
            $herbal_center->herbal_center_total_doctor   = $data['herbal_center_total_doctor'];
            $herbal_center->b_herbal_center_total_doctor = $data['b_herbal_center_total_doctor'];
            $herbal_center->herbal_center_total_staff    = $data['herbal_center_total_staff'];
            $herbal_center->b_herbal_center_total_staff  = $data['b_herbal_center_total_staff'];
            $herbal_center->herbal_center_address        = $data['herbal_center_address'];
            $herbal_center->b_herbal_center_address      = $data['b_herbal_center_address'];
            $herbal_center->herbal_center_latitude       = $data['herbal_center_latitude'];
            $herbal_center->herbal_center_longitude      = $data['herbal_center_longitude'];

            if($herbal_center->update())
            {
                return redirect('herbal-center/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('herbal-center/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceHerbalCenter(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->herbal_center_description    = $data['herbal_center_description'];
            $service->b_herbal_center_description  = $data['b_herbal_center_description'];
            $service->herbal_center_fb_link        = $data['herbal_center_fb_link'];
            $service->herbal_center_web_link       = $data['herbal_center_web_link'];
            $service->herbal_center_total_bed      = $data['herbal_center_total_bed'];
            $service->b_herbal_center_total_bed    = $data['b_herbal_center_total_bed'];

            if($service->update())
            {
                return redirect('herbal-center/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('herbal-center/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteHerbalCenter($id)
    {
        $herbal_center = HerbalCenter::find($id);

        try {

            if($herbal_center)
            {
                if($herbal_center->delete())
                {
                    return redirect('herbal-center')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('herbal-center')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('herbal-center')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getHerbalCenterPhone($id)
    {

        $herbal_center = HerbalCenter::find($id);

        $phones = $herbal_center->phones()->select('herbal_center_phone_no')->get();

        return $phones;
    }

    public function getHerbalCenterEmail($id)
    {

        $herbal_center = HerbalCenter::find($id);

        $emails = $herbal_center->emails()->select('herbal_center_email_ad')->get();

        return $emails;
    }

    public function getHerbalCenterService($herbal_center_id, $service_id)
    {

         $services = DB::table('herbal_center_service')
            ->where('herbal_center_id', $herbal_center_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getHerbalCenterDoctor($medical_specialist_id,$herbal_center_id)
    {

        $doctor_ids = HerbalCenterDoctor::where('herbal_center_id', $herbal_center_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;

    }
}
