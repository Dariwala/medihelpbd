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
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> GeneralInfo</td>
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
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;">Ambulance Facilities</td>
        </tr>
        
            <tr> 
                <td style=" width:30%"> ICU  </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['amb_facilities_icu']) ? ($data1['amb_facilities_icu']):''  }}</td>
            </tr>
            <tr> 
                <td style=" width:30%"> Normal  <br> </td>
                <td>:</td>
                <td style=" width:70%">{{ isset($data1['amb_facilities_normal']) ? $data1['amb_facilities_normal'] : ''  }} </td>
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
            <td style=" width:30%">Service</td>
            <td>:</td>
            <td style=" width:70%"> {{ $data1['service_details']}} </td>
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