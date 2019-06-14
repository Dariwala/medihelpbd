<?php

namespace App\Modules\Hospital\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Hospital;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\HospitalService;
use App\Models\HospitalDoctor;
use App\Models\HospitalNotice;
use App\Models\MedicalSpecialist;
use DB;

class HospitalController extends Controller
{
    public function index()
    {
    	
    	$hospitals = Hospital::join('subdistrict','subdistrict.id','hospital.subdistrict_id')
                                        ->join('district','district.id','hospital.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(hospital.id ORDER BY subdistrict.sub_district_name) as hospital_id,
                                                        group_concat(hospital.hospital_name ORDER BY subdistrict.sub_district_name) as hospital_name,
                                                        group_concat(hospital.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(hospital.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_hospital = [];
        
       foreach($hospitals as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["hospital_id"]);
           $names           = explode(",", $value["hospital_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_hospital[$i]['sub_district_name']      = $sub_districts[$key];
               $new_hospital[$i]['id']                     = $ids[$key];
               $new_hospital[$i]['hospital_name']     = $names[$key];
               $new_hospital[$i]['created_at']             = $careated_ats[$key];
               $new_hospital[$i]['updated_at']             = $updates_ats[$key];
               $new_hospital[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $hospitals  = $new_hospital;
       
    	return view('hospital::hospital', compact('hospitals'));
    }

    public function viewHospital($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        $phones = DB::table('hospital_phone')->where('hospital_id', $hospital_id)->get();
        $emails = DB::table('hospital_email')->where('hospital_id', $hospital_id)->get();
        $notices = HospitalNotice::where('hospital_id', $hospital_id)->get();
        $hospital_id = $hospital_id;
        return view('hospital::hospital_view',compact('hospital','phones','emails','hospital_id','notices'));
    }

   public function viewAddHospital()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('hospital::hospital_add', compact('districts','district_id'));
    }

    public function viewAddHospitalById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('hospital::hospital_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddHospital(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'hospital_name'   => 'required',
            'b_hospital_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $hospital = new Hospital;

        try {

            $hospital->hospital_name   = $data['hospital_name'];
            $hospital->b_hospital_name = $data['b_hospital_name'];
            $hospital->district_id     = $data['district_id'];
            $hospital->subdistrict_id  = $data['subdistrict_id'];

            if($hospital->save())
            {
                return redirect('hospital')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('hospital')
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


    

    public function viewEditHospital($id)
    {
        $selected_district    = Hospital::find($id)->district;
        $selected_subdistrict = Hospital::find($id)->subDistrict;

        $hospital_services = Hospital::find($id)->hospitalServices()->get();
        $hospital_notices  = Hospital::find($id)->hospitalNotices()->get();
        $hospital_doctors  = Hospital::find($id)->hospitalDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $hospital = Hospital::where('id', $id)->first();

        $hospital_id = $id;
        

        try {

            if($districts)
            {
                return view('hospital::hospital_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'hospital_id','hospital', 'hospital_services', 'hospital_notices','hospital_doctors'));
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

    public function postInfoEditHospital(Request $request, $id)
    {
        $data = $request->all();

        $hospital = Hospital::find($id);

        try {


            if($request->hasFile('hospital_photo'))
            {
                $file = $request->file('hospital_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/hospital',$new_file_name);

                if($success)
                {
                    $hospital->hospital_photo = $new_file_name;
                    $hospital->photo_path = 'uploads/hospital/'.$new_file_name;
                }
            }

            $hospital->hospital_name = $data['hospital_name'];
            $hospital->b_hospital_name = $data['b_hospital_name'];
            $hospital->hospital_subname = $data['hospital_subname'];
            $hospital->b_hospital_subname = $data['b_hospital_subname'];
            $hospital->district_id = $data['district_id'];
            $hospital->subdistrict_id = $data['subdistrict_id'];

            if($hospital)
            {
                if($hospital->update())
                {
                     return redirect('hospital/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('hospital/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('hospital/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditHospital(Request $request, $id)
    {
        $data = $request->all();



        $hospital = Hospital::find($id);

        try {

            $hospital->hospital_description    = $data['hospital_description'];
            $hospital->b_hospital_description  = $data['b_hospital_description'];
            $hospital->hospital_phone_no       = $data['hospital_phone_no'];
            $hospital->b_hospital_phone_no     = $data['b_hospital_phone_no'];
            $hospital->hospital_email_ad       = $data['hospital_email_ad'];
            $hospital->hospital_web_link       = $data['hospital_web_link'];
            $hospital->hospital_total_bed      = $data['hospital_total_bed'];
            $hospital->b_hospital_total_bed    = $data['b_hospital_total_bed'];
            $hospital->hospital_total_doctor   = $data['hospital_total_doctor'];
            $hospital->b_hospital_total_doctor = $data['b_hospital_total_doctor'];
            $hospital->hospital_total_staff    = $data['hospital_total_staff'];
            $hospital->b_hospital_total_staff  = $data['b_hospital_total_staff'];
            $hospital->hospital_address        = $data['hospital_address'];
            $hospital->b_hospital_address      = $data['b_hospital_address'];
            $hospital->hospital_latitude       = $data['hospital_latitude'];
            $hospital->hospital_longitude      = $data['hospital_longitude'];

            if($hospital->update())
            {
                return redirect('hospital/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('hospital/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceHospital(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->hospital_description    = $data['hospital_description'];
            $service->b_hospital_description  = $data['b_hospital_description'];
            $service->hospital_fb_link        = $data['hospital_fb_link'];
            $service->hospital_web_link       = $data['hospital_web_link'];
            $service->hospital_total_bed      = $data['hospital_total_bed'];
            $service->b_hospital_total_bed    = $data['b_hospital_total_bed'];

            if($service->update())
            {
                return redirect('hospital/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('hospital/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteHospital($id)
    {
        $hospital = Hospital::find($id);

        try {

            if($hospital)
            {
                if($hospital->delete())
                {
                    return redirect('hospital')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('hospital')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('hospital')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getHospitalPhone($id)
    {

        $hospital = Hospital::find($id);

        $phones = $hospital->phones()->select('hospital_phone_no')->get();

        return $phones;
    }

    public function getHospitalEmail($id)
    {

        $hospital = Hospital::find($id);

        $emails = $hospital->emails()->select('hospital_email_ad')->get();

        return $emails;
    }

    public function getHospitalService($hospital_id, $service_id)
    {

         $services = DB::table('hospital_service')
            ->where('hospital_id', $hospital_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getHospitalDoctor($medical_specialist_id,$hospital_id)
    {

        $doctor_ids = HospitalDoctor::where('hospital_id', $hospital_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }


}
