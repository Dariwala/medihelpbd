@extends('layouts.admin_master')

@section('title', 'Eye Bank')

@section('angular')
    <script src="{{url('app/admin/eye_bank/eye_bank.module.js')}}"></script>
    <script src="{{url('app/admin/eye_bank/eye_bank.view.js')}}"></script>
@endsection

@section('content')

<style type="text/css">
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

<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    @if($eye_bank->photo_path == '')
                                        <img alt="user avatar" src="{{asset('/EyeBank.jpg')}}">
                                    @else
                                        <img alt="user avatar" src="{{url('uploads/eye_bank').'/'.$eye_bank->eye_bank_photo}}">
                                    @endif
                                </div>
                            </div>

                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$eye_bank->eye_bank_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                
                                <li class="uk-active">
                                    <a style="text-align: left;" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align: left;" href="#">Article</a>
                                </li>
                                <li ng-controller="ViewEyeBankController">
                                    <a style="text-align: left;" ng-click="getMedicalSpecialistDropDown()" href="#">Doctor</a>
                                </li>
                                <li ng-controller="ViewEyeBankController">
                                    <a style="text-align: left;" href="#">Service</a>
                                </li>
                                
                            </ul>

                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li><?php echo $eye_bank->eye_bank_description; ?>

                                    <div class="uk-grid" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>


                                            <ul class="md-list md-list-addon">
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($eye_bank->eye_bank_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                                    </div>
                                                </li>

                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($eye_bank->eye_bank_phone_no) !!}</span>
                                                         <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$eye_bank->eye_bank_email_ad}}</span>
                                                        <span class="uk-text-small uk-text-muted hidden">Email</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                       <i  style= "margin: 0" class="md-list-addon-icon material-icons">language</i> 
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$eye_bank->eye_bank_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">Facebook</span>
                                                    </div>
                                                </li>
                                                <li class="hidden">
                                                    <div class="md-list-addon-element">
                                                       <i  style= "margin: 0" class="md-list-addon-icon material-icons">language</i> 
                                                    </div>
                                                    <hr>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="uk-margin uk-margin-large-bottom" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">General Info</h4>
                                            <ul class="md-list uk-margin-small-top">
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="hidden">General:</span> <span><?php echo $eye_bank->total_eye; ?></span>
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </div>
                                    
                                    <!-- START google maps -->
                                    <div class="uk-width-large-1-1 google_maps_show">
                                         <iframe 
                                            src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $eye_bank->eye_bank_latitude }}, {{ $eye_bank->eye_bank_longitude }}" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                        </iframe>
                                    </div>
                                     <!-- END google maps -->
                                    
                                    
                                </li>
                                <li>
                                    <ul class="md-list">
                                        @foreach($notices as $notice)
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                    <span class="uk-margin-right"><?php echo $notice->eye_bank_notice_description; ?></span>
                                            
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li ng-controller="ViewEyeBankController">
                                    <div class="uk-form-row">
                                        <input id="department_id" name="department_id" ng-model="department_id" ng-change="getMedicalSpecialist()"    style="width: 100%;" />
                                    </div>
                                    <div class="uk-form-row">
                                        <input id="medical_specialist_id" name="medical_specialist_id" ng-model="medical_specialist_id" ng-change="getDoctor()"  style="width: 100%;" />
                                    </div>
                                    <ul class="md-list uk-margin-top">
                                        <li ng-repeat = "doctor in doctors" style = "padding-top: 0px;">
                                            <div class="md-list-content">
                                                <div>
                                                    <span class="uk-margin-right">
                                                        <img class="black-border" style="height:100px;width:100px;" ng-src="{{'/'}}@{{doctor.photo_path}}">
                                                    </span>
                                                </div>
                                                <h4 class="heading_c" style = "margin-top: 10px;">@{{doctor.medical_specialist_name}}</h4>
                                                <a href="{{'/'}}frontendmedicalspecialist/view/@{{doctor.id}}/{{$eye_bank->subdistrict_id}}"><h4 style="color:red;" class=" uk-margin-small-bottom">View Details</h4></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                 <li ng-controller="ViewEyeBankController">
                                    <input type="hidden" ng-init="eye_bank_id='asdfg'" value="{{$eye_bank_id}}" name="eye_bank_id" ng-model="eye_bank_id">
                                    <div   class="uk-form-row">
                                        <input id="service_id" name="service_id" ng-model="service_id" ng-change="getEyeBankService()"    style="width: 100%;" />
                                    </div>
                                    <ul class="md-list">
                                        <li ng-repeat = "service in services">
                                            <div class="md-list-content">
                                                <div>
                                                    <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.eye_bank_service_description)">
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection