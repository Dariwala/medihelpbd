<?php

namespace App\Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AirAmbulance;
use App\Models\Ambulance;
use App\Models\BloodBank;
use App\Models\BloodDonor;
use App\Models\Department;
use App\Models\District;
use App\Models\EyeBank;
use App\Models\HerbalCenter;
use App\Models\Hospital;
use App\Models\Foreignmedical;
use App\Models\Optical;
use App\Models\Pharmacynew;
use App\Models\Physiotherapy;
use App\Models\Homeopathic;
use App\Models\MedicalSpecialist;
use App\Models\Pharmacy;
use App\Models\Addiction;
use App\Models\Gym;
use App\Models\Yoga;
use App\Models\Parlour;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Service;
use App\Models\SkinLaserCenter;
use App\Models\SubDistrict;
use App\Models\SubService;
use App\Models\VaccinePoint;

class DashboardController extends Controller
{
    public function index()
    {
        $district               = District::all()->count();
        $sub_district           = SubDistrict::all()->count();
        $service                = Service::all()->count();
        $sub_service            = SubService::all()->count();
        $product_category       = ProductCategory::all()->count();
        $product_subcategory    = ProductSubCategory::all()->count();
        $department             = Department::all()->count();
        $air_ambulance          = AirAmbulance::all()->count();
        $ambulance              = Ambulance::all()->count();
        $blood_bank             = BloodBank::all()->count();
        $blood_donor            = BloodDonor::all()->count();
        $eye_bank               = EyeBank::all()->count();
        $herbal_center          = HerbalCenter::all()->count();
        $medical_specialist     = MedicalSpecialist::all()->count();
        $pharmacy               = Pharmacy::all()->count();
        $skin_laser_center      = SkinLaserCenter::all()->count();
        $vaccine_point          = VaccinePoint::all()->count();
        $hospital               = Hospital::all()->count();
        $foreignmedical         = Foreignmedical::all()->count();
        $homeopathic            = Homeopathic::all()->count();
        $optical                = Optical::all()->count();
        $pharmacynew            = Pharmacynew::all()->count();
        $physiotherapy          = Physiotherapy::all()->count();
        $addiction              = Addiction::all()->count();
        $gym                    = Gym::all()->count();
        $yoga                   = Yoga::all()->count();
        $parlour                = Parlour::all()->count();

        return view('dashboard::dashboard',compact('district','sub_district','service','sub_service','product_category','product_subcategory','department','air_ambulance','ambulance',
        'blood_bank','blood_donor','eye_bank','herbal_center','medical_specialist','pharmacy','skin_laser_center','vaccine_point','hospital','foreignmedical','homeopathic','optical',
        'pharmacynew','physiotherapy','addiction','gym','parlour','yoga'));
    }
}
