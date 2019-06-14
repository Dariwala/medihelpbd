<?php

namespace App\Modules\Skinlasercenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SkinLaserCenter;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\MedicalSpecialist;
use App\Models\SkinLaserCenterPhone;
use App\Models\SkinLaserCenterEmail;
use App\Models\SkinLaserCenterService;
use App\Models\SkinLaserCenterDoctor;
use App\Models\SkinLaserCenterNotice;
use DB;

class SkinLaserCenterController extends Controller
{
    public function index()
    {
    	
    	                    
    	 $skin_laser_centers = SkinLaserCenter::join('subdistrict','subdistrict.id','skin_laser_center.subdistrict_id')
                                        ->join('district','district.id','skin_laser_center.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(skin_laser_center.id ORDER BY subdistrict.sub_district_name) as skin_laser_center_id,
                                                        group_concat(skin_laser_center.skin_laser_center_name ORDER BY subdistrict.sub_district_name) as skin_laser_center_name,
                                                        group_concat(skin_laser_center.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(skin_laser_center.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_skin_laser_center = [];
        
       foreach($skin_laser_centers as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["skin_laser_center_id"]);
           $names           = explode(",", $value["skin_laser_center_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_skin_laser_center[$i]['sub_district_name']      = $sub_districts[$key];
               $new_skin_laser_center[$i]['id']                     = $ids[$key];
               $new_skin_laser_center[$i]['skin_laser_center_name']     = $names[$key];
               $new_skin_laser_center[$i]['created_at']             = $careated_ats[$key];
               $new_skin_laser_center[$i]['updated_at']             = $updates_ats[$key];
               $new_skin_laser_center[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $skin_laser_centers  = $new_skin_laser_center;                   


    	return view('skinlasercenter::skin_laser_center', compact('skin_laser_centers'));
    }

    public function viewSkinLaserCenter($skin_laser_center_id)
    {
        $skin_laser_center = SkinLaserCenter::find($skin_laser_center_id);
        $phones = DB::table('skin_laser_center_phone')->where('skin_laser_center_id', $skin_laser_center_id)->get();
        $emails = DB::table('skin_laser_center_email')->where('skin_laser_center_id', $skin_laser_center_id)->get();
        $services = SkinLaserCenterService::with('service','SubService')->where('skin_laser_center_id', $skin_laser_center_id)->get();
        $doctors = SkinLaserCenterDoctor::with('medicalSpecialist','department')->where('skin_laser_center_id', $skin_laser_center_id)->get();
        $notices = SkinLaserCenterNotice::where('skin_laser_center_id', $skin_laser_center_id)->get();

        return view('skinlasercenter::skin_laser_center_view',compact('skin_laser_center_id','skin_laser_center','phones','emails','services','doctors','notices'));
    }

   public function viewAddSkinLaserCenter()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('skinlasercenter::skin_laser_center_add', compact('districts','district_id'));
    }

    public function viewAddSkinLaserCenterById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('skinlasercenter::skin_laser_center_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddSkinLaserCenter(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'skin_laser_center_name'   => 'required',
            'b_skin_laser_center_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $skin_laser_center = new SkinLaserCenter;

        try {

            $skin_laser_center->skin_laser_center_name   = $data['skin_laser_center_name'];
            $skin_laser_center->b_skin_laser_center_name = $data['b_skin_laser_center_name'];
            $skin_laser_center->district_id          = $data['district_id'];
            $skin_laser_center->subdistrict_id       = $data['subdistrict_id'];

            if($skin_laser_center->save())
            {
                return redirect('skin-laser-center')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('skin-laser-center')
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


    

    public function viewEditSkinLaserCenter($id)
    {
        $selected_district      = SkinLaserCenter::find($id)->district;
        $selected_subdistrict   = SkinLaserCenter::find($id)->subDistrict;

        $skin_laser_center_services = SkinLaserCenter::find($id)->SkinLaserCenterServices()->get();
        $skin_laser_center_notices  = SkinLaserCenter::find($id)->SkinLaserCenterNotices()->get();
        $skin_laser_center_doctors  = SkinLaserCenter::find($id)->SkinLaserCenterDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $skin_laser_center = SkinLaserCenter::where('id', $id)->first();

        $skin_laser_center_id = $id;
        

        try {

            if($districts)
            {
                return view('skinlasercenter::skin_laser_center_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'skin_laser_center_id','skin_laser_center', 'skin_laser_center_services', 'skin_laser_center_notices','skin_laser_center_doctors'));
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

    public function postInfoEditSkinLaserCenter(Request $request, $id)
    {
        $data = $request->all();

        $skin_laser_center = SkinLaserCenter::find($id);

        try {


            if($request->hasFile('skin_laser_center_photo'))
            {
                $file = $request->file('skin_laser_center_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/skin_laser_center',$new_file_name);

                if($success)
                {
                    $skin_laser_center->skin_laser_center_photo = $new_file_name;
                    $skin_laser_center->photo_path = 'uploads/skin_laser_center/'.$new_file_name;
                }
            }

            $skin_laser_center->skin_laser_center_name = $data['skin_laser_center_name'];
            $skin_laser_center->b_skin_laser_center_name = $data['b_skin_laser_center_name'];
            $skin_laser_center->skin_laser_center_subname = $data['skin_laser_center_subname'];
            $skin_laser_center->b_skin_laser_center_subname = $data['b_skin_laser_center_subname'];
            $skin_laser_center->district_id = $data['district_id'];
            $skin_laser_center->subdistrict_id = $data['subdistrict_id'];

            if($skin_laser_center)
            {
                if($skin_laser_center->update())
                {
                     return redirect('skin-laser-center/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('skin-laser-center/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('skin-laser-center/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditSkinLaserCenter(Request $request, $id)
    {
        $data = $request->all();

        

        $skin_laser_center = SkinLaserCenter::find($id);

        try {

            $skin_laser_center->skin_laser_center_description    = $data['skin_laser_center_description'];
            $skin_laser_center->b_skin_laser_center_description  = $data['b_skin_laser_center_description'];
            $skin_laser_center->skin_laser_center_phone_no       = $data['skin_laser_center_phone_no'];
            $skin_laser_center->b_skin_laser_center_phone_no     = $data['b_skin_laser_center_phone_no'];
            $skin_laser_center->skin_laser_center_email_ad       = $data['skin_laser_center_email_ad'];
            //$skin_laser_center->skin_laser_center_fb_link        = $data['skin_laser_center_fb_link'];
            $skin_laser_center->skin_laser_center_web_link       = $data['skin_laser_center_web_link'];
            $skin_laser_center->skin_laser_center_total_bed      = $data['skin_laser_center_total_bed'];
            $skin_laser_center->b_skin_laser_center_total_bed    = $data['b_skin_laser_center_total_bed'];
            $skin_laser_center->skin_laser_center_address        = $data['skin_laser_center_address'];
            $skin_laser_center->b_skin_laser_center_address      = $data['b_skin_laser_center_address'];
            $skin_laser_center->skin_laser_center_latitude       = $data['skin_laser_center_latitude'];
            $skin_laser_center->skin_laser_center_longitude      = $data['skin_laser_center_longitude'];

            if($skin_laser_center->update())
            {
                return redirect('skin-laser-center/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('skin-laser-center/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceSkinLaserCenter(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->skin_laser_center_description    = $data['skin_laser_center_description'];
            $service->b_skin_laser_center_description  = $data['b_skin_laser_center_description'];
            //$service->skin_laser_center_fb_link        = $data['skin_laser_center_fb_link'];
            $service->skin_laser_center_web_link       = $data['skin_laser_center_web_link'];
            $service->skin_laser_center_total_bed      = $data['skin_laser_center_total_bed'];
            $service->b_skin_laser_center_total_bed    = $data['b_skin_laser_center_total_bed'];

            if($service->update())
            {
                return redirect('skin-laser-center/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('skin-laser-center/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteSkinLaserCenter($id)
    {
        $skin_laser_center = SkinLaserCenter::find($id);

        try {

            if($skin_laser_center)
            {
                if($skin_laser_center->delete())
                {
                    return redirect('skin-laser-center')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('skin-laser-center')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('skin-laser-center')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getSkinLaserCenterPhone($id)
    {

        $skin_laser_center = SkinLaserCenter::find($id);

        $phones = $skin_laser_center->phones()->select('skin_laser_center_phone_no')->get();

        return $phones;
    }

    public function getSkinLaserCenterEmail($id)
    {

        $skin_laser_center = SkinLaserCenter::find($id);

        $emails = $skin_laser_center->emails()->select('skin_laser_center_email_ad')->get();

        return $emails;
    }

    public function getSkinLaserCenterService($skin_laser_center_id, $service_id)
    {

         $services = DB::table('skin_laser_center_service')
            ->where('skin_laser_center_id', $skin_laser_center_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getSkinLaserCenterDoctor($medical_specialist_id,$skin_laser_center_id)
    {

        $doctor_ids = SkinLaserCenterDoctor::where('skin_laser_center_id', $skin_laser_center_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;

    }
}