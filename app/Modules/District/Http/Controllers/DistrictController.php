<?php

namespace App\Modules\District\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
use Session;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('district_name', 'ASC')->get();
        
        return view('district::district', compact('districts'));
    }

    public function viewAddDistrict()
    {
        return view('district::district_add');
    }

    public function postAddDistrict(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'district_name' => 'required',
            'b_district_name' => 'required',
        ]);

        $district = new District;

        try {

            $district->district_name  = $data['district_name'];
            $district->b_district_name = $data['b_district_name'];

            if($district->save())
            {
                return redirect('district')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('district')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewDistrict($id)
    {
        $district = District::find($id);

        try {

            if($district)
            {
                return view('district::district_view', compact('district'));
            }
            else
            {
                return redirect('district')
                    ->with('flash_message', 'Invalid!!! No Data found!!!')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
        
    }


    

    public function viewEditDistrict($id)
    {
        $district = District::find($id);

        try {

            if($district)
            {
                return view('district::district_edit', compact('district'));
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

    public function postEditDistrict(Request $request, $id)
    {
        $data = $request->all();

        $district = District::find($id);

        try {

            $district->district_name = $data['district_name'];
            $district->b_district_name = $data['b_district_name'];

            if($district)
            {
                if($district->update())
                {
                     return redirect('district')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('district')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('district/edit'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }




    public function deleteDistrict($id)
    {
        $district = District::find($id);

        try {

            if($district)
            {
                if($district->delete())
                {
                    return redirect('district')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('district')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('district')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }



    public function getDistrict()
    {
        if(Session('language')=='bn')
        {
            Session::put('language','bn','20');
            $districts = DB::table('district')->select('b_district_name as text', 'id as value')->orderBy('text', 'ASC')->get();
        }
        else
        {

        $districts = DB::table('district')->select('district_name as text', 'id as value')->orderBy('text', 'ASC')->get();
        
        }
        return response()->json([
            'districts' => $districts,
            ], 201);
    }


    public function getSelectedDistrict($id)
    {
        $selected_district    = Hospital::find($id)->district->id;
        $selected_subdistrict = Hospital::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictAddiction($id)
    {
        $selected_district    = Addiction::find($id)->district->id;
        $selected_subdistrict = Addiction::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictGym($id)
    {
        $selected_district    = Gym::find($id)->district->id;
        $selected_subdistrict = Gym::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictYoga($id)
    {
        $selected_district    = Yoga::find($id)->district->id;
        $selected_subdistrict = Yoga::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictParlour($id)
    {
        $selected_district    = Parlour::find($id)->district->id;
        $selected_subdistrict = Parlour::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictHerbalCenter($id)
    {
        $selected_district    = HerbalCenter::find($id)->district->id;
        $selected_subdistrict = HerbalCenter::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictSkinLaserCenter($id)
    {
        $selected_district    = SkinLaserCenter::find($id)->district->id;
        $selected_subdistrict = SkinLaserCenter::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictVaccinePoint($id)
    {
        $selected_district    = VaccinePoint::find($id)->district->id;
        $selected_subdistrict = VaccinePoint::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictPharmacy($id)
    {
        $selected_district    = Pharmacy::find($id)->district->id;
        $selected_subdistrict = Pharmacy::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            //'subdistricts' =>  $subdistricts,
            //'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictMedicalspecialist($id)
    {
        $selected_district    = MedicalSpecialist::find($id)->district->id;
        $selected_subdistrict = MedicalSpecialist::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictBloodBank($id)
    {
        $selected_district    = BloodBank::find($id)->district->id;
        $selected_subdistrict = BloodBank::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictEyeBank($id)
    {
        $selected_district    = EyeBank::find($id)->district->id;
        $selected_subdistrict = EyeBank::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictAirAmbulance($id)
    {
        $selected_district    = AirAmbulance::find($id)->district->id;
        $selected_subdistrict = AirAmbulance::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictAmbulance($id)
    {
        $selected_district    = Ambulance::find($id)->district->id;
        $selected_subdistrict = Ambulance::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

    public function getSelectedDistrictBloodDonor($id)
    {
        $selected_district    = BloodDonor::find($id)->district->id;
        $selected_subdistrict = BloodDonor::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }
    
    public function getSelectedDistrictForeignmedical($id)
    {
        $selected_district    = Foreignmedical::find($id)->district->id;
        $selected_subdistrict = Foreignmedical::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }
    
    public function getSelectedDistrictOptical($id)
    {
        $selected_district    = Optical::find($id)->district->id;
        $selected_subdistrict = Optical::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }
    
    public function getSelectedDistrictPhysiotherapy($id)
    {
        $selected_district    = Physiotherapy::find($id)->district->id;
        $selected_subdistrict = Physiotherapy::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }
    
    public function getSelectedDistrictHomeopathic($id)
    {
        $selected_district    = Homeopathic::find($id)->district->id;
        $selected_subdistrict = Homeopathic::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }
    
    public function getSelectedDistrictPharmacynew($id)
    {
        $selected_district    = Pharmacynew::find($id)->district->id;
        $selected_subdistrict = Pharmacynew::find($id)->subDistrict->id;


        $subdistricts = DB::table('subdistrict')->where('district_id', $selected_district)->select('sub_district_name as text', 'id as value')->get();


        $districts = DB::table('district')->select('district_name as text', 'id as value')->get();

        return response()->json([
            'subdistricts' =>  $subdistricts,
            'selected_subdistrict' => $selected_subdistrict,
            'districts' => $districts,
            'selected_district' => $selected_district,
            ], 201);
    }

}
