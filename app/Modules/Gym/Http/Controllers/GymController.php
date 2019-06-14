<?php

namespace App\Modules\Gym\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gym;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\GymService;
use App\Models\GymDoctor;
use App\Models\GymNotice;
use App\Models\MedicalSpecialist;
use DB;

class GymController extends Controller
{
    public function index()
    {
    	
    	$gyms = Gym::join('subdistrict','subdistrict.id','gym.subdistrict_id')
                                        ->join('district','district.id','gym.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(gym.id ORDER BY subdistrict.sub_district_name) as gym_id,
                                                        group_concat(gym.gym_name ORDER BY subdistrict.sub_district_name) as gym_name,
                                                        group_concat(gym.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(gym.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_gym = [];
        
       foreach($gyms as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["gym_id"]);
           $names           = explode(",", $value["gym_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_gym[$i]['sub_district_name']      = $sub_districts[$key];
               $new_gym[$i]['id']                     = $ids[$key];
               $new_gym[$i]['gym_name']     = $names[$key];
               $new_gym[$i]['created_at']             = $careated_ats[$key];
               $new_gym[$i]['updated_at']             = $updates_ats[$key];
               $new_gym[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $gyms  = $new_gym;
       
    	return view('gym::gym', compact('gyms'));
    }

    public function viewGym($gym_id)
    {
        $gym = Gym::find($gym_id);
        $phones = DB::table('gym_phone')->where('gym_id', $gym_id)->get();
        $emails = DB::table('gym_email')->where('gym_id', $gym_id)->get();
        $notices = GymNotice::where('gym_id', $gym_id)->get();
        $gym_id = $gym_id;
        return view('gym::gym_view',compact('gym','phones','emails','gym_id','notices'));
    }

   public function viewAddGym()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('gym::gym_add', compact('districts','district_id'));
    }

    public function viewAddGymById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('gym::gym_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddGym(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'gym_name'   => 'required',
            'b_gym_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $gym = new Gym;

        try {

            $gym->gym_name   = $data['gym_name'];
            $gym->b_gym_name = $data['b_gym_name'];
            $gym->district_id     = $data['district_id'];
            $gym->subdistrict_id  = $data['subdistrict_id'];

            if($gym->save())
            {
                return redirect('gym')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('gym')
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


    

    public function viewEditGym($id)
    {
        $selected_district    = Gym::find($id)->district;
        $selected_subdistrict = Gym::find($id)->subDistrict;

        $gym_services = Gym::find($id)->gymServices()->get();
        $gym_notices  = Gym::find($id)->gymNotices()->get();
        $gym_doctors  = Gym::find($id)->gymDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $gym = Gym::where('id', $id)->first();

        $gym_id = $id;
        

        try {

            if($districts)
            {
                return view('gym::gym_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'gym_id','gym', 'gym_services', 'gym_notices','gym_doctors'));
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

    public function postInfoEditGym(Request $request, $id)
    {
        $data = $request->all();

        $gym = Gym::find($id);

        try {


            if($request->hasFile('gym_photo'))
            {
                $file = $request->file('gym_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/gym',$new_file_name);

                if($success)
                {
                    $gym->gym_photo = $new_file_name;
                    $gym->photo_path = 'uploads/gym/'.$new_file_name;
                }
            }

            $gym->gym_name = $data['gym_name'];
            $gym->b_gym_name = $data['b_gym_name'];
            $gym->gym_subname = $data['gym_subname'];
            $gym->b_gym_subname = $data['b_gym_subname'];
            $gym->district_id = $data['district_id'];
            $gym->subdistrict_id = $data['subdistrict_id'];

            if($gym)
            {
                if($gym->update())
                {
                     return redirect('gym/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('gym/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('gym/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditGym(Request $request, $id)
    {
        $data = $request->all();



        $gym = Gym::find($id);

        try {

            $gym->gym_description    = $data['gym_description'];
            $gym->b_gym_description  = $data['b_gym_description'];
            $gym->gym_phone_no       = $data['gym_phone_no'];
            $gym->b_gym_phone_no     = $data['b_gym_phone_no'];
            $gym->gym_email_ad       = $data['gym_email_ad'];
            $gym->gym_web_link       = $data['gym_web_link'];
            $gym->gym_total_bed      = $data['gym_total_bed'];
            $gym->b_gym_total_bed    = $data['b_gym_total_bed'];
            $gym->gym_total_doctor   = $data['gym_total_doctor'];
            $gym->b_gym_total_doctor = $data['b_gym_total_doctor'];
            $gym->gym_total_staff    = $data['gym_total_staff'];
            $gym->b_gym_total_staff  = $data['b_gym_total_staff'];
            $gym->gym_address        = $data['gym_address'];
            $gym->b_gym_address      = $data['b_gym_address'];
            $gym->gym_latitude       = $data['gym_latitude'];
            $gym->gym_longitude      = $data['gym_longitude'];

            if($gym->update())
            {
                return redirect('gym/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('gym/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceGym(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->gym_description    = $data['gym_description'];
            $service->b_gym_description  = $data['b_gym_description'];
            $service->gym_fb_link        = $data['gym_fb_link'];
            $service->gym_web_link       = $data['gym_web_link'];
            $service->gym_total_bed      = $data['gym_total_bed'];
            $service->b_gym_total_bed    = $data['b_gym_total_bed'];

            if($service->update())
            {
                return redirect('gym/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('gym/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteGym($id)
    {
        $gym = Gym::find($id);

        try {

            if($gym)
            {
                if($gym->delete())
                {
                    return redirect('gym')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('gym')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('gym')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getGymPhone($id)
    {

        $gym = Gym::find($id);

        $phones = $gym->phones()->select('gym_phone_no')->get();

        return $phones;
    }

    public function getGymEmail($id)
    {

        $gym = Gym::find($id);

        $emails = $gym->emails()->select('gym_email_ad')->get();

        return $emails;
    }

    public function getGymService($gym_id, $service_id)
    {

         $services = DB::table('gym_service')
            ->where('gym_id', $gym_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getGymDoctor($medical_specialist_id,$gym_id)
    {

        $doctor_ids = GymDoctor::where('gym_id', $gym_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }


}
