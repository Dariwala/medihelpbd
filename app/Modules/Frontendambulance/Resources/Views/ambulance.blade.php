@extends('layouts.frontend_master')

@section('title', 'Ambulance')

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

    @if(Session('language')=='bn')
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">মোট ফলাফল  <br/>  {{BanglaConverter::en2bn($total_result)}}   </h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($ambulance->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendambulance/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_ambulance_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendambulance/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_ambulance_name}}</span>
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
                        @if($ambulance->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendambulance/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->ambulance_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendambulance/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->ambulance_name}}</span>
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
        <div class="uk-width-large-7-10">
        <div class="md-card">
            <div class="user_heading">
                <div class="user_heading_avatar">
                    <div class="thumbnail">
                        @if($ambulance->photo_path == '')
                                <img alt="user avatar" src="{{asset('/ambulance.png')}}">
                            @else
                                <img alt="user avatar" src="{{url('uploads/ambulance').'/'.$ambulance->ambulance_photo}}">
                            @endif
                    </div>
                </div>
    
                <div class="user_heading_content">
                    <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$ambulance->b_ambulance_name}}</span>
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
                </ul>
    
    
                <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                    <li><?php echo $ambulance->b_ambulance_description; ?>
    
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-1">
                                <h4 class="heading_c uk-margin-small-bottom">যোগাযোগের তথ্য</h4>
    
    
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px"  class="md-list-heading">{!! nl2br($ambulance->b_ambulance_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                        </div>
                                    </li>
    
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
    
    
                                        <div class="md-list-content">
                                            <span style="margin-top:5px"  class="md-list-heading">{!! nl2br($ambulance->b_ambulance_phone) !!}</span>
                                             <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                              <span style="margin-top:5px"  class="md-list-heading">{{$ambulance->ambulance_email}}</span>
                                              <span class="uk-text-small uk-text-muted hidden">Email</span>
                                       </div>
                                    </li>
    
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i style="margin: 0" class="md-list-addon-icon material-icons">language</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px"  class="md-list-heading">{{$ambulance->ambulance_fb_link}}</span> <span class="uk-text-small uk-text-muted hidden">Facebook</span>
                                        </div>
                                    </li>
                                    <li  class="hidden">
                                        <div class="md-list-addon-element">
                                            <i style="margin: 0" class="md-list-addon-icon material-icons">language</i>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="uk-width-large-1-1">
                            <h4 class="heading_c">সাধারণ তথ্য</h4>
                            <ul class="md-list uk-margin-small-top">
                                <li>
                                    <div class="md-list-content">
                                        <span class="hidden">Total Ambulance:</span> <span><?php echo $ambulance->b_total_ambulance; ?></span>
                                    </div>
                                </li>
                            </ul>  
                        </div>
                        
                        <!-- START google maps -->
                        <div class="uk-width-large-1-1 google_maps_show">
                             <iframe 
                                src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $ambulance->ambulance_latitude }}, {{ $ambulance->ambulance_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                            </iframe>
                        </div>
                        <!-- END google maps -->
                        
                    </li>
    
                    <li>
                        <ul class="md-list">
                            @foreach( $notices as $notice )
                            <li>
                                <div style="margin-top: -10px;" class="md-list-content">
                                        <span class="uk-margin-right"><?php echo $notice->b_ambulance_notice_description; ?></span>
                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @else
        <div class="uk-width-large-7-10">
        <div class="md-card">
            <div class="user_heading">
                <div class="user_heading_avatar">
                    <div class="thumbnail">
                        @if($ambulance->photo_path == '')
                                <img alt="user avatar" src="{{asset('/ambulance.png')}}">
                            @else
                                <img alt="user avatar" src="{{url('uploads/ambulance').'/'.$ambulance->ambulance_photo}}">
                            @endif
                    </div>
                </div>
    
                <div class="user_heading_content">
                    <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$ambulance->ambulance_name}}</span>
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
                </ul>
    
    
                <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                    <li><?php echo $ambulance->ambulance_description; ?>
    
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-1">
                                <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>
    
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px"  class="md-list-heading">{!! nl2br($ambulance->ambulance_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                        </div>
                                    </li>
    
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
    
    
                                        <div class="md-list-content">
                                            <span style="margin-top:5px"  class="md-list-heading">{!! nl2br($ambulance->ambulance_phone) !!}</span>
                                             <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                        </div>
                                    </li>
                                    <li >
                                        <div class="md-list-addon-element">
                                            <i style="margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                              <span style="margin-top:5px"  class="md-list-heading">{{$ambulance->ambulance_email}}</span>
                                              <span class="uk-text-small uk-text-muted hidden">Email</span>
                                       </div>
                                    </li>
    
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i style="margin: 0" class="md-list-addon-icon material-icons">language</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px"  class="md-list-heading">{{$ambulance->ambulance_fb_link}}</span> <span class="uk-text-small uk-text-muted hidden">Facebook</span>
                                        </div>
                                    </li>
                                    <li  class="hidden">
                                        <div class="md-list-addon-element">
                                            <i style="margin: 0" class="md-list-addon-icon material-icons">language</i>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="uk-width-large-1-1">
                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">General Info</h4>
                            <ul class="md-list uk-margin-small-top">
                                <li>
                                    <div class="md-list-content">
                                        <span class="hidden">Total Ambulance:</span> <span><?php echo $ambulance->total_ambulance; ?></span>
                                    </div>
                                </li>
                            </ul>  
                        </div>
                                          
                        <!-- START google maps -->
                        <div class="uk-width-large-1-1 google_maps_show">
                             <iframe 
                                src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $ambulance->ambulance_latitude }}, {{ $ambulance->ambulance_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                            </iframe>
                        </div>
                        <!-- END google maps -->
                        
                    </li>
                    
                    <li>
                        <ul class="md-list">
                            @foreach( $notices as $notice )
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="uk-margin-right"><?php echo $notice->ambulance_notice_description; ?></span>
                                
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    
@endsection