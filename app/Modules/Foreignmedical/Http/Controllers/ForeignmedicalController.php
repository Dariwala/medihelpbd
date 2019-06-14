<?php

namespace App\Modules\Foreignmedical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Foreignmedical;
use App\Models\ForeignmedicalPhone;
use App\Models\ForeignmedicalEmail;
use App\Models\ForeignmedicalDoctor;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\ForeignmedicalProduct;
use App\Models\ForeignmedicalService;
use App\Models\ForeignmedicalNotice;
use DB;

class ForeignmedicalController extends Controller
{
    public function index()
    {

        $pharmacies = Foreignmedical::join('subdistrict','subdistrict.id','foreignmedical.subdistrict_id')
                                        ->join('district','district.id','foreignmedical.district_id')
                                        ->selectRaw('group_concat(subdistrict.sub_district_name ORDER BY subdistrict.sub_district_name) as sub_district_name, 
                                                        group_concat(foreignmedical.id ORDER BY subdistrict.sub_district_name) as foreignmedical_id,
                                                        group_concat(foreignmedical.foreignmedical_name ORDER BY subdistrict.sub_district_name) as foreignmedical_name,
                                                        group_concat(foreignmedical.created_at ORDER BY subdistrict.sub_district_name) as created_ats,
                                                        group_concat(foreignmedical.updated_at ORDER BY subdistrict.sub_district_name) as updated_ats,
                                                        group_concat(district.district_name ORDER BY subdistrict.sub_district_name) as district_name')
                                        ->groupBy('district.id')
                	                    ->orderBy('district.district_name', 'ASC')
                	                    ->get();
                	                
        $i = 0;
        $new_foreignmedical = [];
        
       foreach($pharmacies as $value){
           
           $sub_districts   = explode(",", $value["sub_district_name"]);
           $ids             = explode(",", $value["foreignmedical_id"]);
           $names           = explode(",", $value["foreignmedical_name"]);
           $careated_ats    = explode(",", $value["created_ats"]);
           $updates_ats     = explode(",", $value["updated_ats"]);
           $district_names  = explode(",", $value["district_name"]);
           
           for($key = 0; $key < count($sub_districts); $key++){
               
               $new_foreignmedical[$i]['sub_district_name']      = $sub_districts[$key];
               $new_foreignmedical[$i]['id']                     = $ids[$key];
               $new_foreignmedical[$i]['foreignmedical_name']     = $names[$key];
               $new_foreignmedical[$i]['created_at']             = $careated_ats[$key];
               $new_foreignmedical[$i]['updated_at']             = $updates_ats[$key];
               $new_foreignmedical[$i]['district_name']          = $district_names[$key];
               
               $i++;
               
           }
           
       }
       
       $pharmacies  = $new_foreignmedical;
       
    	return view('foreignmedical::foreignmedical', compact('pharmacies'));
    }

    public function viewForeignmedical($foreignmedical_id)
    {
        
        
        $foreignmedical = Foreignmedical::find($foreignmedical_id);
        $phones = DB::table('foreignmedical_phone')->where('foreignmedical_id', $foreignmedical_id)->get();
        $emails = DB::table('foreignmedical_email')->where('foreignmedical_id', $foreignmedical_id)->get();

        //$productss = ForeignmedicalProduct::with('productCategory','productSubCategory')->where('foreignmedical_id', $foreignmedical_id)->get();
        $doctors = ForeignmedicalDoctor::with('medicalSpecialist','department')->where('foreignmedical_id', $foreignmedical_id)->get();
        $notices = ForeignmedicalNotice::where('foreignmedical_id', $foreignmedical_id)->get();
        $products = ForeignmedicalProduct::where('foreignmedical_id', $foreignmedical_id)->get();
        
      

        return view('foreignmedical::foreignmedical_view',compact('foreignmedical_id','foreignmedical','phones','emails','products','doctors','notices'));
    }

    public function viewAddForeignmedical()
    {

    	$districts = District::all();
        $district_id = 0;

    	return view('foreignmedical::foreignmedical_add', compact('districts','district_id'));
    }

    public function viewAddForeignmedicalById($district_id)
    {
        $subdistricts = SubDistrict::where('district_id', $district_id)->get();
        $districts = District::all();

        return view('foreignmedical::foreignmedical_add', compact('districts', 'subdistricts', 'district_id'));
    }
    
    public function postAddForeignmedical(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'foreignmedical_name'   => 'required',
            'b_foreignmedical_name' => 'required',
            'district_id'     => 'required',
            'subdistrict_id'  => 'required',
        ]);

        $foreignmedical = new Foreignmedical;

        try {

            $foreignmedical->foreignmedical_name   = $data['foreignmedical_name'];
            $foreignmedical->b_foreignmedical_name = $data['b_foreignmedical_name'];
            $foreignmedical->district_id     = $data['district_id'];
            $foreignmedical->subdistrict_id  = $data['subdistrict_id'];

            if($foreignmedical->save())
            {
                return redirect('foreignmedical')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            
            else
            {
                return redirect('foreignmedical')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewEditForeignmedical($id)
    {
        $selected_district    = Foreignmedical::find($id)->district;
        $selected_subdistrict = Foreignmedical::find($id)->subDistrict;

        $foreignmedical_products    = Foreignmedical::find($id)->foreignmedicalProducts()->get();
        $foreignmedical_notices     = Foreignmedical::find($id)->foreignmedicalNotices()->get();
        $foreignmedical_doctors     = Foreignmedical::find($id)->foreignmedicalDoctors()->get();
        $foreignmedical_services    = Foreignmedical::find($id)->ForeignmedicalServices()->get();


        $subdistricts = SubDistrict::where('district_id', $selected_district->id)->get();


        $districts = District::all();

        $foreignmedical = foreignmedical::where('id', $id)->first();

        $foreignmedical_id = $id;
        

        try {

            if($districts)
            {
                return view('foreignmedical::foreignmedical_edit', compact('districts', 'selected_district', 'selected_subdistrict', 'subdistricts', 'foreignmedical_id','foreignmedical','foreignmedical_products','foreignmedical_notices','foreignmedical_doctors','foreignmedical_services'));
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

    public function postInfoEditForeignmedical(Request $request, $id)
    {
        $data = $request->all();

        $foreignmedical = Foreignmedical::find($id);

        try {


            if($request->hasFile('foreignmedical_photo'))
            {
                $file = $request->file('foreignmedical_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/foreignmedical',$new_file_name);

                if($success)
                {
                    $foreignmedical->foreignmedical_photo = $new_file_name;
                    $foreignmedical->photo_path = 'uploads/foreignmedical/'.$new_file_name;
                }
            }

            $foreignmedical->foreignmedical_name = $data['foreignmedical_name'];
            $foreignmedical->b_foreignmedical_name = $data['b_foreignmedical_name'];
            $foreignmedical->foreignmedical_subname = $data['foreignmedical_subname'];
            $foreignmedical->b_foreignmedical_subname = $data['b_foreignmedical_subname'];
            $foreignmedical->district_id = $data['district_id'];
            $foreignmedical->subdistrict_id = $data['subdistrict_id'];

            if($foreignmedical)
            {
                if($foreignmedical->update())
                {
                     return redirect('foreignmedical')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('foreignmedical')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('foreignmedical')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function postAboutEditForeignmedical(Request $request, $id)
    {
        $data = $request->all();

        

        $foreignmedical = foreignmedical::find($id);

        try {

            $foreignmedical->foreignmedical_description    = $data['foreignmedical_description'];
            $foreignmedical->b_foreignmedical_description  = $data['b_foreignmedical_description'];
            $foreignmedical->foreignmedical_phone_no       = $data['foreignmedical_phone_no'];
            $foreignmedical->b_foreignmedical_phone_no     = $data['b_foreignmedical_phone_no'];
            $foreignmedical->foreignmedical_email_ad       = $data['foreignmedical_email_ad'];
            //$foreignmedical->foreignmedical_fb_link        = $data['foreignmedical_fb_link'];
            $foreignmedical->foreignmedical_web_link       = $data['foreignmedical_web_link'];
            $foreignmedical->total_medicine          = $data['total_medicine'];
            $foreignmedical->b_total_medicine        = $data['b_total_medicine'];
            $foreignmedical->foreignmedical_address        = $data['foreignmedical_address'];
            $foreignmedical->b_foreignmedical_address      = $data['b_foreignmedical_address'];
            $foreignmedical->foreignmedical_latitude      = $data['foreignmedical_latitude'];
            $foreignmedical->foreignmedical_longitude      = $data['foreignmedical_longitude'];

            if($foreignmedical->update())
            {
                return redirect('foreignmedical')
                    ->with('flash_message', 'Edited Successfully.')
                    ->with('flash_notification', 'success');
            }

            else
            {
                return redirect('foreignmedical')
                    ->with('flash_message', 'Something went to wrong')
                    ->with('flash_notification', 'success');
            }
            
        } 

            catch (Exception $e) {
            
        }
    }

    public function deleteForeignmedical($id)
    {
        $foreignmedical = Foreignmedical::find($id);

        try {

            if($foreignmedical)
            {
                if($foreignmedical->delete())
                {
                    return redirect('foreignmedical')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('foreignmedical')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('foreignmedical')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }


    public function getForeignmedicalPhone($id)
    {

        $foreignmedical = foreignmedical::find($id);

        $phones = $foreignmedical->phones()->select('foreignmedical_phone_no')->get();

        return $phones;
    }

    public function getForeignmedicalEmail($id)
    {

        $foreignmedical = foreignmedical::find($id);

        $emails = $foreignmedical->emails()->select('foreignmedical_email_ad')->get();

        return $emails;
    }

    public function getForeignmedicalProduct($id)
    {

        $foreignmedical = foreignmedical::find($id);

        $emails = $foreignmedical->foreignmedicalProducts()->select('product_category_id')->get();

        return $emails;
    }
    

}
