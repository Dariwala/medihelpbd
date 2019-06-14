<?php

namespace App\Modules\Bloodbank\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BloodBank as Bloodbank;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\BloodBankPhone;
use App\Models\BloodBankEmail;
use App\Models\BloodBankService;
use App\Models\BloodBankNotice;
use App\Models\BloodBankDoctor;
use App\Models\MedicalSpecialist;
use DB;

class BloodBankController extends Controller
{
    public function index()
    {
        $blood_banks = Bloodbank::join('subdistrict','subdistrict.id','blood_bank.subdistrict_id')
                                        ->join('district','district.id','blood_bank.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(blood_bank.id ORDER BY subdistrict.sub_district_name) as blood_bank_id,
                                                        group_concat(blood_bank.blood_bank_name ORDER BY subdistrict.sub_district_name) as blood_bank_name,
                                                        group_concat(blood_bank.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(blood_bank.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_blood_bank = [];
        
       foreach($blood_banks as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["blood_bank_id"]);
           $names           = explode(",", $value["blood_bank_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_blood_bank[$i]['sub_district_name']      = $sub_districts[$key];
               $new_blood_bank[$i]['id']                     = $ids[$key];
               $new_blood_bank[$i]['blood_bank_name']     = $names[$key];
               $new_blood_bank[$i]['created_at']             = $careated_ats[$key];
               $new_blood_bank[$i]['updated_at']             = $updates_ats[$key];
               $new_blood_bank[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $blood_banks  = $new_blood_bank;

        return view('bloodbank::blood_bank', compact('blood_banks'));
    }

    public function viewBloodBank($blood_bank_id)
    {
        $blood_bank = Bloodbank::find($blood_bank_id);
        $phones     = DB::table('blood_bank_phone')->where('blood_bank_id', $blood_bank_id)->get();
        $emails     = DB::table('blood_bank_email')->where('blood_bank_id', $blood_bank_id)->get();
        $services   = BloodbankService::with('service','SubService')->where('blood_bank_id', $blood_bank_id)->get();
        $doctors = BloodbankDoctor::with('medicalSpecialist','department')->where('blood_bank_id', $blood_bank_id)->get();

        $notices = BloodBankNotice::where('blood_bank_id', $blood_bank_id)->get();

        return view('bloodbank::blood_bank_view',compact('blood_bank','blood_bank_id','phones','emails','services','doctors','notices'));
    }

   public function viewAddBloodBank()
    {

        $districts = District::all();
        $district_id = 0;

        return view('bloodbank::blood_bank_add', compact('districts','district_id'));
    }

    public function viewAddBloodBankById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('bloodbank::blood_bank_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddBloodBank(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $blood_bank = new Bloodbank;

        try {

            $blood_bank->blood_bank_name   = $data['blood_bank_name'];
            $blood_bank->b_blood_bank_name = $data['b_blood_bank_name'];
            $blood_bank->district_id     = $data['district_id'];
            $blood_bank->subdistrict_id  = $data['subdistrict_id'];

            if($blood_bank->save())
            {
                return redirect('blood-bank')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('blood-bank')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditInfoBloodBank($id)
    {
        
        $selected_district    = Bloodbank::find($id)->district;
        $selected_subdistrict = Bloodbank::find($id)->subDistrict;

        $blood_bank_services = Bloodbank::find($id)->bloodBankServices()->get();
        $blood_bank_notices = Bloodbank::find($id)->bloodBankNotices()->get();

        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();
        $blood_bank_doctors  = Bloodbank::find($id)->bloodBankDoctors()->get();


        $districts = District::all();

        $blood_bank = Bloodbank::where('id', $id)->first();

        $blood_bank_id = $id;
        

        try {

            if($districts)
            {
                return view('bloodbank::blood_bank_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'blood_bank_id','blood_bank','blood_bank_notices','blood_bank_doctors','blood_bank_services'));
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

    public function postInfoEditBloodBank(Request $request , $id)
    {


        $data = $request->all();

        

        $blood_bank = BloodBank::find($id);

        try {


            if($request->hasFile('blood_bank_photo'))
            {
                $file = $request->file('blood_bank_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/blood_bank',$new_file_name);

                if($success)
                {
                    $blood_bank->blood_bank_photo = $new_file_name;
                    $blood_bank->photo_path = 'uploads/blood_bank/'.$new_file_name;
                }
            }

            $blood_bank->blood_bank_name = $data['blood_bank_name'];
            $blood_bank->b_blood_bank_name = $data['b_blood_bank_name'];
            $blood_bank->blood_bank_subname = $data['blood_bank_subname'];
            $blood_bank->b_blood_bank_subname = $data['b_blood_bank_subname'];
            $blood_bank->district_id = $data['district_id'];
            $blood_bank->subdistrict_id = $data['subdistrict_id'];

            if($blood_bank)
            {
                if($blood_bank->update())
                {
                     return redirect('blood-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('blood-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('blood-bank/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditBloodBank(Request $request , $id)
    {

        $data = $request->all();



        $blood_bank = BloodBank::find($id);

        try {

            $blood_bank->blood_bank_address                  = $data['blood_bank_address'];
            $blood_bank->b_blood_bank_address                = $data['b_blood_bank_address'];
            $blood_bank->blood_bank_phone_no                 = $data['blood_bank_phone_no'];
            $blood_bank->b_blood_bank_phone_no               = $data['b_blood_bank_phone_no'];
            $blood_bank->blood_bank_email_ad                 = $data['blood_bank_email_ad'];
            $blood_bank->blood_group_details                 = $data['blood_group_details'];
            $blood_bank->b_blood_group_details               = $data['b_blood_group_details'];
            $blood_bank->blood_bank_description              = $data['blood_bank_description'];
            $blood_bank->b_blood_bank_description            = $data['b_blood_bank_description'];
            $blood_bank->blood_bank_fb_link                  = $data['blood_bank_fb_link'];
            $blood_bank->blood_bank_latitude                 = $data['blood_bank_latitude'];
            $blood_bank->blood_bank_longitude                = $data['blood_bank_longitude'];

            if($blood_bank)
            {
                if($blood_bank->update())
                {
                     return redirect('blood-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('blood-bank/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('blood-bank/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function deleteBloodBank($id)
    {
        $blood_bank = BloodBank::find($id);

        try {

            if($blood_bank)
            {
                if($blood_bank->delete())
                {
                    return redirect('blood-bank')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('blood-bank')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('blood-bank')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getBloodBankPhone($id)
    {

        $blood_bank = BloodBank::find($id);

        $phones = $blood_bank->phones()->select('blood_bank_phone_no')->get();

        return $phones;
    }

    public function getBloodBankEmail($id)
    {

        $blood_bank = BloodBank::find($id);

        $emails = $blood_bank->emails()->select('blood_bank_email_ad')->get();

        return $emails;
    }

    public function getBloodBankDoctor($medical_specialist_id,$blood_bank_id)
    {

        $doctor_ids = BloodBankDoctor::where('blood_bank_id', $blood_bank_id)
                    ->where('medical_specialist_id',$medical_specialist_id)
                    ->select('medical_specialist_id')->get();
        $doctors = MedicalSpecialist::whereIn('id', $doctor_ids)->get();

        return $doctors;

    }

}
