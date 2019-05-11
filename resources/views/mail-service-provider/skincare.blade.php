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
                <td style=" width:30%">General Info</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['general_info'] }} </td>
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
                <td style=" width:30%">Service Hour</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['blood_bank_service_hour']) ? $data1 ['blood_bank_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">  Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['blood_bank_working_day']) ? $data1 ['blood_bank_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%">Closed  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['blood_bank_closed']) ? $data1 ['blood_bank_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['blood_bank_contact_number']) ? $data1 ['blood_bank_contact_number']:  ''}} </td>
            </tr>
            
        
        
        
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Diagnostic Test  </td>
        </tr>
            
            <tr> 
                <td style=" width:30%">Write Test Name, Rate, Preparation & Contact Number</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['diagnostic_test']) ? $data1 ['diagnostic_test']:  ''}} </td>
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
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Medical Department  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Write Department Name  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['treat_dept_name']) ? $data1 ['treat_dept_name']:  ''}} </td>
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
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['pha_contact']) ? $data1 ['pha_contact']:  ''}} </td>
            </tr>
            
            <tr>
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Delivery Service </td>
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
                <td style=" width:30%"> Delivery Charge Negotiable </td>
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
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Room Service (Ward, Cabin etc) </td>
        </tr>
            
            <tr> 
                <td style=" width:30%"> Write Bed Name, Total Bed Number, Free Bed Number, Rent & Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['room_service_name']) ? $data1 ['room_service_name']:  ''}} </td>
            </tr>

        
        <tr> 
            <td style=" width:30%"> More Information (If Any) </td>
            <td>:</td>
            <td style=" width:70%"> {{ isset($data1['more_details']) ? $data1 ['more_details']:  ''}} </td>
        </tr>




     
     
 </table>
 </div>
</body>
</html>