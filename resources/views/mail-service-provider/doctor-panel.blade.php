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
                <td style=" width:30%"> Department </td>
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
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Contact Number</td>
        </tr>

            <tr> 
                <td style=" width:30%"> Personal </td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['con_info_personal'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Residence</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['con_info_residence'] }} <br></td>
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
                <td style=" width:30%">Registration Type (BM & DC/Others)</td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['dc_reg_type'] }} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Registration Number </td>
                <td>:</td>
                <td style=" width:70%">{{ $data1['dc_reg_number'] }}</td>
            </tr>
            <tr> 
                <td style=" width:30%">Qualification</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['dc_reg_qualification'] }} <br></td>
            </tr>
            <tr> 
                <td style=" width:30%">Designation</td>
                <td>:</td>
                <td style=" width:70%"> {{ $data1['dc_reg_designation'] }} </td>
            </tr>  
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Home Service  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Service Area </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_home_service_area']) ? $data1 ['dc_home_service_area']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_home_service_charge']) ? $data1['dc_home_service_charge']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Charge Negotiable   </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_home_service_charge_negotiable']) ? $data1['dc_home_service_charge_negotiable']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Service Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_home_service_hour']) ? $data1['dc_home_service_hour']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_home_working_day']) ? $data1['dc_home_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_home_closed']) ? $data1['dc_home_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ nl2br($data1['dc_home_contact_number'])}} </td>
            </tr>
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Chamber-1  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Name </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_name']) ? $data1 ['dc_cham_1_name']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Address </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_address']) ? $data1 ['dc_cham_1_address']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_contact_number']) ? $data1 ['dc_cham_1_contact_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Emergency Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_emergency_number']) ? $data1 ['dc_cham_1_emergency_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Hotline </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_hotline']) ? $data1 ['dc_cham_1_hotline']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Time of Serial </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_time_serial']) ? $data1 ['dc_cham_1_time_serial']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_serial_number']) ? $data1 ['dc_cham_1_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Direct Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_direct_serial_number']) ? $data1 ['dc_cham_1_direct_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial by SMS </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_serial_sms']) ? $data1 ['dc_cham_1_serial_sms']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> The serial number is not given on the phone. Come directly to the serial  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_come']) ? $data1 ['dc_cham_1_come']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Visiting Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_visiting']) ? $data1 ['dc_cham_1_visiting']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Room Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_room_number']) ? $data1 ['dc_cham_1_room_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_working_day']) ? $data1 ['dc_cham_1_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_closed']) ? $data1 ['dc_cham_1_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Doctor’s Assistant Phone Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_assis_phone']) ? $data1 ['dc_cham_1_assis_phone']:  ''}} </td>
            </tr>
            <tr>
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Consultation Fee </td>
            </tr>
            <tr> 
                <td style=" width:30%"> New </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_consult_new']) ? $data1 ['dc_cham_1_consult_new']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Old </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_consult_old']) ? $data1 ['dc_cham_1_consult_old']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Report </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_1_consult_report']) ? $data1 ['dc_cham_1_consult_report']:  ''}} </td>
            </tr>
          
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Chamber-2  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Name </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_name']) ? $data1 ['dc_cham_2_name']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Address </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_address']) ? $data1 ['dc_cham_2_address']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_contact_number']) ? $data1 ['dc_cham_2_contact_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Emergency Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_emergency_number']) ? $data1 ['dc_cham_2_emergency_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Hotline </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_hotline']) ? $data1 ['dc_cham_2_hotline']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Time of Serial </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_time_serial']) ? $data1 ['dc_cham_2_time_serial']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_serial_number']) ? $data1 ['dc_cham_2_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Direct Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_direct_serial_number']) ? $data1 ['dc_cham_2_direct_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial by SMS </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_serial_sms']) ? $data1 ['dc_cham_2_serial_sms']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> The serial number is not given on the phone. Come directly to the serial  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_come']) ? $data1 ['dc_cham_2_come']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Visiting Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_visiting']) ? $data1 ['dc_cham_2_visiting']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Room Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_room_number']) ? $data1 ['dc_cham_2_room_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_working_day']) ? $data1 ['dc_cham_2_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_closed']) ? $data1 ['dc_cham_2_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Doctor’s Assistant Phone Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_assis_phone']) ? $data1 ['dc_cham_2_assis_phone']:  ''}} </td>
            </tr>
            <tr>
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Consultation Fee </td>
            </tr>
            <tr> 
                <td style=" width:30%"> New </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_consult_new']) ? $data1 ['dc_cham_2_consult_new']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Old </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_consult_old']) ? $data1 ['dc_cham_2_consult_old']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Report </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_2_consult_report']) ? $data1 ['dc_cham_2_consult_report']:  ''}} </td>
            </tr>
           
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
        
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Chamber-3  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Name </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_name']) ? $data1 ['dc_cham_3_name']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Address </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_address']) ? $data1 ['dc_cham_3_address']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_contact_number']) ? $data1 ['dc_cham_3_contact_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Emergency Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_emergency_number']) ? $data1 ['dc_cham_3_emergency_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Hotline </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_hotline']) ? $data1 ['dc_cham_3_hotline']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Time of Serial </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_time_serial']) ? $data1 ['dc_cham_3_time_serial']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_serial_number']) ? $data1 ['dc_cham_3_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Direct Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_direct_serial_number']) ? $data1 ['dc_cham_3_direct_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial by SMS </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_serial_sms']) ? $data1 ['dc_cham_3_serial_sms']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> The serial number is not given on the phone. Come directly to the serial  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_come']) ? $data1 ['dc_cham_3_come']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Visiting Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_visiting']) ? $data1 ['dc_cham_3_visiting']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Room Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_room_number']) ? $data1 ['dc_cham_3_room_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_working_day']) ? $data1 ['dc_cham_3_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_closed']) ? $data1 ['dc_cham_3_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Doctor’s Assistant Phone Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_assis_phone']) ? $data1 ['dc_cham_3_assis_phone']:  ''}} </td>
            </tr>
            <tr>
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Consultation Fee </td>
            </tr>
            <tr> 
                <td style=" width:30%"> New </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_consult_new']) ? $data1 ['dc_cham_3_consult_new']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Old </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_consult_old']) ? $data1 ['dc_cham_3_consult_old']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Report </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_3_consult_report']) ? $data1 ['dc_cham_3_consult_report']:  ''}} </td>
            </tr>
    
        <tr>
            <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Outdoor Consultation (If Any)  </td>
        </tr>
            <tr> 
                <td style=" width:30%"> Name </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_name']) ? $data1 ['dc_cham_4_name']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Address </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_address']) ? $data1 ['dc_cham_4_address']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Contact Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_contact_number']) ? $data1 ['dc_cham_4_contact_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Emergency Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_emergency_number']) ? $data1 ['dc_cham_4_emergency_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Hotline </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_hotline']) ? $data1 ['dc_cham_4_hotline']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Time of Serial </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_time_serial']) ? $data1 ['dc_cham_4_time_serial']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_serial_number']) ? $data1 ['dc_cham_4_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Direct Serial Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_direct_serial_number']) ? $data1 ['dc_cham_4_direct_serial_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Serial by SMS </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_serial_sms']) ? $data1 ['dc_cham_4_serial_sms']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> The serial number is not given on the phone. Come directly to the serial  </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_come']) ? $data1 ['dc_cham_4_come']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Visiting Hour </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_visiting']) ? $data1 ['dc_cham_4_visiting']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Room Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_room_number']) ? $data1 ['dc_cham_4_room_number']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Working Day </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_working_day']) ? $data1 ['dc_cham_4_working_day']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Closed </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_closed']) ? $data1 ['dc_cham_4_closed']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Doctor’s Assistant Phone Number </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_assis_phone']) ? $data1 ['dc_cham_4_assis_phone']:  ''}} </td>
            </tr>
            <tr>
                <td colspan="3" class="info text-center" style="font-size: 16px;font-weight: bold;"> Consultation Fee </td>
            </tr>
            <tr> 
                <td style=" width:30%"> New </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_consult_new']) ? $data1 ['dc_cham_4_consult_new']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Old </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_consult_old']) ? $data1 ['dc_cham_4_consult_old']:  ''}} </td>
            </tr>
            <tr> 
                <td style=" width:30%"> Report </td>
                <td>:</td>
                <td style=" width:70%"> {{ isset($data1['dc_cham_4_consult_report']) ? $data1 ['dc_cham_4_consult_report']:  ''}} </td>
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