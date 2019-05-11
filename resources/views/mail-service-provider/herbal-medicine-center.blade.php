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
                <td style=" width:30%">E-mail:</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_email'] }} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> General Info</td>
        </tr>
            <tr> 
                <td style=" width:30%">No ‘Fee’ is payable for consultation</td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['herbarl_gre_info']) ? $data1 ['herbarl_gre_info']:  ''}} </td>
            </tr>
        
        <tr> 
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Service</td>
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
                <td style=" width:30%"> Blood Pressure Assessment  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['herbal_ms_blood']) ? $data1 ['herbal_ms_blood']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> herbal_ms_blood  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['herbal_ms_diabetes']) ? $data1 ['herbal_ms_diabetes']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Weight Measurement  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['herbal_ms_weight']) ? $data1 ['herbal_ms_weight']:  ''}} </td>
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