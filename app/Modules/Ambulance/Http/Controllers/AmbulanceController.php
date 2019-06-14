<?php

namespace App\Modules\Ambulance\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ambulance;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\AmbulancePhone;
use App\Models\AmbulanceEmail;
use App\Models\AmbulancePricing;
use App\Models\AmbulanceNotice;
use DB;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::join('subdistrict','subdistrict.id','ambulance.subdistrict_id')
                                        ->join('district','district.id','ambulance.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(ambulance.id ORDER BY subdistrict.sub_district_name) as ambulance_id,
                                                        group_concat(ambulance.ambulance_name ORDER BY subdistrict.sub_district_name) as ambulance_name,
                                                        group_concat(ambulance.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(ambulance.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_ambulance = [];
        
       foreach($ambulances as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["ambulance_id"]);
           $names           = explode(",", $value["ambulance_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_ambulance[$i]['sub_district_name']      = $sub_districts[$key];
               $new_ambulance[$i]['id']                     = $ids[$key];
               $new_ambulance[$i]['ambulance_name']     = $names[$key];
               $new_ambulance[$i]['created_at']             = $careated_ats[$key];
               $new_ambulance[$i]['updated_at']             = $updates_ats[$key];
               $new_ambulance[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $ambulances  = $new_ambulance;

    	return view('ambulance::ambulance', compact('ambulances'));
    }

    public function viewAmbulance($ambulance_id)
    {
        $ambulance = Ambulance::find($ambulance_id);
        $phones     = DB::table('ambulance_phone')->where('ambulance_id', $ambulance_id)->get();
        $emails     = DB::table('ambulance_email')->where('ambulance_id', $ambulance_id)->get();

        $prices = AmbulancePricing::where('ambulance_id', $ambulance_id)->get();

        $notices = AmbulanceNotice::where('ambulance_id', $ambulance_id)->get();

        return view('ambulance::ambulance_view',compact('ambulance','phones','emails','prices','notices'));
    }

   public function viewAddAmbulance()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('ambulance::ambulance_add', compact('districts','district_id'));
    }

    public function viewAddAmbulanceById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('ambulance::ambulance_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddAmbulance(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'district_id'      => 'required',
            'subdistrict_id'   => 'required',
        ]);

        $ambulance = new Ambulance;

        try {

            $ambulance->ambulance_name   = $data['ambulance_name'];
            $ambulance->b_ambulance_name = $data['b_ambulance_name'];
            $ambulance->district_id          = $data['district_id'];
            $ambulance->subdistrict_id       = $data['subdistrict_id'];

            if($ambulance->save())
            {
                return redirect('ambulance')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('ambulance')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditInfoAmbulance($id)
    {
    	
        $selected_district    = Ambulance::find($id)->district;
        $selected_subdistrict = Ambulance::find($id)->subDistrict;

        $ambulance_pricings = Ambulance::find($id)->AmbulancePricings()->get();
        $ambulance_notices  = Ambulance::find($id)->AmbulanceNotices()->get();

        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $ambulance = Ambulance::where('id', $id)->first();

        $ambulance_id = $id;
        

        try {

            if($districts)
            {
                return view('ambulance::ambulance_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'ambulance_id','ambulance','ambulance_notices','ambulance_pricings'));
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

    public function postInfoEditAmbulance(Request $request , $id)
    {


        $data = $request->all();

        

        $ambulance = Ambulance::find($id);

        try {


            if($request->hasFile('ambulance_photo'))
            {
                $file = $request->file('ambulance_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/ambulance',$new_file_name);

                if($success)
                {
                    $ambulance->ambulance_photo = $new_file_name;
                    $ambulance->photo_path = 'uploads/ambulance/'.$new_file_name;
                }
            }

            $ambulance->ambulance_name = $data['ambulance_name'];
            $ambulance->b_ambulance_name = $data['b_ambulance_name'];
            $ambulance->ambulance_subname = $data['ambulance_subname'];
            $ambulance->b_ambulance_subname = $data['b_ambulance_subname'];
            $ambulance->district_id = $data['district_id'];
            $ambulance->subdistrict_id = $data['subdistrict_id'];

            if($ambulance)
            {
                if($ambulance->update())
                {
                     return redirect('ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('ambulance/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditAmbulance(Request $request , $id)
    {

        $data = $request->all();

        // $number = $data['ambulance_phone'];
        // $number = array_filter($number);


        // $email = $data['ambulance_email_ad'];
        // $email = array_filter($email);


        // if (!empty($number)) {

        //     $phones = AmbulancePhone::where('ambulance_id', $id)->get();

        //     if($phones)
        //     {
        //         $ambulance = Ambulance::find($id);
        //         $ambulance->phones()->delete();
        //     }
            
        //     $phone_count = count($number);

        //     $ambulance = Ambulance::find($id);

        //     for ($i=0; $i < $phone_count; $i++) { 

        //         $phone = new AmbulancePhone;
        //         $phone->ambulance_phone_no = $number[$i];
        //         $ambulance->phones()->save($phone);
        //    }
        // }


        // if (!empty($email)) {

        //     $emails = AmbulanceEmail::where('ambulance_id', $id)->get();

        //     if($emails)
        //     {
        //         $ambulance = Ambulance::find($id);
        //         $ambulance->emails()->delete();
        //     }
            
        //     $email_count = count($email);

        //     $ambulance = Ambulance::find($id);

        //     for ($i=0; $i < $email_count; $i++) { 
        //         $emails = new AmbulanceEmail;
        //         $emails->ambulance_email_ad = $email[$i];
        //         $ambulance->emails()->save($emails);
        //     }
        // }

        $ambulance = Ambulance::find($id);

        try {


            $ambulance->ambulance_address       = $data['ambulance_address'];
            $ambulance->b_ambulance_address     = $data['b_ambulance_address'];
            $ambulance->total_ambulance         = $data['total_ambulance'];
            $ambulance->b_total_ambulance       = $data['b_total_ambulance'];
            $ambulance->ambulance_phone         = $data['ambulance_phone'];
            $ambulance->b_ambulance_phone       = $data['b_ambulance_phone'];
            $ambulance->ambulance_email       = $data['ambulance_email'];
            $ambulance->ambulance_description   = $data['ambulance_description'];
            $ambulance->b_ambulance_description = $data['b_ambulance_description'];
           // $ambulance->ambulance_web_link      = $data['ambulance_web_link'];
            $ambulance->ambulance_fb_link       = $data['ambulance_fb_link'];
            $ambulance->ambulance_latitude       = $data['ambulance_latitude'];
            $ambulance->ambulance_longitude       = $data['ambulance_longitude'];
            
            if($ambulance)
            {
                if($ambulance->update())
                {
                     return redirect('ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('ambulance/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('ambulance/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function deleteAmbulance($id)

    {
        
        $ambulance = Ambulance::find($id);

        try {

            if($ambulance)
            {
                if($ambulance->delete())
                {
                    return redirect('ambulance')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('ambulance')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('ambulance')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getAmbulancePhone($id)
    {

        $ambulance = Ambulance::find($id);

        $phones = $ambulance->phones()->select('ambulance_phone_no')->get();

        return $phones;
    }

    public function getAmbulanceEmail($id)
    {

        $ambulance = Ambulance::find($id);

        $emails = $ambulance->emails()->select('ambulance_email_ad')->get();

        return $emails;
    }
}
