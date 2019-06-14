<?php

namespace App\Modules\Addiction\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Addiction;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\AddictionService;
use App\Models\AddictionDoctor;
use App\Models\AddictionNotice;
use App\Models\MedicalSpecialist;
use DB;

class AddictionController extends Controller
{
    public function index()
    {
    	
    	$addictions = Addiction::join('subdistrict','subdistrict.id','addiction.subdistrict_id')
                                        ->join('district','district.id','addiction.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(addiction.id ORDER BY subdistrict.sub_district_name) as addiction_id,
                                                        group_concat(addiction.addiction_name ORDER BY subdistrict.sub_district_name) as addiction_name,
                                                        group_concat(addiction.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(addiction.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_addiction = [];
        
       foreach($addictions as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["addiction_id"]);
           $names           = explode(",", $value["addiction_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_addiction[$i]['sub_district_name']      = $sub_districts[$key];
               $new_addiction[$i]['id']                     = $ids[$key];
               $new_addiction[$i]['addiction_name']     = $names[$key];
               $new_addiction[$i]['created_at']             = $careated_ats[$key];
               $new_addiction[$i]['updated_at']             = $updates_ats[$key];
               $new_addiction[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $addictions  = $new_addiction;
       
    	return view('addiction::addiction', compact('addictions'));
    }

    public function viewAddiction($addiction_id)
    {
        $addiction = Addiction::find($addiction_id);
        $phones = DB::table('addiction_phone')->where('addiction_id', $addiction_id)->get();
        $emails = DB::table('addiction_email')->where('addiction_id', $addiction_id)->get();
        $notices = AddictionNotice::where('addiction_id', $addiction_id)->get();
        $addiction_id = $addiction_id;
        return view('addiction::addiction_view',compact('addiction','phones','emails','addiction_id','notices'));
    }

   public function viewAddAddiction()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('addiction::addiction_add', compact('districts','district_id'));
    }

    public function viewAddAddictionById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('addiction::addiction_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddAddiction(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'addiction_name'   => 'required',
            'b_addiction_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $addiction = new Addiction;

        try {

            $addiction->addiction_name   = $data['addiction_name'];
            $addiction->b_addiction_name = $data['b_addiction_name'];
            $addiction->district_id     = $data['district_id'];
            $addiction->subdistrict_id  = $data['subdistrict_id'];

            if($addiction->save())
            {
                return redirect('addiction')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('addiction')
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


    

    public function viewEditAddiction($id)
    {
        $selected_district    = Addiction::find($id)->district;
        $selected_subdistrict = Addiction::find($id)->subDistrict;

        $addiction_services = Addiction::find($id)->addictionServices()->get();
        $addiction_notices  = Addiction::find($id)->addictionNotices()->get();
        $addiction_doctors  = Addiction::find($id)->addictionDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $addiction = Addiction::where('id', $id)->first();

        $addiction_id = $id;
        

        try {

            if($districts)
            {
                return view('addiction::addiction_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'addiction_id','addiction', 'addiction_services', 'addiction_notices','addiction_doctors'));
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

    public function postInfoEditAddiction(Request $request, $id)
    {
        $data = $request->all();

        $addiction = Addiction::find($id);

        try {


            if($request->hasFile('addiction_photo'))
            {
                $file = $request->file('addiction_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/addiction',$new_file_name);

                if($success)
                {
                    $addiction->addiction_photo = $new_file_name;
                    $addiction->photo_path = 'uploads/addiction/'.$new_file_name;
                }
            }

            $addiction->addiction_name = $data['addiction_name'];
            $addiction->b_addiction_name = $data['b_addiction_name'];
            $addiction->addiction_subname = $data['addiction_subname'];
            $addiction->b_addiction_subname = $data['b_addiction_subname'];
            $addiction->district_id = $data['district_id'];
            $addiction->subdistrict_id = $data['subdistrict_id'];

            if($addiction)
            {
                if($addiction->update())
                {
                     return redirect('addiction/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('addiction/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('addiction/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditAddiction(Request $request, $id)
    {
        $data = $request->all();



        $addiction = Addiction::find($id);

        try {

            $addiction->addiction_description    = $data['addiction_description'];
            $addiction->b_addiction_description  = $data['b_addiction_description'];
            $addiction->addiction_phone_no       = $data['addiction_phone_no'];
            $addiction->b_addiction_phone_no     = $data['b_addiction_phone_no'];
            $addiction->addiction_email_ad       = $data['addiction_email_ad'];
            $addiction->addiction_web_link       = $data['addiction_web_link'];
            $addiction->addiction_total_bed      = $data['addiction_total_bed'];
            $addiction->b_addiction_total_bed    = $data['b_addiction_total_bed'];
            $addiction->addiction_total_doctor   = $data['addiction_total_doctor'];
            $addiction->b_addiction_total_doctor = $data['b_addiction_total_doctor'];
            $addiction->addiction_total_staff    = $data['addiction_total_staff'];
            $addiction->b_addiction_total_staff  = $data['b_addiction_total_staff'];
            $addiction->addiction_address        = $data['addiction_address'];
            $addiction->b_addiction_address      = $data['b_addiction_address'];
            $addiction->addiction_latitude      = $data['addiction_latitude'];
            $addiction->addiction_longitude      = $data['addiction_longitude'];

            if($addiction->update())
            {
                return redirect('addiction/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('addiction/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceAddiction(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->addiction_description    = $data['addiction_description'];
            $service->b_addiction_description  = $data['b_addiction_description'];
            $service->addiction_fb_link        = $data['addiction_fb_link'];
            $service->addiction_web_link       = $data['addiction_web_link'];
            $service->addiction_total_bed      = $data['addiction_total_bed'];
            $service->b_addiction_total_bed    = $data['b_addiction_total_bed'];

            if($service->update())
            {
                return redirect('addiction/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('addiction/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteAddiction($id)
    {
        $addiction = Addiction::find($id);

        try {

            if($addiction)
            {
                if($addiction->delete())
                {
                    return redirect('addiction')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('addiction')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('addiction')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getAddictionPhone($id)
    {

        $addiction = Addiction::find($id);

        $phones = $addiction->phones()->select('addiction_phone_no')->get();

        return $phones;
    }

    public function getAddictionEmail($id)
    {

        $addiction = Addiction::find($id);

        $emails = $addiction->emails()->select('addiction_email_ad')->get();

        return $emails;
    }

    public function getAddictionService($addiction_id, $service_id)
    {

         $services = DB::table('addiction_service')
            ->where('addiction_id', $addiction_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getAddictionDoctor($medical_specialist_id,$addiction_id)
    {

        $doctor_ids = AddictionDoctor::where('addiction_id', $addiction_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }


}
