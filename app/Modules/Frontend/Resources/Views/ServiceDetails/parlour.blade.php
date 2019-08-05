@extends('layouts.frontend_master')

@section('title', 'Beauty Parlour & Spa')

@section('angular')
    <script src="{{url('app/frontend/frontend/parlour.view.js')}}"></script>
    <script src="{{url('app/frontend/frontend/parlour.b_view.js')}}"></script>
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
                        @if($parlour->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendparlour/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_parlour_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendparlour/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_parlour_name}}</span>
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
                        @if($parlour->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendparlour/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->parlour_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendparlour/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->parlour_name}}</span>
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
                        @if($parlour->photo_path == '')
                        <div class="thumbnail"><img alt="parlour"  src="{{asset('/parlour.PNG')}}">
                        </div>
                        @else
                        <div class="thumbnail"><img alt="parlour" src="{{ url($parlour->photo_path) }}">
                        </div>
                        @endif
                    </div>

                    <div class="user_heading_content" style="display:table;margin:0 auto;">
                        <h2 class="heading_b"><span class="uk-text-break">{{$parlour->b_parlour_name}}</span>
                        </h2>
                    </div>
                </div>


                <div class="user_content">
                    <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                        <li class="uk-active">
                            <a href="#">সম্বন্ধে</a>
                        </li>
                        
                        <li>
                            <a href="#">প্রবন্ধ </a>
                        </li>
                        
                        <li ng-controller="ViewBnParlourController">
                            <a ng-click="getSubServiceDropDown()" href="#">সেবা</a>
                        </li>
                    </ul>


                    <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                        <li><?php echo $parlour->b_parlour_description; ?>

                            <div class="uk-grid" data-uk-grid-margin="">
                                <div class="uk-width-large-1-1">
                                    <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">যোগাযোগের তথ্য</h4>


                                    <ul class="md-list md-list-addon">
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{!! nl2br($parlour->b_parlour_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">ঠিকানা</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                            </div>


                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">
                                                    @if($parlour->b_parlour_phone_no != '')
                                                    @php
                                                        $phone_number_splitted = explode("\n",$parlour->b_parlour_phone_no);
                                                        $e_phone_number_splitted = explode("\n",$parlour->parlour_phone_no);
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
                                        @if($parlour->parlour_email_ad != '')
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading ">
                                                    {{$parlour->parlour_email_ad}}<a href = "mailto:{{$parlour->parlour_email_ad}}"><i class="fa fa-envelope-o" style="margin-left:5px;"></i></a>
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
                                                <span style="margin-top:5px" class="md-list-heading">{{$parlour->parlour_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">ওয়েবসাইট</span>
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
                                <?php echo $parlour->b_parlour_total_bed; ?>
                                <!--
                                    <li>
                                        <div class="md-list-content">
                                            <span class="hidden">General:</span> <span><?php #echo $parlour->b_parlour_total_bed; ?></span>
                                        </div>
                                    </li>
                                -->
                                </ul>  
                            </div>  
                            
                            <!-- START google maps -->
                            
                            @if( $parlour->parlour_latitude != '' && $parlour->parlour_longitude != '' )
                            
                            <div class="uk-width-large-1-1 google_maps_show">
                                 <iframe 
                                    src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $parlour->parlour_latitude }}, {{ $parlour->parlour_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                </iframe>
                            </div>
                            
                            @endif
                            
                            <!-- END google maps -->
                            
                        </li>
                        
                        <li>
                            <ul class="md-list">
                                @foreach($notices as $notice)
                                <?php echo $notice->b_parlour_notice_description; ?>
                                <!--
                                <li style="padding-top: 0px;">
                                    <div class="md-list-content">
                                            <span class="uk-margin-right"><?php #echo $notice->b_parlour_notice_description; ?></span>
                                      
                                    </div>
                                </li>
                                -->
                                @endforeach
                            </ul>
                        </li>
                         
                        <li ng-controller="ViewBnParlourController">
                            <input type="hidden" ng-init="parlour_id='asdfg'" value="{{$parlour_id}}" name="parlour_id" ng-model="parlour_id">
                            <div   class="uk-form-row">
                                <input id="service_id" name="service_id" ng-model="service_id" ng-change="getParlourService()"   style="width: 100%;" />
                            </div>
                            <ul class="md-list">
                                <li ng-repeat = "service in services">
                                    <div class="md-list-content">
                                        <h4 class="heading_c">@{{service.b_parlour_service_title}}</h4>
                                        <div>
                                            <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.b_parlour_service_description)">
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
    @else
        <div class="uk-width-large-7-10" oncopy="return false" oncut="return false" onpaste="return false">
            <div class="md-card">
                <div class="user_heading">
                    <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                        @if($parlour->photo_path == '')
                        <div class="thumbnail"><img alt="parlour"  src="{{asset('/parlour.PNG')}}">
                        </div>
                        @else
                        <div class="thumbnail"><img alt="parlour" src="{{ url($parlour->photo_path) }}">
                        </div>
                        @endif
                    </div>

                    <div class="user_heading_content" style="display:table;margin:0 auto;">
                        <h2 class="heading_b"><span class="uk-text-break">{{$parlour->parlour_name}}</span>
                        </h2>
                    </div>
                </div>


                <div class="user_content">
                    <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                        <li class="uk-active">
                            <a href="#">About</a>
                        </li>
                        
                        <li>
                            <a href="#">Article</a>
                        </li>
                        
                        <li ng-controller="ViewParlourController">
                            <a ng-click="getSubServiceDropDown()" href="#">Service</a>
                        </li>
                    </ul>


                    <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                        <li><?php echo $parlour->parlour_description; ?>

                            <div class="uk-grid" data-uk-grid-margin="">
                                <div class="uk-width-large-1-1">
                                    <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>


                                    <ul class="md-list md-list-addon">
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{!! nl2br($parlour->parlour_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                            </div>


                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">
                                                    @if($parlour->parlour_phone_no != '')
                                                    @php
                                                        $e_phone_number_splitted = explode("\n",$parlour->parlour_phone_no);
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
                                        @if($parlour->parlour_email_ad != '')
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                            </div>
                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading ">{{$parlour->parlour_email_ad}}<a href = "mailto:{{$parlour->parlour_email_ad}}"><i class="fa fa-envelope-o" style="margin-left:5px;"></i></a></span>
                                                <span class="uk-text-small uk-text-muted hidden">Email</span>
                                            </div>
                                        </li>
                                        @endif
                                        <li>
                                            <div class="md-list-addon-element">
                                                <i style="margin: 0" style="font-size:30px;" class="md-list-addon-icon material-icons">&#xE894;</i>
                                            </div>

                                            <div class="md-list-content">
                                                <span style="margin-top:5px" class="md-list-heading">{{$parlour->parlour_web_link}}</span> <span class="uk-text-small uk-text-muted hidden">Website</span>
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
                                <?php echo $parlour->parlour_total_bed; ?>
                                <!--
                                    <li>
                                        <div class="md-list-content">
                                            <span class="hidden">General:</span> <span><?php #echo $parlour->parlour_total_bed; ?></span>
                                        </div>
                                    </li>
                                -->
                                </ul>  
                            </div>
                                                    
                            <!-- START google maps -->
                            
                            @if( $parlour->parlour_latitude != '' && $parlour->parlour_longitude != '' )
                            
                            <div class="uk-width-large-1-1 google_maps_show">
                                 <iframe 
                                    src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $parlour->parlour_latitude }}, {{ $parlour->parlour_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                </iframe>
                            </div>
                            
                            @endif
                            
                            <!-- END google maps -->
                            
                        </li>
                        
                        <li>
                            <ul class="md-list">
                                @foreach($notices as $notice)
                                <?php echo $notice->parlour_notice_description; ?>
                                <!--
                                <li style="padding-top: 0px;">
                                    <div class="md-list-content">
                                            <span class="uk-margin-right"><?php #echo $notice->parlour_notice_description; ?></span>
                                      
                                    </div>
                                </li>
                                -->
                                @endforeach
                            </ul>
                        </li>
                         
                        <li ng-controller="ViewParlourController">
                            <input type="hidden" ng-init="parlour_id='asdfg'" value="{{$parlour_id}}" name="parlour_id" ng-model="parlour_id">
                            <div   class="uk-form-row">
                                <input id="service_id" name="service_id" ng-model="service_id" ng-change="getParlourService()"   style="width: 100%;" />
                            </div>
                            <ul class="md-list">
                                <li ng-repeat = "service in services">
                                    <div class="md-list-content">
                                        <h4 class="heading_c">@{{service.parlour_service_title}}</h4>
                                        <div>
                                            <span class="uk-margin-right" ng-bind-html="trustAsHtml(service.parlour_service_description)">
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