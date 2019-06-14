<?php

namespace App\Modules\Pharmacynew\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pharmacynew;
use App\Models\PharmacynewPhone;
use App\Models\PharmacynewEmail;
use App\Models\PharmacynewDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PharmacynewProduct;
use App\Models\PharmacynewService;
use App\Models\PharmacynewNotice;
use DB;

class PharmacynewController extends Controller
{
    public function index()
    {

        $pharmacies = Pharmacynew::join('subdistrict','subdistrict.id','pharmacynew.subdistrict_id')
                                        ->join('district','district.id','pharmacynew.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(pharmacynew.id ORDER BY subdistrict.sub_district_name) as pharmacynew_id,
                                                        group_concat(pharmacynew.pharmacynew_name ORDER BY subdistrict.sub_district_name) as pharmacynew_name,
                                                        group_concat(pharmacynew.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(pharmacynew.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_pharmacynew = [];
        
       foreach($pharmacies as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["pharmacynew_id"]);
           $names           = explode(",", $value["pharmacynew_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_pharmacynew[$i]['sub_district_name']      = $sub_districts[$key];
               $new_pharmacynew[$i]['id']                     = $ids[$key];
               $new_pharmacynew[$i]['pharmacynew_name']     = $names[$key];
               $new_pharmacynew[$i]['created_at']             = $careated_ats[$key];
               $new_pharmacynew[$i]['updated_at']             = $updates_ats[$key];
               $new_pharmacynew[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $pharmacies  = $new_pharmacynew;
       
    	return view('pharmacynew::pharmacynew', compact('pharmacies'));
    }

    public function viewPharmacynew($pharmacynew_id)
    {
        
        
        $pharmacynew = Pharmacynew::find($pharmacynew_id);
        $phones = DB::table('pharmacynew_phone')->where('pharmacynew_id', $pharmacynew_id)->get();
        $emails = DB::table('pharmacynew_email')->where('pharmacynew_id', $pharmacynew_id)->get();

        //$productss = PharmacynewProduct::with('productCategory','productSubCategory')->where('pharmacynew_id', $pharmacynew_id)->get();
        $doctors = PharmacynewDoctor::with('medicalSpecialist','department')->where('pharmacynew_id', $pharmacynew_id)->get();
        $notices = PharmacynewNotice::where('pharmacynew_id', $pharmacynew_id)->get();
        $products = PharmacynewProduct::where('pharmacynew_id', $pharmacynew_id)->get();
        
      

        return view('pharmacynew::pharmacynew_view',compact('pharmacynew_id','pharmacynew','phones','emails','products','doctors','notices'));
    }

    public function viewAddPharmacynew()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('pharmacynew::pharmacynew_add', compact('districts','district_id'));
    }

    public function viewAddPharmacynewById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('pharmacynew::pharmacynew_add', compact('districts', 'subdistricts', 'district_id'));
    }
    
    public function postAddPharmacynew(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'pharmacynew_name'   => 'required',
            'b_pharmacynew_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $pharmacynew = new Pharmacynew;

        try {

            $pharmacynew->pharmacynew_name   = $data['pharmacynew_name'];
            $pharmacynew->b_pharmacynew_name = $data['b_pharmacynew_name'];
            $pharmacynew->district_id     = $data['district_id'];
            $pharmacynew->subdistrict_id  = $data['subdistrict_id'];

            if($pharmacynew->save())
            {
                return redirect('pharmacynew')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            
            else
            {
                return redirect('pharmacynew')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditPharmacynew($id)
    {
        $selected_district    = Pharmacynew::find($id)->district;
        $selected_subdistrict = Pharmacynew::find($id)->subDistrict;

        $pharmacynew_products    = Pharmacynew::find($id)->pharmacynewProducts()->get();
        $pharmacynew_notices     = Pharmacynew::find($id)->pharmacynewNotices()->get();
        $pharmacynew_doctors     = Pharmacynew::find($id)->pharmacynewDoctors()->get();
        $pharmacynew_services    = Pharmacynew::find($id)->PharmacynewServices()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $pharmacynew = pharmacynew::where('id', $id)->first();

        $pharmacynew_id = $id;
        

        try {

            if($districts)
            {
                return view('pharmacynew::pharmacynew_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'pharmacynew_id','pharmacynew','pharmacynew_products','pharmacynew_notices','pharmacynew_doctors','pharmacynew_services'));
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

    public function postInfoEditPharmacynew(Request $request, $id)
    {
        $data = $request->all();

        $pharmacynew = Pharmacynew::find($id);

        try {


            if($request->hasFile('pharmacynew_photo'))
            {
                $file = $request->file('pharmacynew_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/pharmacynew',$new_file_name);

                if($success)
                {
                    $pharmacynew->pharmacynew_photo = $new_file_name;
                    $pharmacynew->photo_path = 'uploads/pharmacynew/'.$new_file_name;
                }
            }

            $pharmacynew->pharmacynew_name = $data['pharmacynew_name'];
            $pharmacynew->b_pharmacynew_name = $data['b_pharmacynew_name'];
            $pharmacynew->pharmacynew_subname = $data['pharmacynew_subname'];
            $pharmacynew->b_pharmacynew_subname = $data['b_pharmacynew_subname'];
            $pharmacynew->district_id = $data['district_id'];
            $pharmacynew->subdistrict_id = $data['subdistrict_id'];

            if($pharmacynew)
            {
                if($pharmacynew->update())
                {
                     return redirect('pharmacynew')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacynew')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('pharmacynew')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditPharmacynew(Request $request, $id)
    {
        $data = $request->all();

        

        $pharmacynew = pharmacynew::find($id);

        try {

            $pharmacynew->pharmacynew_description    = $data['pharmacynew_description'];
            $pharmacynew->b_pharmacynew_description  = $data['b_pharmacynew_description'];
            $pharmacynew->pharmacynew_phone_no       = $data['pharmacynew_phone_no'];
            $pharmacynew->b_pharmacynew_phone_no     = $data['b_pharmacynew_phone_no'];
            $pharmacynew->pharmacynew_email_ad       = $data['pharmacynew_email_ad'];
            //$pharmacynew->pharmacynew_fb_link        = $data['pharmacynew_fb_link'];
            $pharmacynew->pharmacynew_web_link       = $data['pharmacynew_web_link'];
            $pharmacynew->total_medicine          = $data['total_medicine'];
            $pharmacynew->b_total_medicine        = $data['b_total_medicine'];
            $pharmacynew->pharmacynew_address        = $data['pharmacynew_address'];
            $pharmacynew->b_pharmacynew_address      = $data['b_pharmacynew_address'];

            if($pharmacynew->update())
            {
                return redirect('pharmacynew')
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('pharmacynew')
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } 

            catch (Exception $e) {
            
        }
    }

    public function deletePharmacynew($id)
    {
        $pharmacynew = Pharmacynew::find($id);

        try {

            if($pharmacynew)
            {
                if($pharmacynew->delete())
                {
                    return redirect('pharmacynew')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacynew')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('pharmacynew')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }


    public function getPharmacynewPhone($id)
    {

        $pharmacynew = pharmacynew::find($id);

        $phones = $pharmacynew->phones()->select('pharmacynew_phone_no')->get();

        return $phones;
    }

    public function getPharmacynewEmail($id)
    {

        $pharmacynew = pharmacynew::find($id);

        $emails = $pharmacynew->emails()->select('pharmacynew_email_ad')->get();

        return $emails;
    }

    public function getPharmacynewProduct($id)
    {

        $pharmacynew = pharmacynew::find($id);

        $emails = $pharmacynew->pharmacynewProducts()->select('product_category_id')->get();

        return $emails;
    }
    

}
