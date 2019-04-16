@extends('layouts.admin_master')

@section('title', 'Pharmacy')

@section('angular')
    <script src="{{url('app/admin/pharmacynew/pharmacynew.module.js')}}"></script>
    <script src="{{url('app/admin/pharmacynew/pharmacynew.view.js')}}"></script>
@endsection

@section('content')
    
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
                                @if($pharmacynew->photo_path == '')
                                <div class="thumbnail"><img alt="pharmacynew"  src="{{asset('/pharmacynew.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="pharmacynew" src="{{ url($pharmacynew->photo_path) }}">
                                </div>
                                @endif
                            </div>
                
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$pharmacynew->pharmacynew_name}}</span>
                                </h2>
                            </div>
                        </div>
                
                
                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a href="#">About</a>
                                </li>
                
                                <li>
                                    <a  href="#">Article</a>
                                </li>
                                
                                <li ng-controller="ViewPharmacynewController">
                                    <a ng-click="getMedicalSpecialistDropDown()" href="#">Doctor</a>
                                </li>
                
                                <li ng-controller="ViewPharmacynewController">
                                    <a ng-click="getproductSubCategoryDropDown()" href="#">Medicinal</a>
                                </li>
                                
                                <li ng-controller="ViewPharmacynewController">
                                    <a href="#">Service</a>
                                </li>
                            </ul>
                
                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li><?php echo $pharmacynew->pharmacynew_description; ?>
                
                                    <div class="uk-grid" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($pharmacynew->pharmacynew_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px"  class="md-list-heading">{!! nl2br ($pharmacynew->pharmacynew_phone_no) !!}</span>
                                                         <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                
                
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$pharmacynew->pharmacynew_email_ad}}</span>
                                                        <span class="uk-text-small uk-text-muted hidden">Email</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i style="margin: 0" style="font-size:30px;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                                    </div>
                
                
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$pharmacynew->pharmacynew_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">Website</span>
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
                                    
                                    <div class="uk-margin uk-margin-large-bottom" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">General Info</h4>
                                            <ul class="md-list uk-margin-small-top">
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="hidden">General:</span> <span><?php echo  $pharmacynew->total_medicine; ; ?></span>
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <ul class="md-list">
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                @foreach($notices as $notice)
                                                    <span class="uk-margin-right"><?php echo $notice->pharmacynew_notice_description; ?></span>
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li ng-controller="ViewPharmacynewController">
                                    <input type="hidden" ng-init="pharmacynew_id='asdfg'" value="{{$pharmacynew_id}}" name="pharmacynew_id" ng-model="pharmacynew_id">
                                    <div class="uk-form-row">
                                        <input id="department_id" name="department_id" ng-model="department_id" ng-change="getMedicalSpecialist()" style="width: 100%;" />
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
                                                <a href="{{'/'}}frontendmedicalspecialist/view/@{{doctor.id}}/{{$pharmacynew->subdistrict_id}}"><h4 style="color:red;" class=" uk-margin-small-bottom">View Details</h4></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="md-list">
                                        @foreach($products as $product)
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                    <span class="uk-margin-right"><?php echo $product->pharmacynew_product_description; ?></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                
                                <li ng-controller="ViewPharmacynewController">
                                    <input type="hidden" ng-init="pharmacynew_id='asdfg'" value="{{ $pharmacynew_id }}" name="pharmacynew_id" ng-model="pharmacynew_id">
                                    <div class="uk-form-row">
                                        <input id="service_id" name="service_id" ng-model="service_id" ng-change="getPharmacynewService()" style="width: 100%;" />
                                    </div>
                                    <ul class="md-list">
                                        <li ng-repeat = "service in services">
                                            <div style="margin-top: -10px;" class="md-list-content">
                                                <div>
                                                    <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.pharmacynew_service_description)"></span>
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