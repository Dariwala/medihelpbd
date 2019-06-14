<?php

namespace App\Modules\Parlour\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parlour;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\Phone;
use App\Models\Email;
use App\Models\ParlourService;
use App\Models\ParlourDoctor;
use App\Models\ParlourNotice;
use App\Models\MedicalSpecialist;
use DB;

class ParlourController extends Controller
{
    public function index()
    {
    	
    	$parlours = Parlour::join('subdistrict','subdistrict.id','parlour.subdistrict_id')
                                        ->join('district','district.id','parlour.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(parlour.id ORDER BY subdistrict.sub_district_name) as parlour_id,
                                                        group_concat(parlour.parlour_name ORDER BY subdistrict.sub_district_name) as parlour_name,
                                                        group_concat(parlour.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(parlour.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_parlour = [];
        
       foreach($parlours as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["parlour_id"]);
           $names           = explode(",", $value["parlour_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_parlour[$i]['sub_district_name']      = $sub_districts[$key];
               $new_parlour[$i]['id']                     = $ids[$key];
               $new_parlour[$i]['parlour_name']     = $names[$key];
               $new_parlour[$i]['created_at']             = $careated_ats[$key];
               $new_parlour[$i]['updated_at']             = $updates_ats[$key];
               $new_parlour[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $parlours  = $new_parlour;
       
    	return view('parlour::parlour', compact('parlours'));
    }

    public function viewParlour($parlour_id)
    {
        $parlour = Parlour::find($parlour_id);
        $phones = DB::table('parlour_phone')->where('parlour_id', $parlour_id)->get();
        $emails = DB::table('parlour_email')->where('parlour_id', $parlour_id)->get();
        $notices = ParlourNotice::where('parlour_id', $parlour_id)->get();
        $parlour_id = $parlour_id;
        return view('parlour::parlour_view',compact('parlour','phones','emails','parlour_id','notices'));
    }

   public function viewAddParlour()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('parlour::parlour_add', compact('districts','district_id'));
    }

    public function viewAddParlourById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('parlour::parlour_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddParlour(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'parlour_name'   => 'required',
            'b_parlour_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $parlour = new Parlour;

        try {

            $parlour->parlour_name   = $data['parlour_name'];
            $parlour->b_parlour_name = $data['b_parlour_name'];
            $parlour->district_id     = $data['district_id'];
            $parlour->subdistrict_id  = $data['subdistrict_id'];

            if($parlour->save())
            {
                return redirect('parlour')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('parlour')
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


    

    public function viewEditParlour($id)
    {
        $selected_district    = Parlour::find($id)->district;
        $selected_subdistrict = Parlour::find($id)->subDistrict;

        $parlour_services = Parlour::find($id)->parlourServices()->get();
        $parlour_notices  = Parlour::find($id)->parlourNotices()->get();
        $parlour_doctors  = Parlour::find($id)->parlourDoctors()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $parlour = Parlour::where('id', $id)->first();

        $parlour_id = $id;
        

        try {

            if($districts)
            {
                return view('parlour::parlour_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'parlour_id','parlour', 'parlour_services', 'parlour_notices','parlour_doctors'));
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

    public function postInfoEditParlour(Request $request, $id)
    {
        $data = $request->all();

        $parlour = Parlour::find($id);

        try {


            if($request->hasFile('parlour_photo'))
            {
                $file = $request->file('parlour_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/parlour',$new_file_name);

                if($success)
                {
                    $parlour->parlour_photo = $new_file_name;
                    $parlour->photo_path = 'uploads/parlour/'.$new_file_name;
                }
            }

            $parlour->parlour_name = $data['parlour_name'];
            $parlour->b_parlour_name = $data['b_parlour_name'];
            $parlour->parlour_subname = $data['parlour_subname'];
            $parlour->b_parlour_subname = $data['b_parlour_subname'];
            $parlour->district_id = $data['district_id'];
            $parlour->subdistrict_id = $data['subdistrict_id'];

            if($parlour)
            {
                if($parlour->update())
                {
                     return redirect('parlour/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('parlour/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('parlour/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }


    public function postAboutEditParlour(Request $request, $id)
    {
        $data = $request->all();



        $parlour = Parlour::find($id);

        try {

            $parlour->parlour_description    = $data['parlour_description'];
            $parlour->b_parlour_description  = $data['b_parlour_description'];
            $parlour->parlour_phone_no       = $data['parlour_phone_no'];
            $parlour->b_parlour_phone_no     = $data['b_parlour_phone_no'];
            $parlour->parlour_email_ad       = $data['parlour_email_ad'];
            $parlour->parlour_web_link       = $data['parlour_web_link'];
            $parlour->parlour_total_bed      = $data['parlour_total_bed'];
            $parlour->b_parlour_total_bed    = $data['b_parlour_total_bed'];
            $parlour->parlour_total_doctor   = $data['parlour_total_doctor'];
            $parlour->b_parlour_total_doctor = $data['b_parlour_total_doctor'];
            $parlour->parlour_total_staff    = $data['parlour_total_staff'];
            $parlour->b_parlour_total_staff  = $data['b_parlour_total_staff'];
            $parlour->parlour_address        = $data['parlour_address'];
            $parlour->b_parlour_address      = $data['b_parlour_address'];
            $parlour->parlour_latitude       = $data['parlour_latitude'];
            $parlour->parlour_longitude      = $data['parlour_longitude'];
            

            if($parlour->update())
            {
                return redirect('parlour/edit/info'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('parlour/edit/info'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }



    public function postServiceParlour(Request $request, $id)
    {
        $data = $request->all();


        $service = Service::find($id);

        try {

            $service->parlour_description    = $data['parlour_description'];
            $service->b_parlour_description  = $data['b_parlour_description'];
            $service->parlour_fb_link        = $data['parlour_fb_link'];
            $service->parlour_web_link       = $data['parlour_web_link'];
            $service->parlour_total_bed      = $data['parlour_total_bed'];
            $service->b_parlour_total_bed    = $data['b_parlour_total_bed'];

            if($service->update())
            {
                return redirect('parlour/edit/service'.'/'.$id)
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('parlour/edit/service'.'/'.$id)
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } catch (Exception $e) {
            
        }
    }




    public function deleteParlour($id)
    {
        $parlour = Parlour::find($id);

        try {

            if($parlour)
            {
                if($parlour->delete())
                {
                    return redirect('parlour')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('parlour')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('parlour')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getParlourPhone($id)
    {

        $parlour = Parlour::find($id);

        $phones = $parlour->phones()->select('parlour_phone_no')->get();

        return $phones;
    }

    public function getParlourEmail($id)
    {

        $parlour = Parlour::find($id);

        $emails = $parlour->emails()->select('parlour_email_ad')->get();

        return $emails;
    }

    public function getParlourService($parlour_id, $service_id)
    {

         $services = DB::table('parlour_service')
            ->where('parlour_id', $parlour_id)
            ->where('service_id', $service_id)
            ->get();

        return $services;
    }

    public function getParlourDoctor($medical_specialist_id,$parlour_id)
    {

        $doctor_ids = ParlourDoctor::where('parlour_id', $parlour_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }


}
