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
                <td style=" width:30%">E-mail</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_email'] }} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> General Info</td>
        </tr>
            <tr> 
                <td style=" width:30%">Business Category </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['business_category']) ? $data1 ['business_category']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">There is a pharmacist to explain the various rules and regulations of medication</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pharmacist']) ? $data1 ['pharmacist']:  ''}} </td>
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
                <td style=" width:30%">Wheel Chair   </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['wheel_chair']) ? $data1['wheel_chair']: '' }} </td>
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
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Delivery Service  </td>
        </tr>
        
            <tr> 
                <td style=" width:30%">Minimum Order Value (TK)</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_minumum_ord']) ? $data1 ['home_delivary_minumum_ord']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Service Area</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_service_area']) ? $data1 ['home_delivary_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">  Delivery Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_delivery_charge']) ? $data1 ['home_delivary_delivery_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Delivery Charge Negotiable  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_negotiable']) ? $data1 ['home_delivary_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_service_hour']) ? $data1 ['home_delivary_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_working_day']) ? $data1 ['home_delivary_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_close']) ? $data1 ['home_delivary_close']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_contuct_number']) ? $data1 ['home_delivary_contuct_number']:  ''}} </td>
            </tr>
        
        
        
        
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Medical Service  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Blood Pressure Assessment  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_blood_presssure']) ? $data1 ['home_service_blood_presssure']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Diabetes Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_diabets_test']) ? $data1 ['home_service_diabets_test']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Weight Measurement  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_weight_measrement']) ? $data1 ['home_service_weight_measrement']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Nebulization   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_nebulization']) ? $data1 ['home_service_nebulization']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Circumcisiont   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_circumcisiont']) ? $data1 ['home_service_circumcisiont']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Injection Push   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_injection_push']) ? $data1 ['home_service_injection_push']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Area   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_area']) ? $data1 ['home_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_delivary_service_charge']) ? $data1 ['home_delivary_service_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge Negotiable   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_charge_negotiable']) ? $data1 ['home_service_charge_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_service_hour']) ? $data1 ['home_service_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_working_day']) ? $data1 ['home_service_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_close']) ? $data1 ['home_service_close']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['home_service_number']) ? $data1 ['home_service_number']:  ''}} </td>
            </tr>
            
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Medical Service  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Blood Pressure Assessment  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['medical_service_blood_presssure']) ? $data1 ['medical_service_blood_presssure']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Diabetes Test  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['medical_service_diabets_test']) ? $data1 ['medical_service_diabets_test']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Weight Measurement  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['medical_service_weight_measrement']) ? $data1 ['medical_service_weight_measrement']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Nebulization   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['medical_service_nebulization']) ? $data1 ['medical_service_nebulization']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Circumcisiont   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['medical_service_circumcisiont']) ? $data1 ['medical_service_circumcisiont']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Injection Push   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['medical_service_injection_push']) ? $data1 ['medical_service_injection_push']:  ''}} </td>
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