<?php

namespace App\Modules\District\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SubDistrict;
use App\Models\District;
use App\Models\Hospital;
use App\Models\Addiction;
use App\Models\Gym;
use App\Models\Yoga;
use App\Models\Parlour;
use App\Models\Foreignmedical;
use App\Models\Optical;
use App\Models\Physiotherapy;
use App\Models\Pharmacynew;
use App\Models\Homeopathic;
use App\Models\HerbalCenter;
use App\Models\SkinLaserCenter;
use App\Models\VaccinePoint;
use App\Models\Pharmacy;
use App\Models\MedicalSpecialist;
use App\Models\BloodBank;
use App\Models\EyeBank;
use App\Models\AirAmbulance;
use App\Models\Ambulance;
use App\Models\BloodDonor;

use Exception;
use DB;

class SubDistrictController extends Controller
{
    public function index()
    {
        $sub_districts = SubDistrict::orderBy('sub_district_name', 'ASC')->get();
        
        return view('district::sub_district', compact('sub_districts'));
    }

    public function viewAddSubDistrict()
    {
        $districts = District::all();
        return view('district::sub_district_add', compact('districts'));
    }

    public function postAddSubDistrict(Request $request)
    {
        $data = $request->all();


        $this->validate($request, [
            'sub_district_name'   => 'required',
            'b_sub_district_name' => 'required',
            'district_id'         => 'required',
        ]);

        $sub_district = new SubDistrict;

        try {

            $sub_district->sub_district_name  = $data['sub_district_name'];
            $sub_district->b_sub_district_name = $data['b_sub_district_name'];
            $sub_district->district_id    = $data['district_id'];

            if($sub_district->save())
            {
                return redirect('district/sub-district')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('district/sub-district')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }

        
    }

    public function viewSubDistrict($id)
    {

        try {

            $district = SubDistrict::find($id)->district;

            $sub_district = SubDistrict::find($id);

            if($sub_district && $district)
            {
                return view('district::sub_district_view', compact('district','sub_district'));
            }
            else
            {
                return redirect('district/sub-district')
                    ->with('flash_message', 'Invalid!!! No Data found!!!')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        
    }


    

    public function viewEditSubDistrict($id)
    {

        try {

            $selected_district = SubDistrict::find($id)->district->id;
            $districts = District::all();
            $sub_district = SubDistrict::find($id);


            if($sub_district)
            {

                return view('district::sub_district_edit', compact('selected_district', 'sub_district', 'districts'));
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

    public function postEditSubDistrict(Request $request, $id)
    {
        try {

            $data = $request->all();
            $sub_district = SubDistrict::find($id);

            $sub_district->sub_district_name   = $data['sub_district_name'];
            $sub_district->b_sub_district_name = $data['b_sub_district_name'];
            $sub_district->district_id         = $data['district_id'];


            if($sub_district)
            {
                if($sub_district->update())
                {
                     return redirect('district/sub-district')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('district/sub-district')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('district/sub-district')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }




    public function deleteSubDistrict($id)
    {

        try {

            $sub_district = SubDistrict::find($id);

            if($sub_district)
            {
                if($sub_district->delete())
                {
                    return redirect('district/sub-district')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('district/sub-district')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('district/sub-district')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            $e.getMessage();
        }
        
    }


    public function getSubDistrict($id)
    {
        if(Session('language')=='bn'){

            $subdistricts = DB::table('subdistrict')->where('district_id', $id)->select('b_sub_district_name as text', 'id as value')->orderBy('text', 'ASC')->get();
        }

        

        else{
            $subdistricts = DB::table('subdistrict')->where('district_id', $id)->select('sub_district_name as text', 'id as value')->orderBy('text', 'ASC')->get();
        }
        return $subdistricts;
    }

    public function getSelectedSubDistrict($id)
    {
        $selected_district    = Hospital::find($id)->district;
        $selected_subdistrict = Hospital::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictAddiction($id)
    {
        $selected_district    = Addiction::find($id)->district;
        $selected_subdistrict = Addiction::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictGym($id)
    {
        $selected_district    = Gym::find($id)->district;
        $selected_subdistrict = Gym::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictYoga($id)
    {
        $selected_district    = Yoga::find($id)->district;
        $selected_subdistrict = Yoga::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictParlour($id)
    {
        $selected_district    = Parlour::find($id)->district;
        $selected_subdistrict = Parlour::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictHerbalCenter($id)
    {
        $selected_district    = HerbalCenter::find($id)->district;
        $selected_subdistrict = HerbalCenter::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictSkinLaserCenter($id)
    {
        $selected_district    = SkinLaserCenter::find($id)->district;
        $selected_subdistrict = SkinLaserCenter::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictVaccinePoint($id)
    {
        $selected_district    = VaccinePoint::find($id)->district;
        $selected_subdistrict = VaccinePoint::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictPharmacy($id)
    {
        $selected_district    = Pharmacy::find($id)->district;
        $selected_subdistrict = Pharmacy::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictMedicalSpecialist($id)
    {
        $selected_district    = MedicalSpecialist::find($id)->district;
        $selected_subdistrict = MedicalSpecialist::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictBloodBank($id)
    {
        $selected_district    = BloodBank::find($id)->district;
        $selected_subdistrict = BloodBank::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictEyeBank($id)
    {
        $selected_district    = EyeBank::find($id)->district;
        $selected_subdistrict = EyeBank::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictAirAmbulance($id)
    {
        $selected_district    = AirAmbulance::find($id)->district;
        $selected_subdistrict = AirAmbulance::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictAmbulance($id)
    {
        $selected_district    = Ambulance::find($id)->district;
        $selected_subdistrict = Ambulance::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }

    public function getSelectedSubDistrictBloodDonor($id)
    {
        $selected_district    = BloodDonor::find($id)->district;
        $selected_subdistrict = BloodDonor::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }
    
    public function getSelectedSubDistrictForeignmedical($id)
    {
        $selected_district    = Foreignmedical::find($id)->district;
        $selected_subdistrict = Foreignmedical::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }
    
    public function getSelectedSubDistrictOptical($id)
    {
        $selected_district    = Optical::find($id)->district;
        $selected_subdistrict = Optical::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }
    
    public function getSelectedSubDistrictPhysiotherapy($id)
    {
        $selected_district    = Physiotherapy::find($id)->district;
        $selected_subdistrict = Physiotherapy::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }
    
    public function getSelectedSubDistrictPharmacynew($id)
    {
        $selected_district    = Pharmacynew::find($id)->district;
        $selected_subdistrict = Pharmacynew::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }
    
    public function getSelectedSubDistrictHomeopathic($id)
    {
        $selected_district    = Homeopathic::find($id)->district;
        $selected_subdistrict = Homeopathic::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district->id)->select('sub_district_name as text', 'id as value')->get();


        $districts = District::all();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            ], 201);
    }
}
