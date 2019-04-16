@extends('layouts.admin_master')

@section('title', 'Vaccination Center')

@section('angular')
    <script src="{{url('app/admin/vaccine_point/vaccine_point.module.js')}}"></script>
    <script src="{{url('app/admin/vaccine_point/vaccine_point.view.js')}}"></script>
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
                                @if($vaccine_point->photo_path == '')
                                <div class="thumbnail"><img alt="Vaccination Center "  src="{{asset('/vaccination.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="Vaccination Center " src="{{ url($vaccine_point->photo_path) }}">
                                </div>
                                @endif
                            </div>

                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span  style="margin:10px" class="uk-text-truncate">{{$vaccine_point->vaccine_point_name}}</span>
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
                                
                                <li ng-controller="ViewVaccinePointController">
                                    <a style="text-align: left;" ng-click="getMedicalSpecialistDropDown()" href="#">Doctor</a>
                                </li>

                                <li ng-controller="ViewVaccinePointController">
                                    <a style="text-align: left;" ng-click="getSubServiceDropDown()" href="#">Service</a>
                                </li>
                                

                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li><?php echo $vaccine_point->vaccine_point_description; ?>

                                    <div class="uk-grid" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>


                                            <ul class="md-list md-list-addon">
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br ($vaccine_point->vaccine_point_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                                    </div>
                                                </li>

                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br ($vaccine_point->vaccine_point_phone_no) !!}</span>
                                                         <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i style=" margin: 0;" class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$vaccine_point->vaccine_point_email_ad}}</span>
                                                        <span class="uk-text-small uk-text-muted hidden">Email</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i style=" margin: 0;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$vaccine_point->vaccine_point_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">Website</span>
                                                    </div>
                                                </li>
                                                <li class="hidden">
                                                    <div class="md-list-addon-element">
                                                        <i style="font-size:30px; margin: 0;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                                    </div>
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
                                                        <span class="hidden">General:</span> <span><?php echo $vaccine_point->vaccine_point_total_bed; ?></span>
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </div>
                                                                        
                                    <!-- START google maps -->
                                        <div class="uk-width-large-1-1 google_maps_show">
                                             <iframe 
                                                src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $vaccine_point->vaccine_point_latitude }}, {{ $vaccine_point->vaccine_point_longitude }}" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                            </iframe>
                                        </div>
                                    <!-- END google maps -->
                                    
                                </li>
                                <li>
                                    <ul class="md-list">
                                        @foreach($notices as $notice)
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                    <span class="uk-margin-right"><?php echo $notice->vaccine_point_notice_description; ?></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li ng-controller="ViewVaccinePointController">
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
                                                <a href="{{'/'}}frontendmedicalspecialist/view/@{{doctor.id}}/{{$vaccine_point->subdistrict_id}}"><h4 style="color:red;" class=" uk-margin-small-bottom">View Details</h4></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li ng-controller="ViewVaccinePointController">
                                    <input type="hidden" ng-init="vaccine_point_id='asdfg'" value="{{$vaccine_point_id}}" name="vaccine_point_id" ng-model="vaccine_point_id">
                                    <div   class="uk-form-row">
                                        <input id="service_id" name="service_id" ng-model="service_id" ng-change="getVaccinePointService()"    style="width: 100%;" />
                                    </div>
                                    <ul class="md-list">
                                        <li ng-repeat = "service in services">
                                            <div class="md-list-content">
                                                <h4 class="heading_c">@{{service.vaccine_point_service_title}}</h4>
                                                <div>
                                                    <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.vaccine_point_service_description)">
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