<?php

namespace App\Modules\Yoga\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Yoga;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\YogaService;
use App\Models\YogaDoctor;
use App\Models\YogaNotice;
use App\Models\MedicalSpecialist;
use DB;

class YogaController extends Controller
{
    public function index()
    {
    	
    	$yogas = Yoga::join('subdistrict','subdistrict.id','yoga.subdistrict_id')
                                        ->join('district','district.id','yoga.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(yoga.id ORDER BY subdistrict.sub_district_name) as yoga_id,
                                                        group_concat(yoga.yoga_name ORDER BY subdistrict.sub_district_name) as yoga_name,
                                                        group_concat(yoga.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(yoga.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_yoga = [];
        
       foreach($yogas as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["yoga_id"]);
           $names           = explode(",", $value["yoga_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_yoga[$i]['sub_district_name']      = $sub_districts[$key];
               $new_yoga[$i]['id']                     = $ids[$key];
               $new_yoga[$i]['yoga_name']     = $names[$key];
               $new_yoga[$i]['created_at']             = $careated_ats[$key];
               $new_yoga[$i]['updated_at']             = $updates_ats[$key];
               $new_yoga[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $yogas  = $new_yoga;
       
    	return view('yoga::yoga', compact('yogas'));
    }

    public function viewYoga($yoga_id)
    {
        $yoga = Yoga::find($yoga_id);
        $phones = DB::table('yoga_phone')->where('yoga_id', $yoga_id)->get();
        $emails = DB::table('yoga_email')->where('yoga_id', $yoga_id)->get();
        $notices = YogaNotice::where('yoga_id', $yoga_id)->get();
        $yoga_id = $yoga_id;
        return view('yoga::yoga_view',compact('yoga','phones','emails','yoga_id','notices'));
    }

   public function viewAddYoga()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('yoga::yoga_add', compact('districts','district_id'));
    }

    public function viewAddYogaById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('yoga::yoga_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddYoga(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'yoga_name'   => 'required',
            'b_yoga_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $yoga = new Yoga;

        try {

            $yoga->yoga_name   = $data['yoga_name'];
            $yoga->b_yoga_name = $data['b_yoga_name'];
            $yoga->district_id     = $data['district_id'];
            $yoga->subdistrict_id  = $data['subdistrict_id'];

            if($yoga->save())
            {
                return redirect('yoga')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('yoga')
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


    

    public function viewEditYoga($id)
    {
        $selected_district    = Yoga::find($id)->district;
        $selected_subdistrict = Yoga::find($id)->subDistrict;

        $yoga_services = Yoga::find($id)->yogaServices()->get();
        $yoga_notices  = Yoga::find($id)->yogaNotices()->get();
        $yoga_doctors  = Yoga::find($id)->yogaDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $yoga = Yoga::where('id', $id)->first();

        $yoga_id = $id;
        

        try {

            if($districts)
            {
                return view('yoga::yoga_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'yoga_id','yoga', 'yoga_services', 'yoga_notices','yoga_doctors'));
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

    public function postInfoEditYoga(Request $request, $id)
    {
        $data = $request->all();

        $yoga = Yoga::find($id);

        try {


            if($request->hasFile('yoga_photo'))
            {
                $file = $request->file('yoga_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/yoga',$new_file_name);

                if($success)
                {
                    $yoga->yoga_photo = $new_file_name;
                    $yoga->photo_path = 'uploads/yoga/'.$new_file_name;
                }
            }

            $yoga->yoga_name = $data['yoga_name'];
            $yoga->b_yoga_name = $data['b_yoga_name'];
            $yoga->yoga_subname = $data['yoga_subname'];
            $yoga->b_yoga_subname = $data['b_yoga_subname'];
            $yoga->district_id = $data['district_id'];
            $yoga->subdistrict_id = $data['subdistrict_id'];

            if($yoga)
            {
                if($yoga->update())
                {
                     return redirect('yoga/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('yoga/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('yoga/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditYoga(Request $request, $id)
    {
        $data = $request->all();



        $yoga = Yoga::find($id);

        try {

            $yoga->yoga_description    = $data['yoga_description'];
            $yoga->b_yoga_description  = $data['b_yoga_description'];
            $yoga->yoga_phone_no       = $data['yoga_phone_no'];
            $yoga->b_yoga_phone_no     = $data['b_yoga_phone_no'];
            $yoga->yoga_email_ad       = $data['yoga_email_ad'];
            $yoga->yoga_web_link       = $data['yoga_web_link'];
            $yoga->yoga_total_bed      = $data['yoga_total_bed'];
            $yoga->b_yoga_total_bed    = $data['b_yoga_total_bed'];
            $yoga->yoga_total_doctor   = $data['yoga_total_doctor'];
            $yoga->b_yoga_total_doctor = $data['b_yoga_total_doctor'];
            $yoga->yoga_total_staff    = $data['yoga_total_staff'];
            $yoga->b_yoga_total_staff  = $data['b_yoga_total_staff'];
            $yoga->yoga_address        = $data['yoga_address'];
            $yoga->b_yoga_address      = $data['b_yoga_address'];
            $yoga->yoga_latitude       = $data['yoga_latitude'];
            $yoga->yoga_longitude      = $data['yoga_longitude'];

            if($yoga->update())
            {
                return redirect('yoga/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('yoga/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceYoga(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->yoga_description    = $data['yoga_description'];
            $service->b_yoga_description  = $data['b_yoga_description'];
            $service->yoga_fb_link        = $data['yoga_fb_link'];
            $service->yoga_web_link       = $data['yoga_web_link'];
            $service->yoga_total_bed      = $data['yoga_total_bed'];
            $service->b_yoga_total_bed    = $data['b_yoga_total_bed'];

            if($service->update())
            {
                return redirect('yoga/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('yoga/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteYoga($id)
    {
        $yoga = Yoga::find($id);

        try {

            if($yoga)
            {
                if($yoga->delete())
                {
                    return redirect('yoga')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('yoga')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('yoga')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getYogaPhone($id)
    {

        $yoga = Yoga::find($id);

        $phones = $yoga->phones()->select('yoga_phone_no')->get();

        return $phones;
    }

    public function getYogaEmail($id)
    {

        $yoga = Yoga::find($id);

        $emails = $yoga->emails()->select('yoga_email_ad')->get();

        return $emails;
    }

    public function getYogaService($yoga_id, $service_id)
    {

         $services = DB::table('yoga_service')
            ->where('yoga_id', $yoga_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getYogaDoctor($medical_specialist_id,$yoga_id)
    {

        $doctor_ids = YogaDoctor::where('yoga_id', $yoga_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }


}
