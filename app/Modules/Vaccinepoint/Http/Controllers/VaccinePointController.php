<?php

namespace App\Modules\Vaccinepoint\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\VaccinePoint;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\VaccinePointPhone;
use App\Models\VaccinePointEmail;
use App\Models\VaccinePointService;
use App\Models\VaccinePointDoctor;
use App\Models\VaccinePointNotice;
use App\Models\MedicalSpecialist;
use DB;

class VaccinePointController extends Controller
{
    public function index()
    {
        
        $vaccine_points = VaccinePoint::join('subdistrict','subdistrict.id','vaccine_point.subdistrict_id')
                                        ->join('district','district.id','vaccine_point.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(vaccine_point.id ORDER BY subdistrict.sub_district_name) as vaccine_point_id,
                                                        group_concat(vaccine_point.vaccine_point_name ORDER BY subdistrict.sub_district_name) as vaccine_point_name,
                                                        group_concat(vaccine_point.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(vaccine_point.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_vaccine_point = [];
        
       foreach($vaccine_points as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["vaccine_point_id"]);
           $names           = explode(",", $value["vaccine_point_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_vaccine_point[$i]['sub_district_name']      = $sub_districts[$key];
               $new_vaccine_point[$i]['id']                     = $ids[$key];
               $new_vaccine_point[$i]['vaccine_point_name']     = $names[$key];
               $new_vaccine_point[$i]['created_at']             = $careated_ats[$key];
               $new_vaccine_point[$i]['updated_at']             = $updates_ats[$key];
               $new_vaccine_point[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $vaccine_points  = $new_vaccine_point;
       
        
    	return view('vaccinepoint::vaccine_point', compact('vaccine_points'));
    }

    public function viewVaccinePoint($vaccine_point_id)
    {
        $vaccine_point = VaccinePoint::find($vaccine_point_id);
        $phones = DB::table('vaccine_point_phone')->where('vaccine_point_id', $vaccine_point_id)->get();
        $emails = DB::table('vaccine_point_email')->where('vaccine_point_id', $vaccine_point_id)->get();
        $services = VaccinePointService::with('service','SubService')->where('vaccine_point_id', $vaccine_point_id)->get();
        $doctors = VaccinePointDoctor::with('medicalSpecialist','department')->where('vaccine_point_id', $vaccine_point_id)->get();
        $notices = VaccinePointNotice::where('vaccine_point_id', $vaccine_point_id)->get();

        return view('vaccinepoint::vaccine_point_view',compact('vaccine_point_id','vaccine_point','phones','emails','services','doctors','notices'));
    }

   public function viewAddVaccinePoint()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('vaccinepoint::vaccine_point_add', compact('districts','district_id'));
    }

    public function viewAddVaccinePointById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('vaccinepoint::vaccine_point_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddVaccinePoint(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'vaccine_point_name'   => 'required',
            'b_vaccine_point_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $vaccine_point = new VaccinePoint;

        try {

            $vaccine_point->vaccine_point_name   = $data['vaccine_point_name'];
            $vaccine_point->b_vaccine_point_name = $data['b_vaccine_point_name'];
            $vaccine_point->district_id          = $data['district_id'];
            $vaccine_point->subdistrict_id       = $data['subdistrict_id'];

            if($vaccine_point->save())
            {
                return redirect('vaccine-point')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('vaccine-point')
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


    

    public function viewEditVaccinePoint($id)
    {
        $selected_district      = VaccinePoint::find($id)->district;
        $selected_subdistrict   = VaccinePoint::find($id)->subDistrict;

        $vaccine_point_services = VaccinePoint::find($id)->VaccinePointServices()->get();
        $vaccine_point_notices  = VaccinePoint::find($id)->VaccinePointNotices()->get();
        $vaccine_point_doctors  = VaccinePoint::find($id)->VaccinePointDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $vaccine_point = VaccinePoint::where('id', $id)->first();

        $vaccine_point_id = $id;
       
        try {

            if($districts)
            {
                return view('vaccinepoint::vaccine_point_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'vaccine_point_id','vaccine_point', 'vaccine_point_services', 'vaccine_point_notices','vaccine_point_doctors'));
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

    public function postInfoEditVaccinePoint(Request $request, $id)
    {
        $data = $request->all();

        $vaccine_point = VaccinePoint::find($id);

        try {


            if($request->hasFile('vaccine_point_photo'))
            {
                $file = $request->file('vaccine_point_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/vaccine_point',$new_file_name);

                if($success)
                {
                    $vaccine_point->vaccine_point_photo = $new_file_name;
                    $vaccine_point->photo_path = 'uploads/vaccine_point/'.$new_file_name;
                }
            }

            $vaccine_point->vaccine_point_name = $data['vaccine_point_name'];
            $vaccine_point->b_vaccine_point_name = $data['b_vaccine_point_name'];
            $vaccine_point->vaccine_point_subname = $data['vaccine_point_subname'];
            $vaccine_point->b_vaccine_point_subname = $data['b_vaccine_point_subname'];
            $vaccine_point->district_id = $data['district_id'];
            $vaccine_point->subdistrict_id = $data['subdistrict_id'];

            if($vaccine_point)
            {
                if($vaccine_point->update())
                {
                     return redirect('vaccine-point/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('vaccine-point/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('vaccine-point/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditVaccinePoint(Request $request, $id)
    {
        $data = $request->all();



        $vaccine_point = VaccinePoint::find($id);

        try {

            $vaccine_point->vaccine_point_description    = $data['vaccine_point_description'];
            $vaccine_point->b_vaccine_point_description  = $data['b_vaccine_point_description'];
            $vaccine_point->vaccine_point_phone_no       = $data['vaccine_point_phone_no'];
            $vaccine_point->b_vaccine_point_phone_no     = $data['b_vaccine_point_phone_no'];
            $vaccine_point->vaccine_point_email_ad       = $data['vaccine_point_email_ad'];
            $vaccine_point->vaccine_point_web_link       = $data['vaccine_point_web_link'];
            $vaccine_point->vaccine_point_total_bed      = $data['vaccine_point_total_bed'];
            $vaccine_point->b_vaccine_point_total_bed    = $data['b_vaccine_point_total_bed'];
            $vaccine_point->vaccine_point_address        = $data['vaccine_point_address'];
            $vaccine_point->b_vaccine_point_address      = $data['b_vaccine_point_address'];
            $vaccine_point->vaccine_point_latitude       = $data['vaccine_point_latitude'];
            $vaccine_point->vaccine_point_longitude      = $data['vaccine_point_longitude'];

            if($vaccine_point->update())
            {
                return redirect('vaccine-point/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('vaccine-point/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceVaccinePoint(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->vaccine_point_description    = $data['vaccine_point_description'];
            $service->b_vaccine_point_description  = $data['b_vaccine_point_description'];
            $service->vaccine_point_web_link       = $data['vaccine_point_web_link'];
            $service->vaccine_point_total_bed      = $data['vaccine_point_total_bed'];
            $service->b_vaccine_point_total_bed    = $data['b_vaccine_point_total_bed'];

            if($service->update())
            {
                return redirect('vaccine-point/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('vaccine-point/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteVaccinePoint($id)
    {
        $vaccine_point = VaccinePoint::find($id);

        try {

            if($vaccine_point)
            {
                if($vaccine_point->delete())
                {
                    return redirect('vaccine-point')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('vaccine-point')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('vaccine-point')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getVaccinePointPhone($id)
    {

        $vaccine_point = VaccinePoint::find($id);

        $phones = $vaccine_point->phones()->select('vaccine_point_phone_no')->get();

        return $phones;
    }

    public function getVaccinePointEmail($id)
    {

        $vaccine_point = VaccinePoint::find($id);

        $emails = $vaccine_point->emails()->select('vaccine_point_email_ad')->get();

        return $emails;
    }


     public function getVaccinePointService($vaccine_point_id, $service_id)
    {

         $services = DB::table('vaccine_point_service')
            ->where('vaccine_point_id', $vaccine_point_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getVaccinePointDoctor($medical_specialist_id, $vaccine_point_id)
    {

        $doctor_ids = VaccinePointDoctor::where('vaccine_point_id', $vaccine_point_id)
                                            ->where('medical_specialist_id',$medical_specialist_id)
                                            ->select('medical_specialist_id')
                                            ->get();
                                            
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();

        return $doctors;

    }
}
