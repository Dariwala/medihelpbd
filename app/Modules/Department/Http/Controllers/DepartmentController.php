<?php

namespace App\Modules\Department\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Department;
use App\Models\HospitalDoctor;
use App\Models\ForeignmedicalDoctor;
use App\Models\HomeopathicDoctor;
use App\Models\OpticalDoctor;
use App\Models\PharmacynewDoctor;
use App\Models\PhysiotherapyDoctor;
use App\Models\AddictionDoctor;
use App\Models\GymDoctor;
use App\Models\YogaDoctor;
use App\Models\ParlourDoctor;
use App\Models\SkinLaserCenterDoctor;
use App\Models\VaccinePointDoctor;
use App\Models\HerbalCenterDoctor;
use App\Models\EyeBankDoctor;
use App\Models\PharmacyDoctor;
use App\Models\BloodBank;
use App\Models\BloodBankDoctor;
use DB;

use Exception;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('department_name','asc')->get();
    	return view('department::medical_department', compact('departments'));
    }

    public function viewAddDepartment()
    {
    	return view('department::medical_department_add');
    }

    public function postAddDepartment(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'department_name' => 'required',
            'b_department_name' => 'required',
        ]);

        $department = new Department;

        try {

            $department->department_name  = $data['department_name'];
            $department->b_department_name = $data['b_department_name'];

            if($department->save())
            {
                return redirect('medical-department')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('medical-department')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewDepartment($id)
    {
        $department = Department::find($id);

        try {

            if($department)
            {
                return view('department::medical_department_view', compact('department'));
            }
            else
            {
                return redirect('medical-department')
                    ->with('flash_message', 'Invalid!!! No Data found!!!')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
        
    }


    

    public function viewEditDepartment($id)
    {
        $department = Department::find($id);

        try {

            if($department)
            {
                return view('department::medical_department_edit', compact('department'));
            }
            else
            {
                return redirect('medical-department')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function postEditDepartment(Request $request, $id)
    {
        $data = $request->all();

        $department = Department::find($id);

        try {

            $department->department_name = $data['department_name'];
            $department->b_department_name = $data['b_department_name'];

            if($department)
            {
                if($department->update())
                {
                     return redirect('medical-department')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('medical-department')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('medical-department')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }




    public function deleteDepartment($id)
    {
        $department = Department::find($id);

        try {

            if($department)
            {
                if($department->delete())
                {
                    return redirect('medical-department')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('medical-department')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('medical-department')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getDepartment()
    {
        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return $departments;
    }


    public function getSelectedHospitalDepartment($hospital_doctor_id)
    {

        $selected_department = HospitalDoctor::find($hospital_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedAddictionDepartment($addiction_doctor_id)
    {

        $selected_department = AddictionDoctor::find($addiction_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedGymDepartment($gym_doctor_id)
    {

        $selected_department = GymDoctor::find($gym_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedYogaDepartment($yoga_doctor_id)
    {

        $selected_department = YogaDoctor::find($yoga_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedParlourDepartment($parlour_doctor_id)
    {

        $selected_department = ParlourDoctor::find($parlour_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedHerbalCenterDepartment($herbal_center_doctor_id)
    {
        

        $selected_department = HerbalCenterDoctor::find($herbal_center_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedBloodBankDepartment($blood_bank_doctor_id)
    {
        

        $selected_department = BloodBankDoctor::find($blood_bank_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedEyeBankDepartment($eye_bank_doctor_id)
    {

        $selected_department = EyeBankDoctor::find($eye_bank_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }


    public function getSelectedSkinLaserCenterDepartment($skin_laser_center_doctor_id)
    {
        

        $selected_department = SkinLaserCenterDoctor::find($skin_laser_center_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedVaccinePointDepartment($vaccine_point_doctor_id)
    {
        

        $selected_department = VaccinePointDoctor::find($vaccine_point_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }



    public function getSelectedPharmacyDepartment($pharmacy_doctor_id)
    {
        

        $selected_department = PharmacyDoctor::find($pharmacy_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }



    public function getSelectedPhysiotherapyDepartment($physiotherapy_doctor_id)
    {
        

        $selected_department = PhysiotherapyDoctor::find($physiotherapy_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedForeignmedicalDepartment($foreignmedical_doctor_id)
    {
        

        $selected_department = ForeignmedicalDoctor::find($foreignmedical_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedHomeopathicDepartment($homeopathic_doctor_id)
    {
        

        $selected_department = HomeopathicDoctor::find($homeopathic_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedOpticalDepartment($optical_doctor_id)
    {
        

        $selected_department = OpticalDoctor::find($optical_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }

    public function getSelectedPharmacynewDepartment($pharmacynew_doctor_id)
    {
        

        $selected_department = PharmacynewDoctor::find($pharmacynew_doctor_id)->department_id;

        $departments = DB::table('department')->select('department_name as text', 'id as value')->get();

        return response()->json([
            'departments' =>  $departments,
            'selected_department' => $selected_department,
            ], 201);
    }


    public function viewHospitalDepartment($hospital_id)
    {
        $departmet_ids = HospitalDoctor::where('hospital_id', $hospital_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $hospitaldepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $hospitaldepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'hospitaldepartment' =>  $hospitaldepartment,
            ], 201);
    }

    public function viewAddictionDepartment($addiction_id)
    {
        $departmet_ids = AddictionDoctor::where('addiction_id', $addiction_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $addictiondepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $addictiondepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'addictiondepartment' =>  $addictiondepartment,
            ], 201);
    }

    public function viewGymDepartment($gym_id)
    {
        $departmet_ids = GymDoctor::where('gym_id', $gym_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $gymdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $gymdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'gymdepartment' =>  $gymdepartment,
            ], 201);
    }

    public function viewYogaDepartment($yoga_id)
    {
        $departmet_ids = YogaDoctor::where('yoga_id', $yoga_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $yogadepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $yogadepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'yogadepartment' =>  $yogadepartment,
            ], 201);
    }

    public function viewParlourDepartment($parlour_id)
    {
        $departmet_ids = ParlourDoctor::where('parlour_id', $parlour_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $parlourdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $parlourdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'parlourdepartment' =>  $parlourdepartment,
            ], 201);
    }

    public function viewHerbalCenterDepartment($herbal_center_id)
    {
        $departmet_ids = HerbalCenterDoctor::where('herbal_center_id', $herbal_center_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $herbalcenterdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $herbalcenterdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'herbalcenterdepartment' =>  $herbalcenterdepartment,
            ], 201);
    }
    
    public function viewBloodBankDepartment($blood_bank_id)
    {
        $departmet_ids = BloodBankDoctor::where('blood_bank_id', $blood_bank_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $bloodbankdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $bloodbankdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'bloodbankdepartment' =>  $bloodbankdepartment,
            ], 201);
    }


    public function viewEyeBankDepartment($eye_bank_id)
    {
        $departmet_ids = EyeBankDoctor::where('eye_bank_id', $eye_bank_id)->select('department_id')->get();
        
        
        if(Session('language')=='bn')
        {
            $eyebankdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $eyebankdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        return response()->json([
            'eyebankdepartment' =>  $eyebankdepartment,
            ], 201);
    }
    public function viewSkinLaserCenterDepartment($skin_laser_center_id)
    {
        $departmet_ids = SkinLaserCenterDoctor::where('skin_laser_center_id', $skin_laser_center_id)->select('department_id')->get();
        
        
        
        if(Session('language')=='bn')
        {
            $skinlasercenterdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $skinlasercenterdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }

        return response()->json([
            'skinlasercenterdepartment' =>  $skinlasercenterdepartment,
            ], 201);
    }
    public function viewVaccinePointDepartment($vaccine_point_id)
    {
        $departmet_ids = VaccinePointDoctor::where('vaccine_point_id', $vaccine_point_id)->select('department_id')->get();
        
        

        if(Session('language')=='bn')
        {
            $vaccinepointdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $vaccinepointdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        return response()->json([
            'vaccinepointdepartment' =>  $vaccinepointdepartment,
            ], 201);
    }

    public function viewPharmacyDepartment($pharmacy_id)
    {
        $departmet_ids = PharmacyDoctor::where('pharmacy_id', $pharmacy_id)->select('department_id')->get();

        if(Session('language')=='bn')
        {
            $pharmacydepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacydepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        
        
        return response()->json([
            'pharmacydepartment' =>  $pharmacydepartment,
            ], 201);
    }



    public function viewForeignmedicalDepartment($foreignmedical_id)
    {
        $departmet_ids = ForeignmedicalDoctor::where('foreignmedical_id', $foreignmedical_id)->select('department_id')->get();

        if(Session('language')=='bn')
        {
            $foreignmedicaldepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $foreignmedicaldepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        
        
        return response()->json([
            'foreignmedicaldepartment' =>  $foreignmedicaldepartment,
            ], 201);
    }

    public function viewHomeopathicDepartment($homeopathic_id)
    {
        $departmet_ids = HomeopathicDoctor::where('homeopathic_id', $homeopathic_id)->select('department_id')->get();

        if(Session('language')=='bn')
        {
            $homeopathicdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $homeopathicdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        
        
        return response()->json([
            'homeopathicdepartment' =>  $homeopathicdepartment,
            ], 201);
    }

    public function viewOpticalDepartment($optical_id)
    {
        $departmet_ids = OpticalDoctor::where('optical_id', $optical_id)->select('department_id')->get();

        if(Session('language')=='bn')
        {
            $opticaldepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $opticaldepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        
        
        return response()->json([
            'opticaldepartment' =>  $opticaldepartment,
            ], 201);
    }

    public function viewPharmacynewDepartment($pharmacynew_id)
    {
        $departmet_ids = PharmacynewDoctor::where('pharmacynew_id', $pharmacynew_id)->select('department_id')->get();

        if(Session('language')=='bn')
        {
            $pharmacynewdepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacynewdepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        
        
        return response()->json([
            'pharmacynewdepartment' =>  $pharmacynewdepartment,
            ], 201);
    }

    public function viewPhysiotherapyDepartment($physiotherapy_id)
    {
        $departmet_ids = PhysiotherapyDoctor::where('physiotherapy_id', $physiotherapy_id)->select('department_id')->get();

        if(Session('language')=='bn')
        {
            $physiotherapydepartment = Department::whereIn('id', $departmet_ids)->select('b_department_name as text', 'id as value')->get();
        }
        else
        {
            $physiotherapydepartment = Department::whereIn('id', $departmet_ids)->select('department_name as text', 'id as value')->get();
        }
        
        
        
        return response()->json([
            'physiotherapydepartment' =>  $physiotherapydepartment,
            ], 201);
    }



}
