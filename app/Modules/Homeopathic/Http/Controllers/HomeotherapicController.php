<?php

namespace App\Modules\Homeopathic\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Homeopathic;
use App\Models\HomeopathicPhone;
use App\Models\HomeopathicEmail;
use App\Models\HomeopathicDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\HomeopathicProduct;
use App\Models\HomeopathicService;
use App\Models\HomeopathicNotice;
use DB;

class HomeopathicController extends Controller
{
    public function index()
    {

        $pharmacies = Homeopathic::join('subdistrict','subdistrict.id','homeopathic.subdistrict_id')
                                        ->join('district','district.id','homeopathic.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(homeopathic.id ORDER BY subdistrict.sub_district_name) as homeopathic_id,
                                                        group_concat(homeopathic.homeopathic_name ORDER BY subdistrict.sub_district_name) as homeopathic_name,
                                                        group_concat(homeopathic.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(homeopathic.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_homeopathic = [];
        
       foreach($pharmacies as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["homeopathic_id"]);
           $names           = explode(",", $value["homeopathic_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_homeopathic[$i]['sub_district_name']      = $sub_districts[$key];
               $new_homeopathic[$i]['id']                     = $ids[$key];
               $new_homeopathic[$i]['homeopathic_name']     = $names[$key];
               $new_homeopathic[$i]['created_at']             = $careated_ats[$key];
               $new_homeopathic[$i]['updated_at']             = $updates_ats[$key];
               $new_homeopathic[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $pharmacies  = $new_homeopathic;
       
    	return view('homeopathic::homeopathic', compact('pharmacies'));
    }

    public function viewHomeopathic($homeopathic_id)
    {
        
        
        $homeopathic = Homeopathic::find($homeopathic_id);
        $phones = DB::table('homeopathic_phone')->where('homeopathic_id', $homeopathic_id)->get();
        $emails = DB::table('homeopathic_email')->where('homeopathic_id', $homeopathic_id)->get();

        //$productss = HomeopathicProduct::with('productCategory','productSubCategory')->where('homeopathic_id', $homeopathic_id)->get();
        $doctors = HomeopathicDoctor::with('medicalSpecialist','department')->where('homeopathic_id', $homeopathic_id)->get();
        $notices = HomeopathicNotice::where('homeopathic_id', $homeopathic_id)->get();
        $products = HomeopathicProduct::where('homeopathic_id', $homeopathic_id)->get();
        
      

        return view('homeopathic::homeopathic_view',compact('homeopathic_id','homeopathic','phones','emails','products','doctors','notices'));
    }

    public function viewAddHomeopathic()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('homeopathic::homeopathic_add', compact('districts','district_id'));
    }

    public function viewAddHomeopathicById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('homeopathic::homeopathic_add', compact('districts', 'subdistricts', 'district_id'));
    }
    
    public function postAddHomeopathic(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'homeopathic_name'   => 'required',
            'b_homeopathic_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $homeopathic = new Homeopathic;

        try {

            $homeopathic->homeopathic_name   = $data['homeopathic_name'];
            $homeopathic->b_homeopathic_name = $data['b_homeopathic_name'];
            $homeopathic->district_id     = $data['district_id'];
            $homeopathic->subdistrict_id  = $data['subdistrict_id'];

            if($homeopathic->save())
            {
                return redirect('homeopathic')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            
            else
            {
                return redirect('homeopathic')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditHomeopathic($id)
    {
        $selected_district    = Homeopathic::find($id)->district;
        $selected_subdistrict = Homeopathic::find($id)->subDistrict;

        $homeopathic_products    = Homeopathic::find($id)->homeopathicProducts()->get();
        $homeopathic_notices     = Homeopathic::find($id)->homeopathicNotices()->get();
        $homeopathic_doctors     = Homeopathic::find($id)->homeopathicDoctors()->get();
        $homeopathic_services    = Homeopathic::find($id)->HomeopathicServices()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $homeopathic = homeopathic::where('id', $id)->first();

        $homeopathic_id = $id;
        

        try {

            if($districts)
            {
                return view('homeopathic::homeopathic_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'homeopathic_id','homeopathic','homeopathic_products','homeopathic_notices','homeopathic_doctors','homeopathic_services'));
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

    public function postInfoEditHomeopathic(Request $request, $id)
    {
        $data = $request->all();

        $homeopathic = Homeopathic::find($id);

        try {


            if($request->hasFile('homeopathic_photo'))
            {
                $file = $request->file('homeopathic_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/homeopathic',$new_file_name);

                if($success)
                {
                    $homeopathic->homeopathic_photo = $new_file_name;
                    $homeopathic->photo_path = 'uploads/homeopathic/'.$new_file_name;
                }
            }

            $homeopathic->homeopathic_name = $data['homeopathic_name'];
            $homeopathic->b_homeopathic_name = $data['b_homeopathic_name'];
            $homeopathic->homeopathic_subname = $data['homeopathic_subname'];
            $homeopathic->b_homeopathic_subname = $data['b_homeopathic_subname'];
            $homeopathic->district_id = $data['district_id'];
            $homeopathic->subdistrict_id = $data['subdistrict_id'];

            if($homeopathic)
            {
                if($homeopathic->update())
                {
                     return redirect('homeopathic')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('homeopathic')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('homeopathic')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditHomeopathic(Request $request, $id)
    {
        $data = $request->all();

        

        $homeopathic = homeopathic::find($id);

        try {

            $homeopathic->homeopathic_description    = $data['homeopathic_description'];
            $homeopathic->b_homeopathic_description  = $data['b_homeopathic_description'];
            $homeopathic->homeopathic_phone_no       = $data['homeopathic_phone_no'];
            $homeopathic->b_homeopathic_phone_no     = $data['b_homeopathic_phone_no'];
            $homeopathic->homeopathic_email_ad       = $data['homeopathic_email_ad'];
            //$homeopathic->homeopathic_fb_link        = $data['homeopathic_fb_link'];
            $homeopathic->homeopathic_web_link       = $data['homeopathic_web_link'];
            $homeopathic->total_medicine             = $data['total_medicine'];
            $homeopathic->b_total_medicine          = $data['b_total_medicine'];
            $homeopathic->homeopathic_address        = $data['homeopathic_address'];
            $homeopathic->b_homeopathic_address      = $data['b_homeopathic_address'];
            $homeopathic->homeopathic_latitude       = $data['homeopathic_latitude'];
            $homeopathic->homeopathic_longitude      = $data['homeopathic_longitude'];

            if($homeopathic->update())
            {
                return redirect('homeopathic')
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('homeopathic')
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } 

            catch (Exception $e) {
            
        }
    }

    public function deleteHomeopathic($id)
    {
        $homeopathic = Homeopathic::find($id);

        try {

            if($homeopathic)
            {
                if($homeopathic->delete())
                {
                    return redirect('homeopathic')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('homeopathic')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('homeopathic')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }


    public function getHomeopathicPhone($id)
    {

        $homeopathic = homeopathic::find($id);

        $phones = $homeopathic->phones()->select('homeopathic_phone_no')->get();

        return $phones;
    }

    public function getHomeopathicEmail($id)
    {

        $homeopathic = homeopathic::find($id);

        $emails = $homeopathic->emails()->select('homeopathic_email_ad')->get();

        return $emails;
    }

    public function getHomeopathicProduct($id)
    {

        $homeopathic = homeopathic::find($id);

        $emails = $homeopathic->homeopathicProducts()->select('product_category_id')->get();

        return $emails;
    }
    

}
