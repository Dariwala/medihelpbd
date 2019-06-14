<?php

namespace App\Modules\Physiotherapy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Physiotherapy;
use App\Models\PhysiotherapyPhone;
use App\Models\PhysiotherapyEmail;
use App\Models\PhysiotherapyDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PhysiotherapyProduct;
use App\Models\PhysiotherapyService;
use App\Models\PhysiotherapyNotice;
use DB;

class PhysiotherapyController extends Controller
{
    public function index()
    {

        $pharmacies = Physiotherapy::join('subdistrict','subdistrict.id','physiotherapy.subdistrict_id')
                                        ->join('district','district.id','physiotherapy.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(physiotherapy.id ORDER BY subdistrict.sub_district_name) as physiotherapy_id,
                                                        group_concat(physiotherapy.physiotherapy_name ORDER BY subdistrict.sub_district_name) as physiotherapy_name,
                                                        group_concat(physiotherapy.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(physiotherapy.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_physiotherapy = [];
        
       foreach($pharmacies as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["physiotherapy_id"]);
           $names           = explode(",", $value["physiotherapy_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_physiotherapy[$i]['sub_district_name']      = $sub_districts[$key];
               $new_physiotherapy[$i]['id']                     = $ids[$key];
               $new_physiotherapy[$i]['physiotherapy_name']     = $names[$key];
               $new_physiotherapy[$i]['created_at']             = $careated_ats[$key];
               $new_physiotherapy[$i]['updated_at']             = $updates_ats[$key];
               $new_physiotherapy[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $pharmacies  = $new_physiotherapy;
       
    	return view('physiotherapy::physiotherapy', compact('pharmacies'));
    }

    public function viewPhysiotherapy($physiotherapy_id)
    {
        
        
        $physiotherapy = Physiotherapy::find($physiotherapy_id);
        $phones = DB::table('physiotherapy_phone')->where('physiotherapy_id', $physiotherapy_id)->get();
        $emails = DB::table('physiotherapy_email')->where('physiotherapy_id', $physiotherapy_id)->get();

        //$productss = PhysiotherapyProduct::with('productCategory','productSubCategory')->where('physiotherapy_id', $physiotherapy_id)->get();
        $doctors = PhysiotherapyDoctor::with('medicalSpecialist','department')->where('physiotherapy_id', $physiotherapy_id)->get();
        $notices = PhysiotherapyNotice::where('physiotherapy_id', $physiotherapy_id)->get();
        $products = PhysiotherapyProduct::where('physiotherapy_id', $physiotherapy_id)->get();
        
      

        return view('physiotherapy::physiotherapy_view',compact('physiotherapy_id','physiotherapy','phones','emails','products','doctors','notices'));
    }

    public function viewAddPhysiotherapy()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('physiotherapy::physiotherapy_add', compact('districts','district_id'));
    }

    public function viewAddPhysiotherapyById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('physiotherapy::physiotherapy_add', compact('districts', 'subdistricts', 'district_id'));
    }
    
    public function postAddPhysiotherapy(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'physiotherapy_name'   => 'required',
            'b_physiotherapy_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $physiotherapy = new Physiotherapy;

        try {

            $physiotherapy->physiotherapy_name   = $data['physiotherapy_name'];
            $physiotherapy->b_physiotherapy_name = $data['b_physiotherapy_name'];
            $physiotherapy->district_id     = $data['district_id'];
            $physiotherapy->subdistrict_id  = $data['subdistrict_id'];

            if($physiotherapy->save())
            {
                return redirect('physiotherapy')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            
            else
            {
                return redirect('physiotherapy')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditPhysiotherapy($id)
    {
        $selected_district    = Physiotherapy::find($id)->district;
        $selected_subdistrict = Physiotherapy::find($id)->subDistrict;

        $physiotherapy_products    = Physiotherapy::find($id)->physiotherapyProducts()->get();
        $physiotherapy_notices     = Physiotherapy::find($id)->physiotherapyNotices()->get();
        $physiotherapy_doctors     = Physiotherapy::find($id)->physiotherapyDoctors()->get();
        $physiotherapy_services    = Physiotherapy::find($id)->PhysiotherapyServices()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $physiotherapy = physiotherapy::where('id', $id)->first();

        $physiotherapy_id = $id;
        

        try {

            if($districts)
            {
                return view('physiotherapy::physiotherapy_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'physiotherapy_id','physiotherapy','physiotherapy_products','physiotherapy_notices','physiotherapy_doctors','physiotherapy_services'));
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

    public function postInfoEditPhysiotherapy(Request $request, $id)
    {
        $data = $request->all();

        $physiotherapy = Physiotherapy::find($id);

        try {


            if($request->hasFile('physiotherapy_photo'))
            {
                $file = $request->file('physiotherapy_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/physiotherapy',$new_file_name);

                if($success)
                {
                    $physiotherapy->physiotherapy_photo = $new_file_name;
                    $physiotherapy->photo_path = 'uploads/physiotherapy/'.$new_file_name;
                }
            }

            $physiotherapy->physiotherapy_name = $data['physiotherapy_name'];
            $physiotherapy->b_physiotherapy_name = $data['b_physiotherapy_name'];
            $physiotherapy->physiotherapy_subname = $data['physiotherapy_subname'];
            $physiotherapy->b_physiotherapy_subname = $data['b_physiotherapy_subname'];
            $physiotherapy->district_id = $data['district_id'];
            $physiotherapy->subdistrict_id = $data['subdistrict_id'];

            if($physiotherapy)
            {
                if($physiotherapy->update())
                {
                     return redirect('physiotherapy')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('physiotherapy')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('physiotherapy')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditPhysiotherapy(Request $request, $id)
    {
        $data = $request->all();

        

        $physiotherapy = physiotherapy::find($id);

        try {

            $physiotherapy->physiotherapy_description    = $data['physiotherapy_description'];
            $physiotherapy->b_physiotherapy_description  = $data['b_physiotherapy_description'];
            $physiotherapy->physiotherapy_phone_no       = $data['physiotherapy_phone_no'];
            $physiotherapy->b_physiotherapy_phone_no     = $data['b_physiotherapy_phone_no'];
            $physiotherapy->physiotherapy_email_ad       = $data['physiotherapy_email_ad'];
            //$physiotherapy->physiotherapy_fb_link        = $data['physiotherapy_fb_link'];
            $physiotherapy->physiotherapy_web_link       = $data['physiotherapy_web_link'];
            $physiotherapy->total_medicine          = $data['total_medicine'];
            $physiotherapy->b_total_medicine        = $data['b_total_medicine'];
            $physiotherapy->physiotherapy_address        = $data['physiotherapy_address'];
            $physiotherapy->b_physiotherapy_address      = $data['b_physiotherapy_address'];
            $physiotherapy->physiotherapy_latitude        = $data['physiotherapy_latitude'];
            $physiotherapy->physiotherapy_longitude        = $data['physiotherapy_longitude'];

            if($physiotherapy->update())
            {
                return redirect('physiotherapy')
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('physiotherapy')
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } 

            catch (Exception $e) {
            
        }
    }

    public function deletePhysiotherapy($id)
    {
        $physiotherapy = Physiotherapy::find($id);

        try {

            if($physiotherapy)
            {
                if($physiotherapy->delete())
                {
                    return redirect('physiotherapy')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('physiotherapy')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('physiotherapy')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }


    public function getPhysiotherapyPhone($id)
    {

        $physiotherapy = physiotherapy::find($id);

        $phones = $physiotherapy->phones()->select('physiotherapy_phone_no')->get();

        return $phones;
    }

    public function getPhysiotherapyEmail($id)
    {

        $physiotherapy = physiotherapy::find($id);

        $emails = $physiotherapy->emails()->select('physiotherapy_email_ad')->get();

        return $emails;
    }

    public function getPhysiotherapyProduct($id)
    {

        $physiotherapy = physiotherapy::find($id);

        $emails = $physiotherapy->physiotherapyProducts()->select('product_category_id')->get();

        return $emails;
    }
    

}
