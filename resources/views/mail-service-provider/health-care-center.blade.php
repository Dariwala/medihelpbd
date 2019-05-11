<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body> 
<div class="container">
    <table class="table"> 
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> About </td>
        </tr>
        
            <tr> 
                <td style=" width:30%"> Type (Government/Private/Others) </td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['ab_type'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour: </td>
                <td>:</td>
                <td> {{$data1['ab_service_hour']}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:30%"> {{  $data1['ab_working_day'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:30%"> {{   $data1['ab_close']  }} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Contact Info</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Name</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['con_info_name'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Address</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['con_info_address'] }}</td>    
            </tr>
            <tr> 
                <td style=" width:30%">Contact Number</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['con_info_contact_number'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Emergency Number</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['con_info_emergency_number'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Hotline</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_hotline'] }} <br></td>
            </tr>
            <tr> 
                <td style=" width:30%">Time of Serial</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_time'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Serial Number</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_serial_number'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">E-mail</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_email'] }} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> GeneralInfo</td>
        </tr>
        
            <tr> 
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Indoor Consultation </td>
            </tr>
            <tr> 
                <td style=" width:30%">Time</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['general_info_time']) ? $data1 ['general_info_time']:  ''}} </td>
            </tr>     
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['general_info_service_hour'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['general_info_working_day'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Closed</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['general_info_closed'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Call to above number for serial</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['general_info_call_serial']) ? $data1 ['general_info_call_serial']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Serial number is not given on the phone. Come directly to the serial</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['general_info_serial_number']) ? $data1 ['general_info_serial_number']:  ''}} </td>
            </tr>
            
            <tr> 
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Outdoor Consultation </td>
            </tr>
            <tr> 
                <td style=" width:30%">Time</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['out_general_info_time']) ? $data1 ['out_general_info_time']:  ''}} </td>
            </tr>     
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['out_general_info_service_hour'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['out_general_info_working_day'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Closed</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['out_general_info_closed'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Call to above number for serial</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['out_general_info_call_serial']) ? $data1 ['out_general_info_call_serial']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Serial number is not given on the phone. Come directly to the serial</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['out_general_info_serial_number']) ? $data1 ['out_general_info_serial_number']:  ''}} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Service</td>
        </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Ambulance</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Service Area</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['amb_service_area'] }}<br></td>
            </tr>
            <tr> 
                <td style=" width:30%">Fare</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['amb_fare'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Fare Negotiable </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['fare_negotiable']) ? $data1 ['fare_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['amb_service_hour'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['amb_working_day'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['amb_cont_close'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Contact Numbe</td>
                <td>:</td>
                <td style=" width:70%">{{$data1['amb_cont_number']}} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;">Ambulance Facilities</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Air Conditioned </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_condition']) ? ($data1['air_condition']):''  }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Non Air Conditioned <br> </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['no_air_condition']) ? $data1['no_air_condition'] : ''  }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Medical Staff for Critical Care   <br></td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['medical_staf_cate']) ? $data1['medical_staf_cate'] : '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Oxygen Cylinde</td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['oxygen_cylinder']) ? $data1['oxygen_cylinder'] : ''}} </td>
            </tr>
            
            <tr> 
                <td style=" width:30%">Stretcher </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['stretcher']) ? $data1['stretcher'] :'' }}</td>
            </tr>  
            <tr> 
                <td style=" width:30%">Wheel Chair </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['wheel_chair']) ? $data1['wheel_chair']: '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> No outside ambulance is allowed during discharge of patients from hospital </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['ambulance_outside']) ? $data1['ambulance_outside']: '' }} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> ICU  Ambulance</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Service Area</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['ac_amb_service_area'] }}<br></td>
            </tr>
            <tr> 
                <td style=" width:30%">Fare</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['ac_amb_fare'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Fare Negotiable </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ac_fare_negotiable']) ? $data1 ['ac_fare_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['ac_amb_service_hour'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['ac_amb_working_day'] }}</td>
            </tr>
            
            <tr> 
                <td style=" width:30%"> Closed</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['ac_amb_cont_close'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Contact Numbe</td>
                <td>:</td>
                <td style=" width:70%">{{$data1['ac_amb_cont_number']}} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> ICU Ambulance Facilities</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Medical Staff for Critical Care   <br></td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['ac_medical_staf_cate']) ? $data1['ac_medical_staf_cate'] : '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Stretcher </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['ac_stretcher']) ? $data1['ac_stretcher'] :'' }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Wheel Chair   </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['ac_wheel_chair']) ? $data1['ac_wheel_chair']:' '  }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> No outside ambulance is allowed during discharge of patients from hospital </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['icu_ambulance_outside']) ? $data1['icu_ambulance_outside']: '' }} </td>
            </tr>
            
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Air Ambulance </td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Service Area <br> </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_service_area']) ? $data1['air_amb_service_area'] : ''  }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Fare <br></td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_fare']) ? $data1['air_amb_fare'] : '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Fare Negotiable </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_fare_negotiable']) ? $data1['air_fare_negotiable'] : ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_service_hour']) ? $data1['air_amb_service_hour'] :'' }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day  </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_working_day']) ? $data1['air_amb_working_day']:' '  }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_cont_close']) ? $data1['air_amb_cont_close']: '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_cont_number']) ? $data1['air_amb_cont_number']: '' }} </td>
            </tr>
            
            
            <tr> 
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Air Ambulance Facilities </td>
            </tr>
        
            <tr> 
                <td style=" width:30%"> ICU  </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_icu']) ? $data1['air_amb_icu']: '' }} </td>
            </tr>  
            <tr> 
                <td style=" width:30%"> Normal   </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_amb_normal']) ? $data1['air_amb_normal']: '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Medical Staff for Critical Care   </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_medical_staf_cate']) ? $data1['air_medical_staf_cate']: '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Oxygen Cylinder   </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_oxygen_cylinder']) ? $data1['air_oxygen_cylinder']: '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Stretcher   </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_stretcher']) ? $data1['air_stretcher']: '' }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Wheel Chair    </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['air_wheel_chair']) ? $data1['air_wheel_chair']: '' }} </td>
            </tr>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;">Blood Bank</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['blood_bank_service_hour'] }}<br></td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day <br></td>
                <td>:</td>
                <td style=" width:70%">{{$data1['blood_bank_working_day']}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Closed <br></td>
                <td>:</td>
                <td style=" width:70%">{{$data1['blood_bank_closed']}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['blood_bank_contact_number']) ? $data1 ['blood_bank_contact_number']:  ''}} </td>
            </tr>
        
        
        
        
        
        
        
        
        
        
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;">Diagnostic Test </td>
        </tr>
            
            <tr> 
                <td style=" width:30%">Write Test Name, Rate, Preparation & Contact Number</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['diagnostic_test']) ? $data1 ['diagnostic_test']:  ''}} </td>
            </tr>
            
            
        
            
            
            
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;">Eye Bank</td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['eye_bank_service_hour'] }}<br></td>
            </tr>
            <tr> 
                <td style=" width:30%">Working Day <br></td>
                <td>:</td>
                <td style=" width:70%">{{$data1['eye_bank_working_day']}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Closed <br></td>
                <td>:</td>
                <td style=" width:70%">{{$data1['eye_bank_closed']}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['eye_bank_contact_number']) ? $data1 ['eye_bank_contact_number']:  ''}} </td>
            </tr>
            
            
            
            
            

            
            
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Facilities </td>
        </tr>
        
            <tr> 
                <td style=" width:30%">ATM Booth  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_atm_booth']) ? $data1 ['facilities_atm_booth']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Cafeteria </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_cafeteria']) ? $data1['facilities_cafeteria']:  ''}} </td>
            </tr>
                <tr>  <td style=" width:30%"> Canteen  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_canteen']) ? $data1['facilities_canteen']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Coffee Shop </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_coffee_shop']) ? $data1['facilities_coffee_shop']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Snacks Corner  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_snacks_conrner']) ? $data1['facilities_snacks_conrner']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Day Care Center  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_day_care_center']) ? $data1['facilities_day_care_center']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Car Parking </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_car_parking']) ? $data1['facilities_car_parking']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Mosque  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_mosque']) ? $data1['facilities_mosque']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Prayer Room  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_prayer_room']) ? $data1['facilities_prayer_room']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Mortuary  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['facilities_mortuary']) ? $data1['facilities_mortuary']:  ''}} </td>
            </tr>
            
            
            
            
            
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
          
            
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Health Check Up Package </td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Advanced Stroke Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_adv_stroke']) ? $data1 ['hlt_chk_adv_stroke']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Breast Cancer Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_breast_cancer']) ? $data1['hlt_chk_breast_cancer']:  ''}} </td>
            </tr>
                <tr>  <td style=" width:30%"> Cardiac Screening   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_cardiac']) ? $data1['hlt_chk_cardiac']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Cancer Screening-Male / Female  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_cancer']) ? $data1['hlt_chk_cancer']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Computerized Eye Screening   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_eye_screening']) ? $data1['hlt_chk_eye_screening']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Cataract Screening   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_cataract']) ? $data1['hlt_chk_cataract']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Corporate Health Check Up  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_corporate_hlt']) ? $data1['hlt_chk_corporate_hlt']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Child Check Up  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_child_chk']) ? $data1['hlt_chk_child_chk']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Diabetic Check Up </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_diabetic']) ? $data1['hlt_chk_diabetic']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Diabetic Eye Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_diabetic_eye']) ? $data1['hlt_chk_diabetic_eye']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Dry Eye Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_dry_eye']) ? $data1['hlt_chk_dry_eye']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Executive Basic Check Up-Male  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_exe_basic_man']) ? $data1['hlt_chk_exe_basic_man']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Executive Basic Check Up-Female  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_exe_basic_woman']) ? $data1['hlt_chk_exe_basic_woman']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Executive Premier Check Up-Male </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_exe_premier_man']) ? $data1['hlt_chk_exe_premier_man']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Executive Premier Check Up-Female  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_exe_premier_woman']) ? $data1['hlt_chk_exe_premier_woman']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Full Mouth Check Up with Caries Prevention-Children  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_full_mouth']) ? $data1['hlt_chk_full_mouth']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Glaucoma Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_glaucoma']) ? $data1['hlt_chk_glaucoma']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Liver Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_liver']) ? $data1['hlt_chk_liver']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Mouth Cancer Screening-Adult  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_mouth_cancer']) ? $data1['hlt_chk_mouth_cancer']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Oral & Dental Health Screening-Adult  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_oral_dental']) ? $data1['hlt_chk_oral_dental']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Osteoporosis Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_osteoporosis']) ? $data1['hlt_chk_osteoporosis']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Stroke Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_stroke']) ? $data1['hlt_chk_stroke']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Thyroid Screening  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_thyroid']) ? $data1['hlt_chk_thyroid']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Whole Body Check Up-Male Below 45 Years  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_whole_body_less_45']) ? $data1['hlt_chk_whole_body_less_45']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Whole Body Check Up-Male Above 45 Years  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_whole_male_plus_45']) ? $data1['hlt_chk_whole_male_plus_45']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Whole Body Check Up-Female Below 35 Years  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_whole_female_less_35']) ? $data1['hlt_chk_whole_female_less_35']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Whole Body Check Up-Female Above 35 Years  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_whole_female_plus_35']) ? $data1['hlt_chk_whole_female_plus_35']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hlt_chk_contact']) ? $data1['hlt_chk_contact']:  ''}} </td>
            </tr>
            
            
            
            
            
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Service  </td>
        </tr>
            
            
            <tr> 
                <td style=" width:30%"> Blood Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_blood_test']) ? $data1 ['hm_serv_blood_test']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Stool Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_stool']) ? $data1 ['hm_serv_stool']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Urine Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_urine']) ? $data1 ['hm_serv_urine']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Blood Pressure Assessment  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_blood_pressure']) ? $data1 ['hm_serv_blood_pressure']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Diabetes Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_diabetes']) ? $data1 ['hm_serv_diabetes']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Weight Measurement  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_weight']) ? $data1 ['hm_serv_weight']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Circumcision  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_circumcision']) ? $data1 ['hm_serv_circumcision']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Nebulization  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_nebulization']) ? $data1 ['hm_serv_nebulization']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> X-ray  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_xray']) ? $data1 ['hm_serv_xray']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> ECG  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_ecg']) ? $data1 ['hm_serv_ecg']:  ''}} </td>
            </tr>
            
            
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_serv_area']) ? $data1 ['hm_serv_serv_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_serv_charge']) ? $data1['hm_serv_serv_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge Negotiable   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_serv_charge_negotiable']) ? $data1['hm_serv_serv_charge_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_serv_hour']) ? $data1['hm_serv_serv_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_working_day']) ? $data1['hm_serv_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_closed']) ? $data1['hm_serv_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['hm_serv_contact']) ? $data1['hm_serv_contact']:  ''}} </td>
            </tr>
        

        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Medical Department  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Write Department Name </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['treat_dept_name']) ? $data1 ['treat_dept_name']:  ''}} </td>
            </tr>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        
        
        
        
                
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Optical Shop  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_service_hour']) ? $data1 ['opt_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_working_day']) ? $data1 ['opt_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_closed']) ? $data1 ['opt_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_contact']) ? $data1 ['opt_contact']:  ''}} </td>
            </tr>
            
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Delivery Service   </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_service_area']) ? $data1 ['opt_home_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Delivery Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_delivery_charge']) ? $data1 ['opt_home_delivery_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Delivery Charge Negotiable  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_delivery_charge_nego']) ? $data1 ['opt_home_delivery_charge_nego']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_service_hour']) ? $data1 ['opt_home_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_working_day']) ? $data1 ['opt_home_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_closed']) ? $data1 ['opt_home_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['opt_home_contact']) ? $data1 ['opt_home_contact']:  ''}} </td>
            </tr>
            

            
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Out Patient Service   </td>
        </tr>
            
            
            <tr> 
                <td style=" width:30%"> Blood Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_blood_test']) ? $data1 ['ops_blood_test']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Stool Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_stool']) ? $data1 ['ops_stool']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Urine Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_urine']) ? $data1 ['ops_urine']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Blood Pressure Assessment  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_blood_pressure']) ? $data1 ['ops_blood_pressure']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Diabetes Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_diabetes']) ? $data1 ['ops_diabetes']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Weight Measurement  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_weight']) ? $data1 ['ops_weight']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Circumcision  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_circumcision']) ? $data1 ['ops_circumcision']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Nebulization  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_nebulization']) ? $data1 ['ops_nebulization']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> X-ray  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_xray']) ? $data1 ['ops_xray']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> ECG  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_ecg']) ? $data1 ['ops_ecg']:  ''}} </td>
            </tr>
            
            
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_serv_area']) ? $data1 ['ops_serv_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_serv_charge']) ? $data1['ops_serv_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge Negotiable   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_serv_charge_negotiable']) ? $data1['ops_serv_charge_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_serv_hour']) ? $data1['ops_serv_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_working_day']) ? $data1['ops_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_closed']) ? $data1['ops_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['ops_contact']) ? $data1['ops_contact']:  ''}} </td>
            </tr>
            

        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Pharmacy </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_service_hour']) ? $data1 ['pha_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_working_day']) ? $data1 ['pha_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_closed']) ? $data1 ['pha_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_contact']) ? $data1 ['pha_contact']:  ''}} </td>
            </tr>
            
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Delivery Service   </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Minimum Order Value (TK) </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_order_tk']) ? $data1 ['pha_order_tk']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_service_area']) ? $data1 ['pha_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Delivery Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_delivery_charge']) ? $data1 ['pha_delivery_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Delivery Charge Negotiable  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_delivery_charge_nego']) ? $data1 ['pha_delivery_charge_nego']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_home_service_hour']) ? $data1 ['pha_home_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_home_working_day']) ? $data1 ['pha_home_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_home_closed']) ? $data1 ['pha_home_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_home_contact']) ? $data1 ['pha_home_contact']:  ''}} </td>
            </tr>
            
            

        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Physiotherapy & Rehabilitation Center  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_service_hour']) ? $data1 ['prc_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_working_day']) ? $data1 ['prc_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_closed']) ? $data1 ['prc_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_contact']) ? $data1 ['prc_contact']:  ''}} </td>
            </tr>
            
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Service   </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_service_area']) ? $data1 ['prc_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_service_charge']) ? $data1 ['prc_service_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Delivery Charge Negotiable  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_service_charge_nego']) ? $data1 ['prc_service_charge_nego']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_home_service_hour']) ? $data1 ['prc_home_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_home_working_day']) ? $data1 ['prc_home_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_home_closed']) ? $data1 ['prc_home_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['prc_home_contact']) ? $data1 ['prc_home_contact']:  ''}} </td>
            </tr>
        
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;">Room Service(Ward, Cabin etc)   </td>
        </tr>
        
        <tr> 
                <td style=" width:30%"> Room Service </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['room_service_name']) ? $data1 ['room_service_name']:  ''}} </td>
            </tr>
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Vaccination Center   </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_service_hour']) ? $data1 ['vc_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_working_day']) ? $data1 ['vc_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_closed']) ? $data1 ['vc_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_contact']) ? $data1 ['vc_contact']:  ''}} </td>
            </tr>
            
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Delivery Service   </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_service_area']) ? $data1 ['vc_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service  Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_service_charge']) ? $data1 ['vc_service_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service  Charge Negotiable  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_service_charge_nego']) ? $data1 ['vc_service_charge_nego']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_home_service_hour']) ? $data1 ['vc_home_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_home_working_day']) ? $data1 ['vc_home_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_home_closed']) ? $data1 ['vc_home_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['vc_home_contact']) ? $data1 ['vc_home_contact']:  ''}} </td>
            </tr>
        
        
            
        
        <tr> 
            <td style=" width:30%">More Information (if any)</td>
            <td>:</td>
            <td style=" width:70%"> {{ nl2br($data1['more_details'])}} </td>
        </tr>

     
     
 </table>
 </div>
</body>
</html>