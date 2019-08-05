@extends('layouts.frontend_master')

@section('title', 'Homeopathic Medicine Center')

@section('angular')
    <script src="{{url('app/frontend/frontend/homeopathic.view.js')}}"></script>
    <script src="{{url('app/frontend/frontend/homeopathic.b_view.js')}}"></script>
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

    <style type="text/css" media="print">
        div { visibility: hidden; display: none }
    </style>

    @if(Session('language')=='bn')
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">মোট ফলাফল <br/>{{BanglaConverter::en2bn($total_result)}}</</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($homeopathic->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendhomeopathic/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_homeopathic_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendhomeopathic/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_homeopathic_name}}</span>
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
                <h4 class="resultText">Total Result <br/>{{$total_result}}</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($homeopathic->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendhomeopathic/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->homeopathic_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendhomeopathic/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->homeopathic_name}}</span>
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

    @if(Session('language')=='bn')
        <div class="uk-width-large-7-10" oncopy="return false" oncut="return false" onpaste="return false">
            <div class="md-card">
                <div class="user_heading">
                    <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                        @if($homeopathic->photo_path == '')
                        <div class="thumbnail"><img alt="homeopathic"  src="{{asset('/homeopathic.png')}}">
                        </div>
                        @else
                        <div class="thumbnail"><img alt="homeopathic" src="{{ url($homeopathic->photo_path) }}">
                        </div>
                        @endif
                    </div>
        
                    <div class="user_heading_content" style="display:table;margin:0 auto;">
                        <h2 class="heading_b"><span class="uk-text-break">{{$homeopathic->b_homeopathic_name}}</span>
                        </h2>
                    </div>
                </div>
        
        
                <div class="user_content">
                    <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                        <li class="uk-active">
                            <a href="#">সম্বন্ধে</a>
                        </li>
        
                        <li>
                            <a  href="#">প্রবন্ধ </a>
                        </li>
                        
                        <li ng-controller="ViewBnHomeopathicController">
                            <a ng-click="getMedicalSpecialistDropDown()" href="#">ডাক্তার</a>
                        </li>
        
                        <li ng-controller="ViewBnHomeopathicController">
                            <a ng-click="getproductSubCategoryDropDown()" href="#">ঔষধ-সম্বন্ধীয়</a>
                        </li>
                        
                        <li ng-controller="ViewBnHomeopathicController">
                            <a href="#">সেবা</a>
                        </li>
                    </ul>
        
                    <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                        <li><?php echo $homeopathic->b_homeopathic_description; ?>
        
                            <div class="uk-grid" data-uk-grid-margin="">
                                <div class="uk-width-large-1-1">
                                    <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">যোগাযোগের তথ্য</h4>
                                    <ul class="md-list md-list-addon">
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{!! nl2br($homeopathic->b_homeopathic_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">ঠিকানা</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px"  class="md-list-heading">
                                                    @if($homeopathic->b_homeopathic_phone_no != '')
                                                    @php
                                                        $phone_number_splitted = explode("\n",$homeopathic->b_homeopathic_phone_no);
                                                        $e_phone_number_splitted = explode("\n",$homeopathic->homeopathic_phone_no);
                                                        $len = sizeof($phone_number_splitted);
                                                    @endphp
                                                        @for($i = 0; $i < $len ; $i = $i + 1)
                                                            @php
                                                                $phone_number = $phone_number_splitted[$i];
                                                                $e_phone_number = $e_phone_number_splitted[$i];
                                                                $length = strlen($e_phone_number);
                                                            @endphp
                                                            @if(!is_numeric($e_phone_number[1]))
                                                                {{$phone_number}}
                                                            @else
                                                            {{$phone_number}}<a href = "tel:{{$e_phone_number}}"><i class="fa fa-phone" style="margin-left:5px;"></i></a>
                                                            @endif
                                                            @if($i != $len - 1)
                                                                <br>
                                                            @endif
                                                        @endfor
                                                    @endif
                                                </span>
                                                 <span class="uk-text-small uk-text-muted hidden">ফোন</span>
                                            </div>
                                        </li>
                                        @if($homeopathic->homeopathic_email_ad != '')
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                            </div>
        
        
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">
                                                    {{$homeopathic->homeopathic_email_ad}}<a href = "mailto:{{$homeopathic->homeopathic_email_ad}}"><i class="fa fa-envelope-o" style="margin-left:5px;"></i></a>
                                                </span>
                                                <span class="uk-text-small uk-text-muted hidden">ই-মেইল</span>
                                            </div>
                                        </li>
                                        @endif
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" style="font-size:30px;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                            </div>
        
        
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{{$homeopathic->homeopathic_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">ওয়েবসাইট</span>
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
                            
                            <div class="uk-width-large-1-1 uk-margin-medium-top">
                                <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">সাধারণ তথ্য</h4>
                                <ul class="md-list uk-margin-small-top">
                                <?php echo  $homeopathic->b_total_medicine; ; ?>
                                <!--
                                    <li>
                                        <div class="md-list-content">
                                            <span class="hidden">General:</span> <span><?php echo  $homeopathic->b_total_medicine; ; ?></span>
                                        </div>
                                    </li>
                                -->
                                </ul>  
                            </div>  
                            
                            <!-- START google maps -->
                            
                            @if( $homeopathic->homeopathic_latitude != '' && $homeopathic->homeopathic_longitude != '' )
                            
                            <div class="uk-width-large-1-1 google_maps_show">
                                 <iframe 
                                    src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $homeopathic->homeopathic_latitude }}, {{ $homeopathic->homeopathic_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                </iframe>
                            </div>
                            
                            @endif
                            
                            <!-- END google maps -->
                        
                        </li>
                        <li>
                            <ul class="md-list">
                            @foreach($notices as $notice)
                                <?php echo $notice->b_homeopathic_notice_description; ?>
                            @endforeach
                            <!--
                                <li style="padding-top: 0px;">
                                    <div class="md-list-content">
                                        @foreach($notices as $notice)
                                            <span class="uk-margin-right"><?php #echo $notice->b_homeopathic_notice_description; ?></span>
                                        @endforeach
                                    </div>
                                </li>
                            -->
                            </ul>
                        </li>
                        <li ng-controller="ViewBnHomeopathicController">
                            <input type="hidden" ng-init="homeopathic_id='asdfg'" value="{{$homeopathic_id}}" name="homeopathic_id" ng-model="homeopathic_id">
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
                                        <h4 class="heading_c" style = "margin-top: 10px;">@{{doctor.b_medical_specialist_name}}</h4>
                                        <a href="{{'/'}}frontendmedicalspecialist/view/@{{doctor.id}}/{{$homeopathic->subdistrict_id}}"><h4 style="color:red;" class=" uk-margin-small-bottom">বিস্তারিত দেখুন</h4></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class="md-list">
                                @foreach($products as $product)
                                <?php echo $product->b_homeopathic_product_description; ?>
                                <!--
                                <li style="padding-top: 0px;">
                                    <div class="md-list-content">
                                            <span class="uk-margin-right"><?php #echo $product->b_homeopathic_product_description; ?></span>
                                    </div>
                                </li>
                                -->
                                @endforeach
                            </ul>
                        </li>
                        
                        <li ng-controller="ViewBnHomeopathicController">
                            <input type="hidden" ng-init="homeopathic_id='asdfg'" value="{{ $homeopathic_id }}" name="homeopathic_id" ng-model="homeopathic_id">
                            <div class="uk-form-row">
                                <input id="service_id" name="service_id" ng-model="service_id" ng-change="getHomeopathicService()" style="width: 100%;" />
                            </div>
                            <ul class="md-list">
                                <li ng-repeat = "service in services">
                                    <div style="margin-top: -10px;" class="md-list-content">
                                        <div>
                                            <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.b_homeopathic_service_description)"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="uk-width-large-7-10" oncopy="return false" oncut="return false" onpaste="return false">
            <div class="md-card">
                <div class="user_heading">
                    <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                        @if($homeopathic->photo_path == '')
                        <div class="thumbnail"><img alt="homeopathic"  src="{{asset('/homeopathic.png')}}">
                        </div>
                        @else
                        <div class="thumbnail"><img alt="homeopathic" src="{{ url($homeopathic->photo_path) }}">
                        </div>
                        @endif
                    </div>
        
                    <div class="user_heading_content" style="display:table;margin:0 auto;">
                        <h2 class="heading_b"><span class="uk-text-break">{{$homeopathic->homeopathic_name}}</span>
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
                        
                        <li ng-controller="ViewHomeopathicController">
                            <a ng-click="getMedicalSpecialistDropDown()" href="#">Doctor</a>
                        </li>
        
                        <li ng-controller="ViewHomeopathicController">
                            <a ng-click="getproductSubCategoryDropDown()" href="#">Medicinal</a>
                        </li>
                        
                        <li ng-controller="ViewHomeopathicController">
                            <a href="#">Service</a>
                        </li>
                    </ul>
        
                    <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                        <li><?php echo $homeopathic->homeopathic_description; ?>
        
                            <div class="uk-grid" data-uk-grid-margin="">
                                <div class="uk-width-large-1-1">
                                    <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>
                                    <ul class="md-list md-list-addon">
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{!! nl2br($homeopathic->homeopathic_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px"  class="md-list-heading">
                                                    @if($homeopathic->homeopathic_phone_no != '')
                                                    @php
                                                        $e_phone_number_splitted = explode("\n",$homeopathic->homeopathic_phone_no);
                                                        $len = sizeof($e_phone_number_splitted);
                                                    @endphp
                                                        @for($i = 0; $i < $len ; $i = $i + 1)
                                                            @php
                                                                $e_phone_number = $e_phone_number_splitted[$i];
                                                                $length = strlen($e_phone_number);
                                                            @endphp
                                                            @if(!is_numeric($e_phone_number[1]))
                                                                {{$e_phone_number}}
                                                            @else
                                                            {{$e_phone_number}}<a href = "tel:{{$e_phone_number}}"><i class="fa fa-phone" style="margin-left:5px;"></i></a>
                                                            @endif
                                                            @if($i != $len - 1)
                                                                <br>
                                                            @endif
                                                        @endfor
                                                    @endif
                                                </span>
                                                 <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                            </div>
                                        </li>
                                        @if($homeopathic->homeopathic_email_ad != '')
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                            </div>
        
        
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{{$homeopathic->homeopathic_email_ad}}<a href = "mailto:{{$homeopathic->homeopathic_email_ad}}"><i class="fa fa-envelope-o" style="margin-left:5px;"></i></a></span>
                                                <span class="uk-text-small uk-text-muted hidden">Email</span>
                                            </div>
                                        </li>
                                        @endif
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" style="font-size:30px;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                            </div>
        
        
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{{$homeopathic->homeopathic_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">Website</span>
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
                            
                            <div class="uk-width-large-1-1 uk-margin-medium-top">
                                <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">General Info</h4>
                                <ul class="md-list uk-margin-small-top">
                                <?php echo  $homeopathic->total_medicine; ; ?>
                                <!--
                                    <li>
                                        <div class="md-list-content">
                                            <span class="hidden">General:</span> <span><?php #echo  $homeopathic->total_medicine; ; ?></span>
                                        </div>
                                    </li>
                                -->
                                </ul>  
                            </div>           
                            
                            <!-- START google maps -->
                            
                            @if( $homeopathic->homeopathic_latitude != '' && $homeopathic->homeopathic_longitude != '' )
                            
                            <div class="uk-width-large-1-1 google_maps_show">
                                 <iframe 
                                    src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $homeopathic->homeopathic_latitude }}, {{ $homeopathic->homeopathic_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                </iframe>
                            </div>
                            
                            @endif
                            
                            <!-- END google maps -->
                          
                        </li>
                        <li>
                            <ul class="md-list">
                            @foreach($notices as $notice)
                                <?php echo $notice->homeopathic_notice_description; ?>
                            @endforeach
                            <!--
                                <li style="padding-top: 0px;">
                                    <div class="md-list-content">
                                        @foreach($notices as $notice)
                                            <span class="uk-margin-right"><?php #echo $notice->homeopathic_notice_description; ?></span>
                                        @endforeach
                                    </div>
                                </li>
                            -->
                            </ul>
                        </li>
                        <li ng-controller="ViewHomeopathicController">
                            <input type="hidden" ng-init="homeopathic_id='asdfg'" value="{{$homeopathic_id}}" name="homeopathic_id" ng-model="homeopathic_id">
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
                                        <a href="{{'/'}}frontendmedicalspecialist/view/@{{doctor.id}}/{{$homeopathic->subdistrict_id}}"><h4 style="color:red;" class=" uk-margin-small-bottom">View Details</h4></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class="md-list">
                                @foreach($products as $product)
                                <?php echo $product->homeopathic_product_description; ?>
                                <!--
                                <li style="padding-top: 0px;">
                                    <div class="md-list-content">
                                            <span class="uk-margin-right"><?php #echo $product->homeopathic_product_description; ?></span>
                                    </div>
                                </li>
                                -->
                                @endforeach
                            </ul>
                        </li>
                        
                        <li ng-controller="ViewHomeopathicController">
                            <input type="hidden" ng-init="homeopathic_id='asdfg'" value="{{ $homeopathic_id }}" name="homeopathic_id" ng-model="homeopathic_id">
                            <div class="uk-form-row">
                                <input id="service_id" name="service_id" ng-model="service_id" ng-change="getHomeopathicService()" style="width: 100%;" />
                            </div>
                            <ul class="md-list">
                                <li ng-repeat = "service in services">
                                    <div style="margin-top: -10px;" class="md-list-content">
                                        <div>
                                            <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.homeopathic_service_description)"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <input id="backbuttonstate" type="text" value="0" style="display:none;" />
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
    }
    else {
        // Back button has been fired.. Do Something different..
        location.reload(true);
    }
    }, false);
    </script>

@endsection