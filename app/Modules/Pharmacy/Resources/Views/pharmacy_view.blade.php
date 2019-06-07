<style>
    .google_maps_show{
        display: block !important;
    }
</style>
@extends('layouts.admin_master')

@section('title', '24 Hours Pharmacy')

@section('angular')
    <script src="{{url('app/admin/pharmacy/pharmacy.module.js')}}"></script>
    <script src="{{url('app/admin/pharmacy/pharmacy.view.js')}}"></script>
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
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                 @if($pharmacy->photo_path == '')
                                <div class="thumbnail"><img alt="pharmacy"  src="{{asset('/pharmacy.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="pharmacy" src="{{ url($pharmacy->photo_path) }}">
                                </div>
                                @endif
                            </div>

                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin:10px" class="uk-text-truncate">{{$pharmacy->pharmacy_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align:center"  href="#">About</a>
                                </li>

                                <li>
                                    <a  style="text-align:center" href="#">Article</a>
                                </li>
                                
                                <li ng-controller="ViewPharmacyController">
                                    <a style="text-align:center" ng-click="getMedicalSpecialistDropDown()" href="#">Doctor</a>
                                </li>
                                
                                <li ng-controller="ViewPharmacyController">
                                    <a style="text-align:center;" href="#">Medicinal</a>
                                </li>
                                
                                <li ng-controller="ViewPharmacyController">
                                    <a style="text-align:center;" ng-click="getSubServiceDropDown()" href="#">Service</a>
                                </li>
                            </ul>
                            
                            
                            <div class="uk-margin" data-uk-grid-margin>
                            
                                <div class="uk-width-large-1-1">
                                    
                                    <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                    <li><?php echo $pharmacy->pharmacy_description; ?>
    
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-1-1">
                                                <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>
                                                <ul class="md-list md-list-addon">
                                                    <li style="margin-left: 45px !important;">
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span style="margin-top:5px" class="md-list-heading">{!! nl2br($pharmacy->pharmacy_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                                        </div>
                                                    </li>
                                                    <li style="margin-left: 45px !important;">
                                                        <div class="md-list-addon-element">
                                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                        </div>
                                                        <div class="md-list-content">
                                                            <span style="margin-top:5px"  class="md-list-heading">{!! nl2br ($pharmacy->pharmacy_phone_no) !!}</span>
                                                             <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                                        </div>
                                                    </li>
                                                    <li style="margin-left: 45px !important;">
                                                        <div class="md-list-addon-element">
                                                            <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                                        </div>
    
    
                                                        <div class="md-list-content">
                                                            <span style="margin-top:5px" class="md-list-heading">{{$pharmacy->pharmacy_email_ad}}</span>
                                                            <span class="uk-text-small uk-text-muted hidden">Email</span>
                                                        </div>
                                                    </li>
                                                    <li style="margin-left: 45px !important;">
                                                        <div class="md-list-addon-element">
                                                            <i style="margin: 0" style="font-size:30px;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                                        </div>
    
    
                                                        <div class="md-list-content">
                                                            <span style="margin-top:5px" class="md-list-heading">{{$pharmacy->pharmacy_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">Website</span>
                                                        </div>
                                                    </li>
                                                    <li class="hidden">
                                                        <div class="md-list-addon-element">
                                                            <i style="margin: 0" style="font-size:30px;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="uk-margin uk-margin-large-bottom" data-uk-grid-margin>
                                            <div class="uk-width-large-1-1">
                                                <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">General Info</h4>
                                                <ul class="md-list uk-margin-small-top">
                                                    <li>
                                                        <div class="md-list-content">
                                                            <span class="hidden">General:</span> <span><?php echo  $pharmacy->total_medicine; ; ?></span>
                                                        </div>
                                                    </li>
                                                </ul>  
                                            </div>
                                        </div>
                                        
                                        @if( $pharmacy->pharmacy_latitude != '' && $pharmacy->pharmacy_longitude != '' )
                                        <!-- START google maps -->
                                        <div class="uk-width-large-1-1 google_maps_show">
                                             <iframe 
                                                src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $pharmacy->pharmacy_latitude }}, {{ $pharmacy->pharmacy_longitude }}" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <!-- END google maps -->
                                        @endif
                                        
                                        
                                    </li>
                                    
                                    
                                    <li>
                                        <ul class="md-list">
                                            @foreach($notices as $notice)
                                            <li style="padding-top: 0px;">
                                                <div class="md-list-content">
                                                        <span class="uk-margin-right"><?php echo $notice->pharmacy_notice_description; ?></span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
                                    <li ng-controller="ViewPharmacyController">
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
                                                    <a href="{{'/'}}frontendmedicalspecialist/view/@{{doctor.id}}/{{$pharmacy->subdistrict_id}}"><h4 style="color:red;" class=" uk-margin-small-bottom">View Details</h4></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
    
                                    <li>
                                        <ul class="md-list">
                                            @foreach($products as $product)
                                            <li style="padding-top: 0px;">
                                                <div class="md-list-content">
                                                        <span class="uk-margin-right"><?php echo $product->pharmacy_product_description; ?></span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
                                    <li ng-controller="ViewPharmacyController">
                                        <input type="hidden" ng-init="pharmacy_id='asdfg'" value="{{$pharmacy_id}}" name="pharmacy_id" ng-model="pharmacy_id">
                                        <div   class="uk-form-row">
                                            <input id="service_id" name="service_id" ng-model="service_id" ng-change="getPharmacyService()" style="width: 100%;" />
                                        </div>
                                        <ul class="md-list">
                                            <li ng-repeat = "service in services">
                                                <div class="md-list-content">
                                                    <h4 class="heading_c">@{{service.pharmacy_service_title}}</h4>
                                                    <div>
                                                        <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.pharmacy_service_description)">
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
        </div>
    </div>
@endsection