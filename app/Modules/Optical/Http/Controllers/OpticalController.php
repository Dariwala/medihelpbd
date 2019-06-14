<?php

namespace App\Modules\Optical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Optical;
use App\Models\OpticalPhone;
use App\Models\OpticalEmail;
use App\Models\OpticalDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\OpticalProduct;
use App\Models\OpticalService;
use App\Models\OpticalNotice;
use DB;

class OpticalController extends Controller
{
    public function index()
    {

        $pharmacies = Optical::join('subdistrict','subdistrict.id','optical.subdistrict_id')
                                        ->join('district','district.id','optical.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(optical.id ORDER BY subdistrict.sub_district_name) as optical_id,
                                                        group_concat(optical.optical_name ORDER BY subdistrict.sub_district_name) as optical_name,
                                                        group_concat(optical.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(optical.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_optical = [];
        
       foreach($pharmacies as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["optical_id"]);
           $names           = explode(",", $value["optical_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_optical[$i]['sub_district_name']      = $sub_districts[$key];
               $new_optical[$i]['id']                     = $ids[$key];
               $new_optical[$i]['optical_name']     = $names[$key];
               $new_optical[$i]['created_at']             = $careated_ats[$key];
               $new_optical[$i]['updated_at']             = $updates_ats[$key];
               $new_optical[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $pharmacies  = $new_optical;
       
    	return view('optical::optical', compact('pharmacies'));
    }

    public function viewOptical($optical_id)
    {
        
        
        $optical = Optical::find($optical_id);
        $phones = DB::table('optical_phone')->where('optical_id', $optical_id)->get();
        $emails = DB::table('optical_email')->where('optical_id', $optical_id)->get();

        //$productss = OpticalProduct::with('productCategory','productSubCategory')->where('optical_id', $optical_id)->get();
        $doctors = OpticalDoctor::with('medicalSpecialist','department')->where('optical_id', $optical_id)->get();
        $notices = OpticalNotice::where('optical_id', $optical_id)->get();
        $products = OpticalProduct::where('optical_id', $optical_id)->get();
        
      

        return view('optical::optical_view',compact('optical_id','optical','phones','emails','products','doctors','notices'));
    }

    public function viewAddOptical()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('optical::optical_add', compact('districts','district_id'));
    }

    public function viewAddOpticalById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('optical::optical_add', compact('districts', 'subdistricts', 'district_id'));
    }
    
    public function postAddOptical(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'optical_name'   => 'required',
            'b_optical_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $optical = new Optical;

        try {

            $optical->optical_name   = $data['optical_name'];
            $optical->b_optical_name = $data['b_optical_name'];
            $optical->district_id     = $data['district_id'];
            $optical->subdistrict_id  = $data['subdistrict_id'];

            if($optical->save())
            {
                return redirect('optical')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            
            else
            {
                return redirect('optical')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditOptical($id)
    {
        $selected_district    = Optical::find($id)->district;
        $selected_subdistrict = Optical::find($id)->subDistrict;

        $optical_products    = Optical::find($id)->opticalProducts()->get();
        $optical_notices     = Optical::find($id)->opticalNotices()->get();
        $optical_doctors     = Optical::find($id)->opticalDoctors()->get();
        $optical_services    = Optical::find($id)->OpticalServices()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $optical = optical::where('id', $id)->first();

        $optical_id = $id;
        

        try {

            if($districts)
            {
                return view('optical::optical_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'optical_id','optical','optical_products','optical_notices','optical_doctors','optical_services'));
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

    public function postInfoEditOptical(Request $request, $id)
    {
        $data = $request->all();

        $optical = Optical::find($id);

        try {


            if($request->hasFile('optical_photo'))
            {
                $file = $request->file('optical_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/optical',$new_file_name);

                if($success)
                {
                    $optical->optical_photo = $new_file_name;
                    $optical->photo_path = 'uploads/optical/'.$new_file_name;
                }
            }

            $optical->optical_name = $data['optical_name'];
            $optical->b_optical_name = $data['b_optical_name'];
            $optical->optical_subname = $data['optical_subname'];
            $optical->b_optical_subname = $data['b_optical_subname'];
            $optical->district_id = $data['district_id'];
            $optical->subdistrict_id = $data['subdistrict_id'];

            if($optical)
            {
                if($optical->update())
                {
                     return redirect('optical')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('optical')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('optical')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditOptical(Request $request, $id)
    {
        $data = $request->all();

        

        $optical = optical::find($id);

        try {

            $optical->optical_description    = $data['optical_description'];
            $optical->b_optical_description  = $data['b_optical_description'];
            $optical->optical_phone_no       = $data['optical_phone_no'];
            $optical->b_optical_phone_no     = $data['b_optical_phone_no'];
            $optical->optical_email_ad       = $data['optical_email_ad'];
            //$optical->optical_fb_link        = $data['optical_fb_link'];
            $optical->optical_web_link       = $data['optical_web_link'];
            $optical->total_medicine          = $data['total_medicine'];
            $optical->b_total_medicine        = $data['b_total_medicine'];
            $optical->optical_address        = $data['optical_address'];
            $optical->b_optical_address      = $data['b_optical_address'];
            $optical->optical_latitude        = $data['optical_latitude'];
            $optical->optical_longitude        = $data['optical_longitude'];

            if($optical->update())
            {
                return redirect('optical')
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('optical')
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } 

            catch (Exception $e) {
            
        }
    }

    public function deleteOptical($id)
    {
        $optical = Optical::find($id);

        try {

            if($optical)
            {
                if($optical->delete())
                {
                    return redirect('optical')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('optical')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('optical')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }


    public function getOpticalPhone($id)
    {

        $optical = optical::find($id);

        $phones = $optical->phones()->select('optical_phone_no')->get();

        return $phones;
    }

    public function getOpticalEmail($id)
    {

        $optical = optical::find($id);

        $emails = $optical->emails()->select('optical_email_ad')->get();

        return $emails;
    }

    public function getOpticalProduct($id)
    {

        $optical = optical::find($id);

        $emails = $optical->opticalProducts()->select('product_category_id')->get();

        return $emails;
    }
    

}
