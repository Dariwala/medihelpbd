<?php

namespace App\Modules\Eyebank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EyeBank;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\EyeBankPhone;
use App\Models\EyeBankEmail;
use App\Models\EyeBankService;
use App\Models\EyeBankNotice;
use App\Models\EyeBankDoctor;
use App\Models\MedicalSpecialist;
use DB;

class EyeBankController extends Controller
{
    public function index()
    {
        $eye_banks = EyeBank::join('subdistrict','subdistrict.id','eye_bank.subdistrict_id')
                                        ->join('district','district.id','eye_bank.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(eye_bank.id ORDER BY subdistrict.sub_district_name) as eye_bank_id,
                                                        group_concat(eye_bank.eye_bank_name ORDER BY subdistrict.sub_district_name) as eye_bank_name,
                                                        group_concat(eye_bank.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(eye_bank.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_eye_bank = [];
        
       foreach($eye_banks as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["eye_bank_id"]);
           $names           = explode(",", $value["eye_bank_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_eye_bank[$i]['sub_district_name']      = $sub_districts[$key];
               $new_eye_bank[$i]['id']                     = $ids[$key];
               $new_eye_bank[$i]['eye_bank_name']     = $names[$key];
               $new_eye_bank[$i]['created_at']             = $careated_ats[$key];
               $new_eye_bank[$i]['updated_at']             = $updates_ats[$key];
               $new_eye_bank[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $eye_banks  = $new_eye_bank;
       
    	return view('eyebank::eye_bank', compact('eye_banks'));
    }

    public function viewEyeBank($eye_bank_id)
    {
        $eye_bank   = Eyebank::find($eye_bank_id);
        $phones     = DB::table('eye_bank_phone')->where('eye_bank_id', $eye_bank_id)->get();
        $emails     = DB::table('eye_bank_email')->where('eye_bank_id', $eye_bank_id)->get();
        $services   = EyebankService::with('service','SubService')->where('eye_bank_id', $eye_bank_id)->get();

        $notices = EyeBankNotice::where('eye_bank_id', $eye_bank_id)->get();

        return view('eyebank::eye_bank_view',compact('eye_bank','eye_bank_id','phones','emails','services','notices'));
    }

   public function viewAddEyeBank()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('eyebank::eye_bank_add', compact('districts','district_id'));
    }

    public function viewAddEyeBankById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('eyebank::eye_bank_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddEyeBank(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'eye_bank_name'   => 'required',
            'b_eye_bank_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $eye_bank = new EyeBank;

        try {

            $eye_bank->eye_bank_name   = $data['eye_bank_name'];
            $eye_bank->b_eye_bank_name = $data['b_eye_bank_name'];
            $eye_bank->district_id     = $data['district_id'];
            $eye_bank->subdistrict_id  = $data['subdistrict_id'];

            if($eye_bank->save())
            {
                return redirect('eye-bank')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('eye-bank')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditInfoEyeBank($id)
    {
    	
        $selected_district    = EyeBank::find($id)->district;
        $selected_subdistrict = EyeBank::find($id)->subDistrict;

        $eye_bank_services = EyeBank::find($id)->eyeBankServices()->get();
        $eye_bank_notices = EyeBank::find($id)->eyeBankNotices()->get();
        $eye_bank_doctors = EyeBank::find($id)->eyeBankDoctors()->get();

        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $eye_bank = EyeBank::where('id', $id)->first();

        $eye_bank_id = $id;
        

        try {

            if($districts)
            {
                return view('eyebank::eye_bank_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'eye_bank_id','eye_bank','eye_bank_notices','eye_bank_services','eye_bank_doctors'));
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

    public function postInfoEditEyeBank(Request $request , $id)
    {


        $data = $request->all();

        

        $eye_bank = EyeBank::find($id);

        try {


            if($request->hasFile('eye_bank_photo'))
            {
                $file = $request->file('eye_bank_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/eye_bank',$new_file_name);

                if($success)
                {
                    $eye_bank->eye_bank_photo = $new_file_name;
                    $eye_bank->photo_path = 'uploads/eye_bank/'.$new_file_name;
                }
            }

            $eye_bank->eye_bank_name = $data['eye_bank_name'];
            $eye_bank->b_eye_bank_name = $data['b_eye_bank_name'];
            $eye_bank->eye_bank_subname = $data['eye_bank_subname'];
            $eye_bank->b_eye_bank_subname = $data['b_eye_bank_subname'];
            $eye_bank->district_id = $data['district_id'];
            $eye_bank->subdistrict_id = $data['subdistrict_id'];

            if($eye_bank)
            {
                if($eye_bank->update())
                {
                     return redirect('eye-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('eye-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('eye-bank/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditEyeBank(Request $request , $id)
    {

        $data = $request->all();

        

        $eye_bank = EyeBank::find($id);

        try {

            $eye_bank->eye_bank_address             = $data['eye_bank_address'];
            $eye_bank->b_eye_bank_address           = $data['b_eye_bank_address'];
            $eye_bank->eye_bank_phone_no            = $data['eye_bank_phone_no'];
            $eye_bank->b_eye_bank_phone_no          = $data['b_eye_bank_phone_no'];
            $eye_bank->eye_bank_email_ad            = $data['eye_bank_email_ad'];
            $eye_bank->total_eye                    = $data['total_eye'];
            $eye_bank->b_total_eye                  = $data['b_total_eye'];
            $eye_bank->eye_bank_description         = $data['eye_bank_description'];
            $eye_bank->b_eye_bank_description       = $data['b_eye_bank_description'];
            $eye_bank->eye_bank_web_link            = $data['eye_bank_web_link'];
            $eye_bank->eye_bank_latitude            = $data['eye_bank_latitude'];
            $eye_bank->eye_bank_longitude           = $data['eye_bank_longitude'];
           // $eye_bank->eye_bank_fb_link             = $data['eye_bank_fb_link'];

            if($eye_bank)
            {
                if($eye_bank->update())
                {
                     return redirect('eye-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('eye-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('eye-bank/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function deleteEyeBank($id)
    {
        $eye_bank = EyeBank::find($id);

        try {

            if($eye_bank)
            {
                if($eye_bank->delete())
                {
                    return redirect('eye-bank')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('eye-bank')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('eye-bank')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getEyeBankPhone($id)
    {

        $eye_bank = EyeBank::find($id);

        $phones = $eye_bank->phones()->select('eye_bank_phone_no')->get();

        return $phones;
    }

    public function getEyeBankEmail($id)
    {

        $eye_bank = EyeBank::find($id);

        $emails = $eye_bank->emails()->select('eye_bank_email_ad')->get();

        return $emails;
    }

    public function getEyeBankDoctor($medical_specialist_id,$eye_bank_id)
    {

        $doctor_ids = EyeBankDoctor::where('eye_bank_id', $eye_bank_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();
        
        return $doctors;
    }

}
