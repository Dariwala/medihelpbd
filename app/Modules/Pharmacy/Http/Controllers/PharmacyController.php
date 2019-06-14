<?php

namespace App\Modules\Pharmacy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Pharmacy;
use App\Models\PharmacyPhone;
use App\Models\PharmacyEmail;
use App\Models\PharmacyDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\PharmacyProduct;
use App\Models\PharmacyService;
use App\Models\PharmacyNotice;
use DB;

class PharmacyController extends Controller
{
    public function index()
    {

        $pharmacies = Pharmacy::join('subdistrict','subdistrict.id','pharmacy.subdistrict_id')
                                        ->join('district','district.id','pharmacy.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(pharmacy.id ORDER BY subdistrict.sub_district_name) as pharmacy_id,
                                                        group_concat(pharmacy.pharmacy_name ORDER BY subdistrict.sub_district_name) as pharmacy_name,
                                                        group_concat(pharmacy.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(pharmacy.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_pharmacy = [];
        
       foreach($pharmacies as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["pharmacy_id"]);
           $names           = explode(",", $value["pharmacy_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_pharmacy[$i]['sub_district_name']      = $sub_districts[$key];
               $new_pharmacy[$i]['id']                     = $ids[$key];
               $new_pharmacy[$i]['pharmacy_name']     = $names[$key];
               $new_pharmacy[$i]['created_at']             = $careated_ats[$key];
               $new_pharmacy[$i]['updated_at']             = $updates_ats[$key];
               $new_pharmacy[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $pharmacies  = $new_pharmacy;
       
    	return view('pharmacy::pharmacy', compact('pharmacies'));
    }

    public function viewPharmacy($pharmacy_id)
    {
        
        
        $pharmacy = Pharmacy::find($pharmacy_id);
        $phones = DB::table('pharmacy_phone')->where('pharmacy_id', $pharmacy_id)->get();
        $emails = DB::table('pharmacy_email')->where('pharmacy_id', $pharmacy_id)->get();

        //$productss = PharmacyProduct::with('productCategory','productSubCategory')->where('pharmacy_id', $pharmacy_id)->get();
        $doctors = PharmacyDoctor::with('medicalSpecialist','department')->where('pharmacy_id', $pharmacy_id)->get();
        $notices = PharmacyNotice::where('pharmacy_id', $pharmacy_id)->get();
        $products = PharmacyProduct::where('pharmacy_id', $pharmacy_id)->get();
        
      

        return view('pharmacy::pharmacy_view',compact('pharmacy_id','pharmacy','phones','emails','products','doctors','notices'));
    }

    public function viewAddPharmacy()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('pharmacy::pharmacy_add', compact('districts','district_id'));
    }

    public function viewAddPharmacyById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('pharmacy::pharmacy_add', compact('districts', 'subdistricts', 'district_id'));
    }
    
    public function postAddPharmacy(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'pharmacy_name'   => 'required',
            'b_pharmacy_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $pharmacy = new Pharmacy;

        try {

            $pharmacy->pharmacy_name   = $data['pharmacy_name'];
            $pharmacy->b_pharmacy_name = $data['b_pharmacy_name'];
            $pharmacy->district_id     = $data['district_id'];
            $pharmacy->subdistrict_id  = $data['subdistrict_id'];

            if($pharmacy->save())
            {
                return redirect('pharmacy')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            
            else
            {
                return redirect('pharmacy')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditPharmacy($id)
    {
        $selected_district    = Pharmacy::find($id)->district;
        $selected_subdistrict = Pharmacy::find($id)->subDistrict;

        $pharmacy_products    = Pharmacy::find($id)->pharmacyProducts()->get();
        $pharmacy_notices     = Pharmacy::find($id)->pharmacyNotices()->get();
        $pharmacy_doctors     = Pharmacy::find($id)->pharmacyDoctors()->get();
        $pharmacy_services    = Pharmacy::find($id)->PharmacyServices()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $pharmacy = pharmacy::where('id', $id)->first();

        $pharmacy_id = $id;
        

        try {

            if($districts)
            {
                return view('pharmacy::pharmacy_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'pharmacy_id','pharmacy','pharmacy_products','pharmacy_notices','pharmacy_doctors','pharmacy_services'));
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

    public function postInfoEditPharmacy(Request $request, $id)
    {
        $data = $request->all();

        $pharmacy = Pharmacy::find($id);

        try {


            if($request->hasFile('pharmacy_photo'))
            {
                $file = $request->file('pharmacy_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/pharmacy',$new_file_name);

                if($success)
                {
                    $pharmacy->pharmacy_photo = $new_file_name;
                    $pharmacy->photo_path = 'uploads/pharmacy/'.$new_file_name;
                }
            }

            $pharmacy->pharmacy_name = $data['pharmacy_name'];
            $pharmacy->b_pharmacy_name = $data['b_pharmacy_name'];
            $pharmacy->pharmacy_subname = $data['pharmacy_subname'];
            $pharmacy->b_pharmacy_subname = $data['b_pharmacy_subname'];
            $pharmacy->district_id = $data['district_id'];
            $pharmacy->subdistrict_id = $data['subdistrict_id'];

            if($pharmacy)
            {
                if($pharmacy->update())
                {
                     return redirect('pharmacy')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacy')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('pharmacy')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditPharmacy(Request $request, $id)
    {
        $data = $request->all();

        

        $pharmacy = pharmacy::find($id);

        try {

            $pharmacy->pharmacy_description    = $data['pharmacy_description'];
            $pharmacy->b_pharmacy_description  = $data['b_pharmacy_description'];
            $pharmacy->pharmacy_phone_no       = $data['pharmacy_phone_no'];
            $pharmacy->b_pharmacy_phone_no     = $data['b_pharmacy_phone_no'];
            $pharmacy->pharmacy_email_ad       = $data['pharmacy_email_ad'];
            //$pharmacy->pharmacy_fb_link        = $data['pharmacy_fb_link'];
            $pharmacy->pharmacy_web_link       = $data['pharmacy_web_link'];
            $pharmacy->total_medicine          = $data['total_medicine'];
            $pharmacy->b_total_medicine        = $data['b_total_medicine'];
            $pharmacy->pharmacy_address        = $data['pharmacy_address'];
            $pharmacy->b_pharmacy_address      = $data['b_pharmacy_address'];
            $pharmacy->pharmacy_latitude       = $data['pharmacy_latitude'];
            $pharmacy->pharmacy_longitude      = $data['pharmacy_longitude'];

            if($pharmacy->update())
            {
                return redirect('pharmacy')
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('pharmacy')
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } 

            catch (Exception $e) {
            
        }
    }

    public function deletePharmacy($id)
    {
        $pharmacy = Pharmacy::find($id);

        try {

            if($pharmacy)
            {
                if($pharmacy->delete())
                {
                    return redirect('pharmacy')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacy')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('pharmacy')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }


    public function getPharmacyPhone($id)
    {

        $pharmacy = pharmacy::find($id);

        $phones = $pharmacy->phones()->select('pharmacy_phone_no')->get();

        return $phones;
    }

    public function getPharmacyEmail($id)
    {

        $pharmacy = pharmacy::find($id);

        $emails = $pharmacy->emails()->select('pharmacy_email_ad')->get();

        return $emails;
    }

    public function getPharmacyProduct($id)
    {

        $pharmacy = pharmacy::find($id);

        $emails = $pharmacy->pharmacyProducts()->select('product_category_id')->get();

        return $emails;
    }
    

}
