<?php

namespace App\Modules\Medicalspecialist\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MedicalSpecialist;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Service;
use App\Models\Department;
use App\Models\MedicalSpecialistPhone;
use App\Models\MedicalSpecialistEmail;
use App\Models\HospitalDoctor;
use App\Models\ForeignmedicalDoctor;
use App\Models\HomeopathicDoctor;
use App\Models\OpticalDoctor;
use App\Models\PharmacynewDoctor;
use App\Models\PhysiotherapyDoctor;
use App\Models\AddictionDoctor;
use App\Models\SkinLaserCenterDoctor;
use App\Models\VaccinePointDoctor;
use App\Models\HerbalCenterDoctor;
use App\Models\BloodBankDoctor;
use App\Models\EyeBankDoctor;
use App\Models\PharmacyDoctor;
use App\Models\MedicalSpecialistNotice;
use App\Models\MedicalSpecialistChamber;
use DB;


class MedicalSpecialistController extends Controller
{

	public function index()
    {

        $medical_specialists = MedicalSpecialist::join('subdistrict','subdistrict.id','medical_specialist.subdistrict_id')
                            	                    ->orderBy('subdistrict.sub_district_name', 'ASC')
                            	                    ->get();
                            	                    
        $medical_specialists = MedicalSpecialist::join('subdistrict','subdistrict.id','medical_specialist.subdistrict_id')
                                        ->join('district','district.id','medical_specialist.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(medical_specialist.id ORDER BY subdistrict.sub_district_name) as medical_specialist_id,
                                                        group_concat(medical_specialist.medical_specialist_name ORDER BY subdistrict.sub_district_name) as medical_specialist_name,
                                                        group_concat(medical_specialist.medical_specialist_subname ORDER BY subdistrict.sub_district_name) as medical_specialist_subname,
                                                        group_concat(medical_specialist.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(medical_specialist.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_medical_specialist = [];
        
       foreach($medical_specialists as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["medical_specialist_id"]);
           $names           = explode(",", $value["medical_specialist_name"]);
           $subnames        = explode(",", $value["medical_specialist_subname"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_medical_specialist[$i]['sub_district_name']             = $sub_districts[$key];
               $new_medical_specialist[$i]['id']                            = $ids[$key];
               $new_medical_specialist[$i]['medical_specialist_name']       = $names[$key];
               $new_medical_specialist[$i]['medical_specialist_subname']    = isset($subnames[$key]) ? $subnames[$key] : "";
               $new_medical_specialist[$i]['created_at']                    = $careated_ats[$key];
               $new_medical_specialist[$i]['updated_at']                    = $updates_ats[$key];
               $new_medical_specialist[$i]['district_name']                 = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $medical_specialists  = $new_medical_specialist;

    	return view('medicalspecialist::medical_specialist', compact('medical_specialists'));
    }

    public function viewMedicalSpecialist($medical_specialist_id)
    {
        $medical_specialist = MedicalSpecialist::find($medical_specialist_id);

        $phones = DB::table('medical_specialist_phone')->where('medical_specialist_id', $medical_specialist_id)->get();
        $emails = DB::table('medical_specialist_email')->where('medical_specialist_id', $medical_specialist_id)->get();
        $chembers = DB::table('medical_specialist_chamber')->where('medical_specialist_id', $medical_specialist_id)->get();
        $notices = MedicalSpecialistNotice::where('medical_specialist_id', $medical_specialist_id)->get();

        return view('medicalspecialist::medical_speacialist_view',compact('medical_specialist','phones','emails','chembers','notices'));
    }

	public function viewAddMedicalSpecialist()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('medicalspecialist::medical_specialist_add', compact('districts','district_id'));
    }

    public function viewAddMedicalSpecialistById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('medicalspecialist::medical_specialist_add', compact('districts', 'subdistricts', 'district_id'));
    }

    public function postAddMedicalSpecialist(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'medical_specialist_name'   => 'required',
            'b_medical_specialist_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $medical_specialist = new MedicalSpecialist;

        try {

            $medical_specialist->medical_specialist_name   = $data['medical_specialist_name'];
            $medical_specialist->b_medical_specialist_name = $data['b_medical_specialist_name'];
            $medical_specialist->district_id               = $data['district_id'];
            $medical_specialist->subdistrict_id            = $data['subdistrict_id'];

            if($medical_specialist->save())
            {
                return redirect('medical-specialist')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('medical-specialist')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewInfoMedicalSpecialist($id)
    {
        $selected_district    = MedicalSpecialist::find($id)['district'];
        $selected_subdistrict = MedicalSpecialist::find($id)['subDistrict'];
        $departments          = Department::all();

        $medical_specialist_chambers      = MedicalSpecialist::find($id)->medicalSpecialistChambers()->get();
        $medical_specialist_notices       = MedicalSpecialist::find($id)->medicalSpecialistNotices()->get();
        $medical_specialist_appointments  = MedicalSpecialist::find($id)->medicalSpecialistAppointments()->get();
        $medical_specialist_appointments_notice  = MedicalSpecialist::find($id)->medicalSpecialistAppointmentsNotice()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $medical_specialist = MedicalSpecialist::find($id);

        $medical_specialist_id = $id;
        

        try {

            if($districts)
            {
                return view('medicalspecialist::medical_specialist_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'medical_specialist_id','medical_specialist','departments','medical_specialist_notices','medical_specialist_chambers','medical_specialist_appointments','medical_specialist_appointments_notice'));
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

    public function postInfoMedicalSpecialist(Request $request , $id)
    {
        $data = $request->all();

        $medical_specialist = MedicalSpecialist::find($id);

        try {
            
            if(isset($data['medical_specialist_speciality_form']) && $data['medical_specialist_speciality_form'] == 1){
                
                $medical_specialist->specialty = $data['specialty'];
                $medical_specialist->b_specialty = $data['b_specialty'];
                
            }else{
                
                if($request->hasFile('medical_specialist_photo'))
                {
                    $file = $request->file('medical_specialist_photo');
    
                    $file_name = $file->getClientOriginalName();
                    $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                    $file_extention = $file->getClientOriginalExtension();
                    $num = rand(1,500);
                    $new_file_name = $without_extention.$num.'.'.$file_extention;
    
                    $success = $file->move('uploads/medical_specialist',$new_file_name);
    
                    if($success)
                    {
                        $medical_specialist->medical_specialist_photo = $new_file_name;
                        $medical_specialist->photo_path = 'uploads/medical_specialist/'.$new_file_name;
                    }
                }
    
                $medical_specialist->medical_specialist_name = $data['medical_specialist_name'];
                $medical_specialist->b_medical_specialist_name = $data['b_medical_specialist_name'];
                $medical_specialist->medical_specialist_subname = $data['medical_specialist_subname'];
                $medical_specialist->b_medical_specialist_subname = $data['b_medical_specialist_subname'];
                $medical_specialist->district_id = $data['district_id'];
                $medical_specialist->subdistrict_id = $data['subdistrict_id'];
                
            }

            if($medical_specialist)
            {
                if($medical_specialist->update())
                {
                     return redirect('medical-specialist/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('medical-specialist/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('medical-specialist/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutMedicalSpecialist(Request $request , $id)
    {

        $data = $request->all();


        $medical_specialist = MedicalSpecialist::find($id);

        try {

            $medical_specialist->department_id                    = $data['department_id'];
            $medical_specialist->fee_new                          = $data['fee_new'];
            $medical_specialist->b_fee_new                        = $data['b_fee_new'];
            $medical_specialist->medical_specialist_description   = $data['medical_specialist_description'];
            $medical_specialist->b_medical_specialist_description = $data['b_medical_specialist_description'];
            $medical_specialist->medical_specialist_phone_no      = $data['medical_specialist_phone_no'];
            $medical_specialist->b_medical_specialist_phone_no    = $data['b_medical_specialist_phone_no'];
            $medical_specialist->medical_specialist_email_ad      = $data['medical_specialist_email_ad'];
            $medical_specialist->medical_specialist_web_link      = $data['medical_specialist_web_link'];

            $medical_specialist->medical_specialist_address       = $data['medical_specialist_address'];
            $medical_specialist->b_medical_specialist_address     = $data['b_medical_specialist_address'];
            $medical_specialist->medical_specialist_latitude      = $data['medical_specialist_latitude'];
            $medical_specialist->medical_specialist_longitude     = $data['medical_specialist_longitude'];


            if($medical_specialist)
            {
                if($medical_specialist->update())
                {
                     return redirect('medical-specialist/edit/info'.'/'.$id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('medical-specialist/edit/info'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('medical-specialist/edit/info'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function getMedicalSpecialistPhone($id)
    {

        $medical_specialist = MedicalSpecialist::find($id);

        $phones = $medical_specialist->phones()->select('medical_specialist_phone_no')->get();

        return $phones;
    }

    public function getMedicalSpecialistEmail($id)
    {

        $medical_specialist = MedicalSpecialist::find($id);

        $emails = $medical_specialist->emails()->select('medical_specialist_email_ad')->get();

        return $emails;
    }

    public function deleteMedicalSpecialist($id)
    {
        $medical_specialist = MedicalSpecialist::find($id);

        try {

            if($medical_specialist)
            {
                if($medical_specialist->delete())
                {
                    return redirect('medical-specialist')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('medical-specialist')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('medical-specialist')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    // for api

    public function getMedicalSpecialist($id)
    {
        $medical_specialists = DB::table('medical_specialist')->where('department_id', $id)->select('medical_specialist_name as text', 'id as value')->get();
        return $medical_specialists;
    }

    public function getSelectedmedical_specialistMedicalSpecialist($medical_specialist_department_id)
    {

        $selected_Medical_specialist = medical_specialistDoctor::find($medical_specialist_department_id)->medicalSpecialist->id;
        $selected_department         = medical_specialistDoctor::find($medical_specialist_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedAddictionMedicalSpecialist($addiction_department_id)
    {

        $selected_Medical_specialist = AddictionDoctor::find($addiction_department_id)->medicalSpecialist->id;
        $selected_department         = AddictionDoctor::find($addiction_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedHerbalCenterMedicalSpecialist($herbal_center_department_id)
    {

        $selected_Medical_specialist = HerbalCenterDoctor::find($herbal_center_department_id)->medicalSpecialist->id;
        $selected_department         = HerbalCenterDoctor::find($herbal_center_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedBloodBankMedicalSpecialist($blood_bank_department_id)
    {
        $selected_Medical_specialist = BloodBankDoctor::find($blood_bank_department_id)->medicalSpecialist->id;
        $selected_department         = BloodBankDoctor::find($blood_bank_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedEyeBankMedicalSpecialist($eye_bank_department_id)
    {
        $selected_Medical_specialist = EyeBankDoctor::find($eye_bank_department_id)->medicalSpecialist->id;
        $selected_department         = EyeBankDoctor::find($eye_bank_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedSkinLaserCenterMedicalSpecialist($skin_laser_center_department_id)
    {

        $selected_Medical_specialist = SkinLaserCenterDoctor::find($skin_laser_center_department_id)->medicalSpecialist->id;
        $selected_department         = SkinLaserCenterDoctor::find($skin_laser_center_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedVaccinePointMedicalSpecialist($medical_specialist_department_id)
    {

        $selected_Medical_specialist = VaccinePointDoctor::find($medical_specialist_department_id)->medicalSpecialist->id;
        $selected_department         = VaccinePointDoctor::find($medical_specialist_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedPharmacyMedicalSpecialist($pharmacy_department_id)
    {

        $selected_Medical_specialist = PharmacyDoctor::find($pharmacy_department_id)->medicalSpecialist->id;
        $selected_department         = PharmacyDoctor::find($pharmacy_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }



    public function getSelectedForeignmedicalMedicalSpecialist($foreignmedical_department_id)
    {

        $selected_Medical_specialist = ForeignmedicalDoctor::find($foreignmedical_department_id)->medicalSpecialist->id;
        $selected_department         = ForeignmedicalDoctor::find($foreignmedical_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedHomeopathicMedicalSpecialist($homeopathic_department_id)
    {

        $selected_Medical_specialist = HomeopathicDoctor::find($homeopathic_department_id)->medicalSpecialist->id;
        $selected_department         = HomeopathicDoctor::find($homeopathic_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedOpticalMedicalSpecialist($optical_department_id)
    {

        $selected_Medical_specialist = OpticalDoctor::find($optical_department_id)->medicalSpecialist->id;
        $selected_department         = OpticalDoctor::find($optical_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedPharmacynewMedicalSpecialist($pharmacynew_department_id)
    {

        $selected_Medical_specialist = PharmacynewDoctor::find($pharmacynew_department_id)->medicalSpecialist->id;
        $selected_department         = PharmacynewDoctor::find($pharmacynew_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function getSelectedPhysiotherapyMedicalSpecialist($physiotherapy_department_id)
    {

        $selected_Medical_specialist = PhysiotherapyDoctor::find($physiotherapy_department_id)->medicalSpecialist->id;
        $selected_department         = PhysiotherapyDoctor::find($physiotherapy_department_id)->department->id;

        $medical_specialists = DB::table('medical_specialist')->where('department_id', $selected_department)->select('medical_specialist_name as text', 'id as value')->get();

        return response()->json([
            'medical_specialists' =>  $medical_specialists,
            'selected_Medical_specialist' => $selected_Medical_specialist
            ], 201);
    }

    public function viewHospitalMedicalSpecialist($department_id,$hospital_id)
    {
        $medical_specialist_ids = HospitalDoctor::where('hospital_id', $hospital_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        
        if(Session('language')=='bn')
        {
            $hospitalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $hospitalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        return response()->json([
            'hospitalmedicalspecialist' =>  $hospitalmedicalspecialist,
            ], 201);
    }

    public function viewAddictionMedicalSpecialist($department_id,$addiction_id)
    {
        $medical_specialist_ids = AddictionDoctor::where('addiction_id', $addiction_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        
        if(Session('language')=='bn')
        {
            $addictionmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $addictionmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        return response()->json([
            'addictionmedicalspecialist' =>  $addictionmedicalspecialist,
            ], 201);
    }

    public function getSelectedHospitalMedicalSpecialist($id)
    {
        $medical_specialist_ids = HospitalDoctor::where('id', $id)->first();

        $medical_specialists = HospitalDoctor::where('hospital_id', $medical_specialist_ids->hospital_id)->where('department_id', $medical_specialist_ids->department_id)->select('medical_specialist_id')->get();
        
        if(Session('language')=='bn')
        {
            $hospitalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialists)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $hospitalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialists)->select('medical_specialist_name as text', 'id as value')->get();
        }
        return response()->json([
            'selected_Medical_specialist' =>  $medical_specialist_ids,
            'medical_specialists' =>  $hospitalmedicalspecialist
            ], 201);

    }

    public function viewHerbalCenterMedicalSpecialist($department_id,$herbal_center_id)
    {
        $medical_specialist_ids = HerbalCenterDoctor::where('herbal_center_id', $herbal_center_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        
        if(Session('language')=='bn')
        {
            $herbalcentermedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
           $herbalcentermedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get(); 
        }
        return response()->json([
            'herbalcentermedicalspecialist' =>  $herbalcentermedicalspecialist,
            ], 201);
    }

    public function viewBloodBankMedicalSpecialist($department_id,$blood_bank_id)
    {
        $medical_specialist_ids = BloodBankDoctor::where('blood_bank_id', $blood_bank_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        
        if(Session('language')=='bn')
        {
            $bloodbankmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
           $bloodbankmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get(); 
        }
        return response()->json([
            'bloodbankmedicalspecialist' =>  $bloodbankmedicalspecialist,
            ], 201);
    }

    public function viewEyeBankMedicalSpecialist($department_id,$eye_bank_id)
    {
        $medical_specialist_ids = EyeBankDoctor::where('eye_bank_id', $eye_bank_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        
        if(Session('language')=='bn')
        {
            $eyebankmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
           $eyebankmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get(); 
        }
        return response()->json([
            'eyebankmedicalspecialist' =>  $eyebankmedicalspecialist,
            ], 201);
    }

    public function viewSkinLaserCenterMedicalSpecialist($department_id,$skin_laser_center_id)
    {
        $medical_specialist_ids = SkinLaserCenterDoctor::where('skin_laser_center_id', $skin_laser_center_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $skinlasercentermedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $skinlasercentermedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        return response()->json([
            'skinlasercentermedicalspecialist' =>  $skinlasercentermedicalspecialist,
            ], 201);
    }

    public function viewVaccinePointMedicalSpecialist($department_id, $vaccine_point_id)
    {
         
        $medical_specialist_ids = VaccinePointDoctor::where('vaccine_point_id', $vaccine_point_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
       
       
        if(Session('language')=='bn')
        {
            $vaccinepointmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $vaccinepointmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'vaccinepointmedicalspecialist' =>  $vaccinepointmedicalspecialist,
            ], 201);
    }

    public function viewPharmacyMedicalSpecialist($department_id,$pharmacy_id)
    {
        $medical_specialist_ids = PharmacyDoctor::where('pharmacy_id', $pharmacy_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        if(Session('language')=='bn') 
        {
           $pharmacymedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacymedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'pharmacymedicalspecialist' =>  $pharmacymedicalspecialist,
            ], 201);
    }



    public function viewForeignmedicalMedicalSpecialist($department_id,$foreignmedical_id)
    {
        $medical_specialist_ids = ForeignmedicalDoctor::where('foreignmedical_id', $foreignmedical_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        if(Session('language')=='bn') 
        {
           $foreignmedicalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $foreignmedicalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'foreignmedicalmedicalspecialist' =>  $foreignmedicalmedicalspecialist,
            ], 201);
    }

    public function viewHomeopathicMedicalSpecialist($department_id,$homeopathic_id)
    {
        $medical_specialist_ids = HomeopathicDoctor::where('homeopathic_id', $homeopathic_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        if(Session('language')=='bn') 
        {
           $homeopathicmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $homeopathicmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'homeopathicmedicalspecialist' =>  $homeopathicmedicalspecialist,
            ], 201);
    }

    public function viewOpticalMedicalSpecialist($department_id,$optical_id)
    {
        $medical_specialist_ids = OpticalDoctor::where('optical_id', $optical_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        if(Session('language')=='bn') 
        {
           $opticalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $opticalmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'opticalmedicalspecialist' =>  $opticalmedicalspecialist,
            ], 201);
    }

    public function viewPharmacynewMedicalSpecialist($department_id,$pharmacynew_id)
    {
        $medical_specialist_ids = PharmacynewDoctor::where('pharmacynew_id', $pharmacynew_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        if(Session('language')=='bn') 
        {
           $pharmacynewmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacynewmedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'pharmacynewmedicalspecialist' =>  $pharmacynewmedicalspecialist,
            ], 201);
    }

    public function viewPhysiotherapyMedicalSpecialist($department_id,$physiotherapy_id)
    {
        $medical_specialist_ids = PhysiotherapyDoctor::where('physiotherapy_id', $physiotherapy_id)->where('department_id', $department_id)->select('medical_specialist_id')->get();
        if(Session('language')=='bn') 
        {
           $physiotherapymedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('b_medical_specialist_name as text', 'id as value')->get();
        }
        else
        {
            $physiotherapymedicalspecialist = Medicalspecialist::whereIn('id', $medical_specialist_ids)->select('medical_specialist_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'physiotherapymedicalspecialist' =>  $physiotherapymedicalspecialist,
            ], 201);
    }

    public function all(request $request)
    {
        $subDistrict = $request->subDistrict;
        
        if(isset($subDistrict)){
            
            if(Session('language')=='bn') 
            {
              $medical_specialists = MedicalSpecialist::orderBy('b_medical_specialist_subname', 'ASC')->distinct()->select('b_medical_specialist_subname as medical_specialist_name')->where('b_medical_specialist_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
            else
            {
               $medical_specialists = MedicalSpecialist::orderBy('medical_specialist_subname', 'ASC')->distinct()->select('medical_specialist_subname as medical_specialist_name')->where('medical_specialist_subname', '!=', NULL)->where('subdistrict_id', $subDistrict)->get();
            }
                
        }else{
            
            if(Session('language')=='bn') 
            {
              $medical_specialists = MedicalSpecialist::orderBy('b_medical_specialist_subname', 'ASC')->distinct()->select('b_medical_specialist_subname as medical_specialist_name')->where('b_medical_specialist_subname', '!=', NULL)->get();
            }
            else
            {
               $medical_specialists = MedicalSpecialist::orderBy('medical_specialist_subname', 'ASC')->distinct()->select('medical_specialist_subname as medical_specialist_name')->where('medical_specialist_subname', '!=', NULL)->get();
            }
            
        }

        return $medical_specialists;
        
    }

}
