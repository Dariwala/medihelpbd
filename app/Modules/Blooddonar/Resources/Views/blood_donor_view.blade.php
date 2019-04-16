@extends('layouts.admin_master')

@section('title', 'Blood Donor')

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    @if($blood_donor->photo_path == '')
                                    <div class="thumbnail"><img alt="blood donor"  src="{{asset('/BloodDonor.jpg')}}">
                                    </div>
                                    @else
                                    <div class="thumbnail"><img alt="blood donor" src="{{ url($blood_donor->photo_path) }}">
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$blood_donor->blood_donor_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a  style="text-align: left;"  href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align: left;" href="#">Article</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li><?php echo $blood_donor->blood_donor_description; ?>

                                    <div class="uk-grid" data-uk-grid-margin="">
                                        <div class="uk-width-large-1-1">
                                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>


                                            <ul class="md-list md-list-addon">
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($blood_donor->blood_donor_address) !!}</span> <span class="uk-text-small uk-text-muted hidden">Address</span>
                                                    </div>
                                                </li>
                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{!! nl2br($blood_donor->blood_donor_phone_no) !!}</span>
                                                         <span class="uk-text-small uk-text-muted hidden">Phone</span>
                                                    </div>
                                                </li>

                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                        <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
            
                                                        <span style="margin-top:5px" class="md-list-heading">{{$blood_donor->blood_donor_email_ad}}</span>
            
                                                        <span class="uk-text-small uk-text-muted hidden">Email</span>
                                                    </div>
                                                </li>

                                                <li style="margin-left: 45px !important;">
                                                    <div class="md-list-addon-element">
                                                       <i  style= "margin: 0" class="md-list-addon-icon material-icons">language</i> 
                                                    </div>


                                                    <div class="md-list-content">
                                                        <span style="margin-top:5px" class="md-list-heading">{{$blood_donor->blood_donor_fb_link}}</span> <span class="uk-text-small uk-text-muted hidden">Facebook</span>
                                                    </div>
                                                </li>
                                                <li class="hidden" >
                                                    <div class="md-list-addon-element">
                                                       <i  style= "margin: 0" class="md-list-addon-icon material-icons">language</i> 
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
                                                        <span class="hidden">General:</span> <span><?php echo $blood_donor->blood_donor_general_info; ?></span>
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </div>
                                    
                                    <!-- START google maps -->
                                    <div class="uk-width-large-1-1 google_maps_show">
                                         <iframe 
                                            src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $blood_donor->blood_donor_latitude }}, {{ $blood_donor->blood_donor_longitude }}" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                                        </iframe>
                                    </div>
                                    <!-- END google maps -->
                                    
                                    
                                </li>
                                <li>
                                    <ul class="md-list">
            
                                        <li style="padding-top: 0px;">
                                            <div class="md-list-content">
                                                @foreach($prices as $price)
                                                    @php echo $price->package_details; @endphp
                                                @endforeach
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