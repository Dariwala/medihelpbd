<?php namespace App\Lib;
use Illuminate\Support\Facades\DB;
use App\Models\Notice;
use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Support\Facades\Route;

class Helpers
{

    public function getNotices(){
        
        $url            = Route::current()->parameters();
        $url_name       = Route::getCurrentRoute()->getPath();
        $notices        = null;
       
        if(isset($url['id2']) && strpos($url_name, 'frontendpharmacy') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', '24 Hours Pharmacy')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendaddiction') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Addiction Rehabilitation Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendairambulance') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Air Ambulance')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendambulance') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Ambulance')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendparlour') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Beauty Parlour & Spa')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendbloodbank') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Blood Bank')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendblooddonor') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Blood Donor')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendmedicalspecialist') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Doctors Panel')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendeyebank') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Eye Bank')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendforeignmedical') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Foreign Medical Information Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendgym') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Gym')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendhospital') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Health Care Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendherbalcenter') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Herbal Medicine Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendhomeopathic') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Homeopathic Medicine Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendoptical') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Optical Shop')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendpharmacynew') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Pharmacy')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendphysiotherapy') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Physiotherapy & Rehabilitation Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendskinlasercenter') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Skin Care & Laser Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendvaccinepoint') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Vaccination Center')->get();    
        }else if(isset($url['id2']) && strpos($url_name, 'frontendyoga') !== false){
            $notices = Notice::where('sub_district_id', $url['id2'])->where('service_provider', 'Yoga Center')->get();    
        }
        
        return $notices;
    }
    
    public function getDistricts(){
        
        $districts = District::orderBy('district_name','ASC')->get();
        
        return $districts;
    }
   
}