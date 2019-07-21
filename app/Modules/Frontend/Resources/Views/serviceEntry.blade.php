<style>
    .icheck-inline {
    display: inline-block;
    margin: 0 !important;
    }
</style>

@extends('layouts.frontend_master_02')

@section('title', 'Enlist Your Service')

@section('angular')
    <script src="{{url('app/frontend/frontend/pharmacy.view.js')}}"></script>
    <script src="{{url('app/frontend/frontend/pharmacy.b_view.js')}}"></script>
@endsection

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

    <style type="text/css">
        .icheck-inline {
    display: inline-block;
    margin: 0 auto !important;
    }
        .resultText{
            text-align: center;
            padding-top: 25px;
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
        .uk-text-truncate {
            overflow: visible !important;
        }
        .uk-form-row+.uk-form-row {
            margin-top: 15px !important;
        }
        .black-border{
            border: 1px solid black;
        }
        .uk-tab-bn>li>a{
            font-size: 15px !important;
        }
    </style>

@endsection

@section('content')

<div class="uk-width-large-7-10">
    <div class="md-card">
        <div class="md-card-content large-padding">

            <div class="uk-grid" data-uk-grid-margin>  <!-- Here start the Main div of two part -->
            
                @if(Session('language') == 'bn')
                
                    <div class="uk-width-medium-1-1">  <!-- Part One -->
                        <p><?php echo $data->b_serviceEntry;?></p>
                    </div>
                
                @else
               
                    <div class="uk-width-medium-1-1">  <!-- Part One -->
                        <p><?php echo $data->serviceEntry;?></p>
                    </div>
                    
                @endif
                    
                
                    <div class="uk-width-medium-1-2"> <!-- Part Two -->     
                
                        
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label for="val_select" class="uk-form-label"></label>
                                    <div class="parsley-row">
                                        
                                        <h2>&nbsp;</h2>
                                        <!--@if($message != "") <h5 style="color: @if($status == 1) green @else red @endif;"><strong>{{ $message }}</strong></h5> @endif-->
                                        <select id="service_list" name="" class="md-input selectable ">
                                            <option> 
                                                @if(Session('language') == 'bn')
                                                    সেবা প্রদানকারী নির্বাচন করুন  
                                                @else
                                                   Select Service Provider
                                                @endif
                                            </option>
                                            <option value="7"> @if(Session('language') == 'bn') ২৪ আউয়ারস্ ফার্মেসী @else 24 Hours Pharmacy @endif </option>
                                            <option value="12">@if(Session('language') == 'bn') অ্যাডিকশন রিহ্যাবিলিটেশন সেন্টার@else Addiction Rehabilitation Center @endif </option>
                                            <option value="2">@if(Session('language') == 'bn') এয়ার অ্যাাম্বুলেন্স  @else  Air Ambulance @endif </option>
                                            <option value="1">@if(Session('language') == 'bn') অ্যাাম্বুলেন্স @else Ambulance @endif </option>
                                            <option value="13">@if(Session('language') == 'bn') বিউটি পার্লার অ্যান্ড স্পা @else Beauty Parlour & Spa @endif </option>
                                            <option value="3">@if(Session('language') == 'bn') ব্লাড ব্যাংক @else Blood Bank @endif </option>
                                            <option value="4">@if(Session('language') == 'bn') ব্লাড ডোনার @else Blood Donor @endif </option>
                                            <option value="8">@if(Session('language') == 'bn') ডক্টরস্‌ প্যানেল @else Doctors Panel @endif </option>
                                            <option value="5">@if(Session('language') == 'bn') আই ব্যাংক  @else Eye Bank @endif </option>
                                            <option value="14">@if(Session('language') == 'bn') ফরেন মেডিক্যাল ইনফরমেশন সেন্টার  @else Foreign Medical Information Center @endif </option>
                                            <option value="15">@if(Session('language') == 'bn') জিম @else Gym @endif </option>
                                            <option value="6">@if(Session('language') == 'bn') হেল্‌থ কেয়ার সেন্টার  @else Health Care Center @endif </option>
                                            <option value="9">@if(Session('language') == 'bn') হারবাল মেডিসিন সেন্টার  @else Herbal Medicine Center @endif </option>
                                            <option value="16">@if(Session('language') == 'bn') হোমিওপ্যাথিক মেডিসিন সেন্টার  @else Homeopathic Medicine Center @endif </option>
                                            <option value="17">@if(Session('language') == 'bn') অপটিক্যাল সপ @else Optical Shop @endif </option>
                                            <option value="18">@if(Session('language') == 'bn') ফার্মেসী @else Pharmacy @endif </option>
                                            <option value="19">@if(Session('language') == 'bn') ফিজিওথেরাপি অ্যান্ড রিহ্যাবিলিটেশন সেন্টার @else Physiotherapy & Rehabilitation Center @endif </option>
                                            <option value="11">@if(Session('language') == 'bn') স্কিন কেয়ার অ্যান্ড লেজার সেন্টার @else Skin Care & Laser Center @endif </option>
                                            <option value="10">@if(Session('language') == 'bn') ভ্যাকসিনেশন সেন্টার @else Vaccination Center @endif </option>
                                            <option value="20">@if(Session('language') == 'bn') ইয়োগা সেন্টার @else Yoga Center @endif </option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                            
                        <br>
                            
                        <div id="24_hours_section" style="display:none;">
                           @include('service-provider.24-hours-pharmacy')
                        </div>   
                        
                        <div id="addiction_rehabilitation_center" style="display:none;">
                           @include('service-provider.addiction-rehabilitation-center')
                        </div>
                        
                        <div id="air_ambulance" style="display:none;">
                           @include('service-provider.air-ambulance')
                        </div>
                        
                        <div id="ambulance" style="display:none;">
                           @include('service-provider.ambulance')
                        </div>
                        
                        <div id="beauty_parlour_and_spa" style="display:none;">
                           @include('service-provider.beauty-parlour-and-spa')
                        </div>
                        
                        <div id="blood_bank" style="display:none;">
                           @include('service-provider.blood-bank')
                        </div>
                        
                        <div id="blood_donor" style="display:none;">
                           @include('service-provider.blood-donor')
                        </div>
                        
                        <div id="doctor_panel" style="display:none;">
                           @include('service-provider.doctor-panel')
                        </div>
                        
                        <div id="eye_bank" style="display:none;">
                           @include('service-provider.eye-bank')
                        </div>
                        
                        <div id="foreign_medical_info" style="display:none;">
                           @include('service-provider.foreign-medical-info')
                        </div>
                            
                        <div id="gym" style="display:none;">
                           @include('service-provider.gym')
                        </div> 
                        
                        <div id="health_care_center" style="display:none;">
                           @include('service-provider.health-care-center')
                        </div> 
                        
                        <div id="herbal_medicine_center" style="display:none;">
                           @include('service-provider.herbal-medicine-center')
                        </div> 
                        
                        <div id="homeopathic_medicine_center" style="display:none;">
                           @include('service-provider.homeopathic-medicine-center')
                        </div> 
                        
                        <div id="optical_shop" style="display:none;">
                           @include('service-provider.optical-shop')
                        </div> 
                        
                        <div id="pharmacy" style="display:none;">
                           @include('service-provider.pharmacy')
                        </div> 
                       
                         <div id="physiotherapy" style="display:none;">
                           @include('service-provider.physiotherapy')
                        </div>
                        
                        <div id="skincare" style="display:none;">
                           @include('service-provider.skincare')
                        </div>
                        
                        <div id="vaccination_center" style="display:none;">
                           @include('service-provider.vaccination-center')
                        </div>
                        
                        <div id="yoga" style="display:none;">
                           @include('service-provider.yoga')
                        </div> 
                        
                            
                    </div> <!--  End Part Two -->
                
            </div>   <!-- End Main div two part -->

        </div>
    </div>
</div>
<input id="backbuttonstate" type="text" value="0" style="display:none;" />

@endsection

@section('script')

    <script>
    
        // $(".select2_service_provider").select2();
        
        $("#main_district_id").select2();
        
        $("#service_list").change(function(){
            
            if($(this).val() == 7){
                $("#24_hours_section").show();
            }
            else{
                $("#24_hours_section").hide();
            }
            if($(this).val() == 12){
                $("#addiction_rehabilitation_center").show();
            }
            else {
                $("#addiction_rehabilitation_center").hide();
            }
            if($(this).val() == 2){
                $("#air_ambulance").show();
            }
            else{
                $("#air_ambulance").hide();
            }
            if($(this).val() == 1){
                $("#ambulance").show();
            }
            else{
                $("#ambulance").hide();
            }
            if($(this).val() == 13){
                $("#beauty_parlour_and_spa").show();
            }
            else{
                $("#beauty_parlour_and_spa").hide();
            } 
            if($(this).val() == 3){
                $("#blood_bank").show();
            }
            else{
                $("#blood_bank").hide();
            }
            if($(this).val() == 4){
                $("#blood_donor").show();
            }
            else{
                $("#blood_donor").hide();
            }
            if($(this).val() == 8){
                $("#doctor_panel").show();
            }
            else{
                $("#doctor_panel").hide();
            }
            if($(this).val() == 5){
                $("#eye_bank").show();
            }
            else{
                $("#eye_bank").hide();
            }
            if($(this).val() == 14){
                $("#foreign_medical_info").show();
            }
            else{
                $("#foreign_medical_info").hide();
            }
            if($(this).val() == 15){
                $("#gym").show();
            }
            else{
                $("#gym").hide();
            }
            if($(this).val() == 6){
                $("#health_care_center").show();
            }
            else{
                $("#health_care_center").hide();
            }
            if($(this).val() == 9){
                $("#herbal_medicine_center").show();
            }
            else{
                $("#herbal_medicine_center").hide();
            }
            if($(this).val() == 16){
                $("#homeopathic_medicine_center").show();
            }
            else{
                $("#homeopathic_medicine_center").hide();
            }
            if($(this).val() == 17){
                $("#optical_shop").show();
            }
            else{
                $("#optical_shop").hide();
            }
            if($(this).val() == 18){
                $("#pharmacy").show();
            }
            else{
                $("#pharmacy").hide();
            }
            if($(this).val() == 19){
                $("#physiotherapy").show();
            }
            else{
                $("#physiotherapy").hide();
            }
            if($(this).val() == 11){
                $("#skincare").show();
            }
            else{
                $("#skincare").hide();
            }
            if($(this).val() == 10){
                $("#vaccination_center").show();
            }
            else{
                $("#vaccination_center").hide();
            }
            if($(this).val() == 20){
                $("#yoga").show();
            }
            else{
                $("#yoga").hide();
            }
            //$('#service_list').prop('disabled', 'disabled');
            
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    var ibackbutton = document.getElementById("backbuttonstate");
    if (ibackbutton.value == "0") {
        // Page has been loaded for the first time - Set marker
        ibackbutton.value = "1";

        var msg = '{{Session::get('message')}}';
        var exist = '{{Session::has('message')}}';
        if(exist){
            alert(msg);
        }

        var enlist_service = '{{Session::has('enlist_service_message')}}';
        var enlist_service_message = '{{Session::get('enlist_service_message')}}';
        if(enlist_service){
            alert(enlist_service_message);
        }
    } else {
        // Back button has been fired.. Do Something different..
        location.reload(true);
    }
    }, false);
    </script>
    
    
    
@endsection