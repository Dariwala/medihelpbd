<html>

<head>
    <title>Medical Morning PDF</title>

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
    
    
    .footer{
        position: relative ; left: 0px; bottom: 0px; right: 0px; 
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
        .footer{
            position: relative ; left: 0px; bottom: 0px; right: 0px; 
        }
    }
</style>
</head>
<body >
<div class="uk-grid" data-uk-grid-margin="">
    <div style="text-align: center; margin-left: 28px;" class="uk-width-small-5-5 uk-text-center">
        
        <p style="line-height: 10px; "class="heading_b">{{ $medical_specialist->medical_specialist_name }}</p>
        @if(isset($all_appointments_morning_new[0]))
            <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                  {{ $all_appointments_morning_new[0]->appointment->chamber_name }}
            </p>
        @elseif(isset($all_appointments_morning_report[0]))
            <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                  {{ $all_appointments_morning_report[0]->appointment->chamber_name }}
            </p>
        @elseif(isset($chambers_id->chamber_name))
        
            <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                {{ $chambers_id->chamber_name }}
            </p>
            
        @else
        
            <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                  No Chamber Found
            </p>
        
        @endif 
        <?php 
        
         $current_date = date('d M Y'); ?>
        <p style="line-height: 10px;" class="uk-text-large"> @if(isset($searched_date)) {{ date('d M, Y',strtotime($searched_date)) }} @else {{ date('d M, Y',strtotime($current_date)) }} @endif</p>
        <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                 Time: Morning
            </p>
    </div>
</div>
<div class="uk-grid">
    
    <div style="padding-left: 28px; padding-right: -1px;" class="uk-width-medium-1-1">
        
        <div class="uk-overflow-container uk-margin-medium-top">
            
            <p style="text-align: left; font-size: 12px;font-weight: 600">Type: New</p>
            @if(isset($all_appointments_morning_new[0]))
                <table style="text-align: center;" width="100%" class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th width="10%" >Sl</th>
                        <th width="50%">Patient Name</th>
                        <th width="40%">Contact No.</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="text-align: left;">Sl</th>
                        <th style="text-align: left;">Patient Name</th>
                        <th style="text-align: left;">Contact No.</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($all_appointments_morning_new as $key=>$booking)
                            <tr>
                                <td style="text-align: left;">{{ $key+1 }}</td>
                                <td style="text-align: left;">{{ $booking->patient_name }}</td>
                                <td style="text-align: left;">{{ $booking->contact_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: left;">No Appointment for today.</p>
            @endif

            <!--<p style="text-align: center; font-size: 14px;font-weight: 600">Morning</p>-->
            <p style="text-align: left; font-size: 12px;font-weight: 600">Type: Report</p>
            @if(isset($all_appointments_morning_report[0]))
                <table style="text-align: center;" class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th width="10%" >Sl</th>
                        <th width="50%">Patient Name</th>
                        <th width="40%">Contact No.</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="text-align: left;">Sl</th>
                        <th style="text-align: left;">Patient Name</th>
                        <th style="text-align: left;">Contact No.</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($all_appointments_morning_report as $key=>$booking)
                            <tr>
                                <td style="text-align: left;">{{ $key+1 }}</td>
                                <td style="text-align: left;">{{ $booking->patient_name }}</td>
                                <td style="text-align: left;">{{ $booking->contact_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: left;">No Appointment for today.</p>
            @endif
        </div>
    
            
        <div class="uk-overflow-container uk-margin-medium-top">

        </div>
    </div>
    
    <p style="line-height: 10px; font-weight: 600;text-align: center;"class="uk-text-large"> 
             Sponsored by: medihelpbd.com
    </p>

</div>

<br>
<br>

    
<script>
    window.onload =function () {

        print();

    }
</script>
</body>
</html>