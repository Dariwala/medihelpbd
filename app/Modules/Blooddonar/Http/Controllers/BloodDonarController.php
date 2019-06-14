<?php

namespace App\Modules\Blooddonar\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodDonor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\BloodDonorPhone;
use App\Models\BloodDonorEmail;
use App\Models\BloodDonorPricing;
use DB;

class BloodDonarController extends Controller
{
    public function index()
    {
        $blood_donors = BloodDonor::join('subdistrict','subdistrict.id','blood_donor.subdistrict_id')
                                        ->join('district','district.id','blood_donor.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(blood_donor.id ORDER BY subdistrict.sub_district_name) as blood_donor_id,
                                                        group_concat(blood_donor.blood_donor_name ORDER BY subdistrict.sub_district_name) as blood_donor_name,
                                                        group_concat(blood_donor.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(blood_donor.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_blood_donor = [];
        
       foreach($blood_donors as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["blood_donor_id"]);
           $names           = explode(",", $value["blood_donor_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_blood_donor[$i]['sub_district_name']      = $sub_districts[$key];
               $new_blood_donor[$i]['id']                     = $ids[$key];
               $new_blood_donor[$i]['blood_donor_name']     = $names[$key];
               $new_blood_donor[$i]['created_at']             = $careated_ats[$key];
               $new_blood_donor[$i]['updated_at']             = $updates_ats[$key];
               $new_blood_donor[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $blood_donors  = $new_blood_donor;

    	return view('blooddonar::blood_donor', compact('blood_donors'));
    }

    public function viewBloodDonor($blood_donor_id)
    {
        $blood_donor = BloodDonor::find($blood_donor_id);
        $phones = DB::table('blood_donor_phone')->where('blood_donor_id', $blood_donor_id)->get();
        $emails = DB::table('blood_donor_email')->where('blood_donor_id', $blood_donor_id)->get();

        $prices = BloodDonorPricing::where('blood_donor_id', $blood_donor_id)->get();

        return view('blooddonar::blood_donor_view',compact('blood_donor','phones','emails','prices'));
    }

   public function viewAddBloodDonor()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('blooddonar::blood_donor_add', compact('districts','district_id'));
    }

    public function viewAddBloodDonorById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('blooddonar::blood_donor_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddBloodDonor(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'blood_donor_name'   => 'required',
            'b_blood_donor_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $blood_donor = new BloodDonor;

        try {

            $blood_donor->blood_donor_name   = $data['blood_donor_name'];
            $blood_donor->b_blood_donor_name = $data['b_blood_donor_name'];
            $blood_donor->district_id     = $data['district_id'];
            $blood_donor->subdistrict_id  = $data['subdistrict_id'];

            if($blood_donor->save())
            {
                return redirect('blood-donar')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('blood-donar')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditInfoBloodDonor($id)
    {
    	
        $selected_district    = BloodDonor::find($id)->district;
        $selected_subdistrict = BloodDonor::find($id)->subDistrict;

        // $blood_donor_services = BloodDonor::find($id)->blood_donorServices()->get();
        // $blood_donor_notices = BloodDonor::find($id)->blood_donorNotices()->get();

        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();
        $blood_donor_pricings = BloodDonor::find($id)->bloodDonorPricings()->get();

        $blood_donor = BloodDonor::where('id', $id)->first();

        $blood_donor_id = $id;
        

        try {

            if($districts)
            {
                return view('blooddonar::blood_donor_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'blood_donor_id','blood_donor','blood_donor_pricings'));
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

    public function postInfoEditBloodDonor(Request $request , $id)
    {


        $data = $request->all();

        

        $blood_donor = BloodDonor::find($id);

        try {


            if($request->hasFile('blood_donor_photo'))
            {
                $file = $request->file('blood_donor_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/blood_donor',$new_file_name);

                if($success)
                {
                    $blood_donor->blood_donor_photo = $new_file_name;
                    $blood_donor->photo_path = 'uploads/blood_donor/'.$new_file_name;
                }
            }

            $blood_donor->blood_donor_name      = $data['blood_donor_name'];
            $blood_donor->b_blood_donor_name    = $data['b_blood_donor_name'];
            $blood_donor->blood_donor_subname   = $data['blood_donor_subname'];
            $blood_donor->b_blood_donor_subname = $data['b_blood_donor_subname'];
            $blood_donor->district_id           = $data['district_id'];
            $blood_donor->subdistrict_id        = $data['subdistrict_id'];

            if($blood_donor)
            {
                if($blood_donor->update())
                {
                     return redirect('blood-donar/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('blood-donar/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('blood-donar/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditBloodDonor(Request $request , $id)
    {

        $data = $request->all();


        $blood_donor = BloodDonor::find($id);

        try {

            $blood_donor->blood_donor_address             = $data['blood_donor_address'];
            $blood_donor->b_blood_donor_address           = $data['b_blood_donor_address'];
            $blood_donor->blood_donor_phone_no            = $data['blood_donor_phone_no'];
            $blood_donor->b_blood_donor_phone_no          = $data['b_blood_donor_phone_no'];
            $blood_donor->blood_donor_email_ad            = $data['blood_donor_email_ad'];
            $blood_donor->blood_donor_general_info        = $data['blood_donor_general_info'];
            $blood_donor->b_blood_donor_general_info      = $data['b_blood_donor_general_info'];
            $blood_donor->blood_donor_description         = $data['blood_donor_description'];
            $blood_donor->b_blood_donor_description       = $data['b_blood_donor_description'];
            $blood_donor->blood_donor_fb_link             = $data['blood_donor_fb_link'];
            $blood_donor->blood_donor_latitude            = $data['blood_donor_latitude'];
            $blood_donor->blood_donor_longitude           = $data['blood_donor_longitude'];

            if($blood_donor)
            {
                if($blood_donor->update())
                {
                     return redirect('blood-donar/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('blood-donar/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('blood-donar/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function deleteBloodDonor($id)
    {
        $blood_donor = BloodDonor::find($id);

        try {

            if($blood_donor)
            {
                if($blood_donor->delete())
                {
                    return redirect('blood-donar')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('blood-donar')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('blood-donar')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getBloodDonorPhone($id)
    {

        $blood_donor = BloodDonor::find($id);

        $phones = $blood_donor->phones()->select('blood_donor_phone_no')->get();

        return $phones;
    }

    public function getBloodDonorEmail($id)
    {

        $blood_donor = BloodDonor::find($id);

        $emails = $blood_donor->emails()->select('blood_donor_email_ad')->get();

        return $emails;
    }

    public function all(request $request)
    {
       $subDistrict = $request->subDistrict;

        if(isset($subDistrict)){
            
            if(Session('language')=='bn') 
            {
               $blood_donors = BloodDonor::select('b_blood_donor_subname as blood_group')->distinct()->orderBy('b_blood_donor_subname', 'ASC')->where('b_blood_donor_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $blood_donors = BloodDonor::select('blood_donor_subname as blood_group')->distinct()->orderBy('blood_donor_subname', 'ASC')->where('blood_donor_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }   
            
        }else{
            
            if(Session('language')=='bn') 
            {
               $blood_donors = BloodDonor::select('b_blood_donor_subname as blood_group')->distinct()->orderBy('b_blood_donor_subname', 'ASC')->where('b_blood_donor_subname', '!=', NULL)->get();
            }
            else
            {
               $blood_donors = BloodDonor::select('blood_donor_subname as blood_group')->distinct()->orderBy('blood_donor_subname', 'ASC')->where('blood_donor_subname', '!=', NULL)->get();
            }
            
        }

        return $blood_donors;
    }
}
