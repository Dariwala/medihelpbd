@extends('layouts.admin_master2')

@section('title', 'Doctors Panel')

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar">
                                @if($medical_specialist->photo_path == '')
                                <div class="thumbnail"><img alt=" specialist"  src="{{asset('/medicalspecialist.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt=" specialist" src="{{ url($medical_specialist->photo_path) }}">
                                </div>
                                @endif
                            </div>

                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px" class="uk-text-truncate">{{$medical_specialist->medical_specialist_name}}</span>
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
                                
                                <li>
                                    <a style="text-align: left;" href="#">Chamber</a>
                                </li>

                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li><?php echo $medical_specialist->medical_specialist_description; ?>

                                    <div class="uk-grid" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>


                                            <ul class="md-list md-list-addon">
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($medical_specialist->medical_specialist_address) !!}</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($medical_specialist->medical_specialist_phone_no) !!}</span>
                 
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$medical_specialist->medical_specialist_email_ad}}</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i style= "margin: 0" class="md-list-addon-icon material-icons">&#xE894;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$medical_specialist->medical_specialist_web_link}}</span>
                                                    </div>
                                                </li>
                                                
                                                <li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div style="margin-top:-32px" class="uk-margin uk-margin-large-bottom" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom">General Info</h4>
                                            <ul class="md-list uk-margin-small-top">
                                                <li>
                                                    <div class="md-list-content">
                                                        <span><?php echo $medical_specialist->fee_new; ?></span>
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </div>
                                    
                                    <!-- START google maps -->
                                    <div class="uk-width-large-1-1 google_maps_show">
                                         <iframe 
                                            src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $medical_specialist->medical_specialist_latitude }}, {{ $medical_specialist->medical_specialist_longitude }}" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                        </iframe>
                                    </div>
                                     <!-- END google maps -->
                                    
                                </li>
                                <li>
                                    <ul class="md-list">
                                        @foreach($notices as $notice)
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                    <span class="uk-margin-right"><?php echo $notice->medical_specialist_notice_description; ?></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <ul class="md-list">
                                        @foreach($chembers as $chember)
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                    <span class="uk-margin-right">
                                                    <?php echo $chember->medical_specialist_chamber_description; ?></span>
                                            </div>
                                        </li>
                                        @endforeach
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