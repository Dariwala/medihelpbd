@extends('layouts.frontend_master')

@section('title', 'Medical Specialist')
<style>
    li.apppointment p{
        font-size:12px !important;
        line-height:5px;
    }
    li.apppointment{
        padding-bottom:inherit;
    }
    .booling-info .uk-grid label, .material-icons{
        font-size:12px;
    }
    .resultText{
        text-align: center;
        padding-top: 30px;
        padding-right: 15px;
        font-size: 1.4em;
        color: white;
        font-weight: bold;
    }
    .selectedSidebar{
        background-color: #e4e4e4;
    }
    #sidebar_main .sidebar_main_header {
        margin-bottom: 0px !important;
    }
    
    @media print {
        .uk-table{
            width:100%;
            margin:0;
            padding:0;
        }
        
        .uk-table tr td{
            font-size:14px;
        }
    }
</style>

@section('aside')

    <?php
        class BanglaConverter {
            public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
            public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
            
            public static function bn2en($number) {
                return str_replace(self::$bn, self::$en, $number);
            }
            
            public static function en2bn($number) {
                return str_replace(self::$en, self::$bn, $number);
            }
        }
    ?>

    @if(Session('language')=='bn')
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">মোট ফলাফল: {{BanglaConverter::en2bn($total_result)}}</</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($medical_specialist->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_medical_specialist_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_medical_specialist_name}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>
    @else
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">Total Result: {{$total_result}}</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($medical_specialist->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->medical_specialist_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->medical_specialist_name}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>
    @endif

@endsection


@section('content')



        <div class="md-card">
            <div class="user_content ">

                <div class="uk-width-medium-1-1 ">


                    <div class="md-card-content print_bg">
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-small-5-5 uk-text-center">
                                
                                <p style="line-height: 10px; "class="heading_b">{{ $medical_specialist->medical_specialist_name }}</p>
                                <p style="line-height: 10px; font-weight: 600;"class="uk-text-large">{{ $chambers_id->chamber_name }}</p>
                                <?php 
                                 $current_date = date('d M Y'); ?>
                                <p style="line-height: 10px;" class="uk-text-large">{{ $current_date }}</p>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                
                                
                                <p class="hidden-print"> <span id="print">print</span></p>
                                <div class="uk-overflow-container">
                                    <p style="text-align: center; font-size: 14px;font-weight: 600">Evening</p>
                                    <p style="text-align: center; font-size: 12px;font-weight: 600">New</p>
                                    @if(isset($all_appointments_evening_new[0]))
                                        <table class="uk-table uk-table-hover">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Chamber Name</th>
                                                <th>Patient Name</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Chamber Name</th>
                                                <th>Patient Name</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($all_appointments_evening_new as $key=>$booking)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $booking->appointment['chamber_name'] }}</td>
                                                        <td>{{ $booking->patient_name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p style="text-align: center;">No Appointment for today.</p>
                                    @endif

                                    <p style="text-align: center; font-size: 14px;font-weight: 600">Evening</p>
                                    <p style="text-align: center; font-size: 12px;font-weight: 600">Report</p>
                                     @if(isset($all_appointments_evening_report[0]))
                                        <table class="uk-table uk-table-hover">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Chamber Name</th>
                                                <th>Patient Name</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Chamber Name</th>
                                                <th>Patient Name</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($all_appointments_evening_report as $key=>$booking)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $booking->appointment['chamber_name'] }}</td>
                                                        <td>{{ $booking->patient_name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p style="text-align: center;">No Appointment for today.</p>
                                    @endif

                                    <p style="text-align: center;">Sponsored by :medihelpbd.com</p>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                                    
                </div>
            </div>
        </div>
    

    
@endsection

@section('script')
<script>
    $('#submitBtn').click(function() {
         var appointtime = '';
         var appointtype = '';
         
         if($('#appointmentTime').val() == 1){
             
            appointtime = 'Morning';
        
         } else {
        
            appointtime = 'Evening';
         }
         
         if($('#appointmentType').val() == 1){
             
            appointtype = 'New';
        
         } else {
        
            appointtype = 'Report';
         }
        
        
         $('#chamber_id').text( $("#chamberId option:selected").html() );
         $('#appointment_date').text($('#appointmentDate').val());
         $('#appointment_time').text( appointtime );
         $('#appointment_type').text( appointtype );
         $('#patient_name').text($('#patientName').val());
         $('#contact_number').text($('#contactNumber').val());
    });
    
    $('#submit').click(function(){
        $('#formfield').submit();
    });
</script>

<script>
    $("#print").click(function(){
        window.print();
    });
    
    
</script>
@endsection
