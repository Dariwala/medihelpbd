<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="{{url('vendor/img/logo1.png')}}" sizes="16x16">

    <title>Showing all Results</title>


    <!-- uikit -->
    <link rel="stylesheet" href="{{url('bower_components/uikit/css/uikit.almost-flat.min.css')}}" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{url('assets/icons/flags/flags.min.css')}}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{url('assets/css/main.min.css')}}" media="all">

    <link rel="stylesheet" href="{{url('assets/css/custom_contact.css')}}" media="all">

    <style type="text/css">
        .home-link{
            line-height: 43px !important;
            color: white;
            font-size: 1em;
        }
        .hidden{
            display: none !important;
        }
        .md-list .uk-nestable-list > li, .md-list > li {
            border-bottom: 0px !important;
        }
        
        .enlist-service-nav span:hover {
            box-shadow: 2px 2px !important;
            color: black !important;
        }
    	
    	@media only screen and (max-width: 500px) {
            .enlist-service {
                display: block !important;
            }
            .enlist-service-nav {
                display: none !important;
            }
        }
        
        .md-card .md-card-head-text {
            padding: 8px 0px 0px;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
        }
    </style>

</head>
<body class=" sidebar_main_open sidebar_main_swipe header_full sidebar_main_active">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <div class="main_logo_top">
                    @if(Session('language')=='bn')
                        <a class = "home-link" href="{{'/'}}"><b>হোম</b></a>
                    @else
                        <a class = "home-link" href="{{'/'}}"><b>Home</b></a>
                    @endif
                </div>
                <div class="uk-navbar-flip">
                    @if(Session('language')=='bn')
                        <ul class="uk-navbar-nav user_actions">
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a class="user_action_image" href="#"><b>ভাষা</b></a>
    
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li>
                                            <a href="{{url('/english')}}">English</a>
                                        </li>
    
    
                                        <li>
                                            <a href="{{url('/bangla')}}">বাংলা</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    @else
                    
                        <ul class="uk-navbar-nav user_actions">
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a class="user_action_image" href="#"><b>Language</b></a>
    
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li>
                                            <a href="{{url('/english')}}">English</a>
                                        </li>
    
    
                                        <li>
                                            <a href="{{url('/bangla')}}">বাংলা</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        
                    @endif
                    
                </div>
            </nav>
        </div>
    </header>

    @if(Session('language')=='bn')
    <div id="page_content " class="uk-width-9-10 uk-container-center" >
        <div id="page_content_inner">
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content serch_bar">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label for="contact_list_search">খুঁজুন (ইংরেজিতে অক্ষর লিখুন)</label>
                        <input style="color:#fff;" class="md-input" type="text" id="contact_list_search"/>
                    </div>
                </div>
            </div>
            </div>

            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5 hierarchical_show" id="contact_list">
                @if($directoryType == 1)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->ambulance_name}}, {{$contact->ambulance_name}}, {{$contact->ambulance_name}}">
                            <a href="{{ url('frontendambulance/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('ambulance.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_ambulance_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 2)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->air_ambulance_name}}, {{$contact->air_ambulance_name}}, {{$contact->air_ambulance_name}}">
                            <a href="{{ url('frontendairambulance/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('logo1.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_air_ambulance_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 3)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->blood_bank_name}}, {{$contact->blood_bank_name}}, {{$contact->blood_bank_name}}">
                            <a href="{{ url('frontendbloodbank/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('BloodBank.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_blood_bank_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 4)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->blood_donor_name}}, {{$contact->blood_donor_name}}, {{$contact->blood_donor_name}}">
                            <a href="{{ url('frontendblooddonor/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('BloodDonor.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_blood_donor_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
 
                @if($directoryType == 5)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->eye_bank_name}}, {{$contact->eye_bank_name}}, {{$contact->eye_bank_name}}">
                            <a href="{{ url('frontendeyebank/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('EyeBank.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_eye_bank_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 6)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->hospital_name}}, {{$contact->hospital_name}}, {{$contact->hospital_name}}">
                            <a href="{{ url('frontendhospital/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('hospital.PNG')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_hospital_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 7)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->pharmacy_name}}, {{$contact->pharmacy_name}}, {{$contact->pharmacy_name}}">
                            <a href="{{ url('frontendpharmacy/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('pharmacy.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_pharmacy_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 8)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->medical_specialist_name}}, {{$contact->medical_specialist_name}}, {{$contact->medical_specialist_name}}">
                            <a href="{{ url('frontendmedicalspecialist/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('medicalspecialist.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_medical_specialist_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 9)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->herbal_center_name}}, {{$contact->herbal_center_name}}, {{$contact->herbal_center_name}}">
                            <a href="{{ url('frontendherbalcenter/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('herbalcenter.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_herbal_center_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 10)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->vaccine_point_name}} ,{{$contact->vaccine_point_name}}, {{$contact->vaccine_point_name}}">
                            <a href="{{ url('frontendvaccinepoint/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('vaccination.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_vaccine_point_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 11)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->skin_laser_center_name}} ,{{$contact->skin_laser_center_name}}, {{$contact->skin_laser_center_name}}">
                            <a href="{{ url('frontendskinlasercenter/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('skincare.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_skin_laser_center_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                <!-- New Modules -->

                @if($directoryType == 12)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->addiction_name}} ,{{$contact->addiction_name}}, {{$contact->addiction_name}}">
                            <a href="{{ url('frontendaddiction/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('addiction.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_addiction_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 13)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->parlour_name}} ,{{$contact->parlour_name}}, {{$contact->parlour_name}}">
                            <a href="{{ url('frontendparlour/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('parlour.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_parlour_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 14)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->foreignmedical_name}} ,{{$contact->foreignmedical_name}}, {{$contact->foreignmedical_name}}">
                            <a href="{{ url('frontendforeignmedical/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('foreignmedical.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_foreignmedical_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 15)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->gym_name}} ,{{$contact->gym_name}}, {{$contact->gym_name}}">
                            <a href="{{ url('frontendgym/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('gym.PNG')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_gym_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 16)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->homeopathic_name}} ,{{$contact->homeopathic_name}}, {{$contact->homeopathic_name}}">
                            <a href="{{ url('frontendhomeopathic/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('homeopathic.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_homeopathic_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 17)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->optical_name}} ,{{$contact->optical_name}}, {{$contact->optical_name}}">
                            <a href="{{ url('frontendoptical/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('optical.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_optical_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 18)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->pharmacynew_name}} ,{{$contact->pharmacynew_name}}, {{$contact->pharmacynew_name}}">
                            <a href="{{ url('frontendpharmacynew/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('pharmacynew.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_pharmacynew_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 19)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->physiotherapy_name}} ,{{$contact->physiotherapy_name}}, {{$contact->physiotherapy_name}}">
                            <a href="{{ url('frontendphysiotherapy/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('physiotherapy.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_physiotherapy_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 20)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->yoga_name}} ,{{$contact->yoga_name}}, {{$contact->yoga_name}}">
                            <a href="{{ url('frontendyoga/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('yoga.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->b_yoga_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                <!-- New Modules Ends-->

            </div>

        </div>
    </div>
    @else
    <div id="page_content " class="uk-width-9-10 uk-container-center" >
        <div id="page_content_inner">
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content serch_bar">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <label for="contact_list_search">Search</label>
                            <input style="color:#fff;" class="md-input" type="text" id="contact_list_search"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5 hierarchical_show" id="contact_list">
                @if($directoryType == 1)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->ambulance_name}}, {{$contact->ambulance_name}}, {{$contact->ambulance_name}}">
                            <a href="{{ url('frontendambulance/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('ambulance.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->ambulance_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 2)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->air_ambulance_name}}, {{$contact->air_ambulance_name}}, {{$contact->air_ambulance_name}}">
                            <a href="{{ url('frontendairambulance/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('logo1.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->air_ambulance_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 3)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->blood_bank_name}}, {{$contact->blood_bank_name}}, {{$contact->blood_bank_name}}">
                            <a href="{{ url('frontendbloodbank/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('BloodBank.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->blood_bank_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 4)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->blood_donor_name}}, {{$contact->blood_donor_name}}, {{$contact->blood_donor_name}}">
                            <a href="{{ url('frontendblooddonor/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('BloodDonor.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->blood_donor_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 5)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->eye_bank_name}}, {{$contact->eye_bank_name}}, {{$contact->eye_bank_name}}">
                            <a href="{{ url('frontendeyebank/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('EyeBank.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->eye_bank_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 6)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->hospital_name}}, {{$contact->hospital_name}}, {{$contact->hospital_name}}">
                            <a href="{{ url('frontendhospital/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('hospital.PNG')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->hospital_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 7)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->pharmacy_name}}, {{$contact->pharmacy_name}}, {{$contact->pharmacy_name}}">
                            <a href="{{ url('frontendpharmacy/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('pharmacy.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->pharmacy_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 8)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->medical_specialist_name}}, {{$contact->medical_specialist_name}}, {{$contact->medical_specialist_name}}">
                            <a href="{{ url('frontendmedicalspecialist/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('medicalspecialist.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->medical_specialist_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 9)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->herbal_center_name}}, {{$contact->herbal_center_name}}, {{$contact->herbal_center_name}}">
                            <a href="{{ url('frontendherbalcenter/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('herbalcenter.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->herbal_center_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 10)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->vaccine_point_name}} ,{{$contact->vaccine_point_name}}, {{$contact->vaccine_point_name}}">
                            <a href="{{ url('frontendvaccinepoint/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('vaccination.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->vaccine_point_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 11)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->skin_laser_center_name}} ,{{$contact->skin_laser_center_name}}, {{$contact->skin_laser_center_name}}">
                            <a href="{{ url('frontendskinlasercenter/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('skincare.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->skin_laser_center_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif


                <!-- New Modules -->

                @if($directoryType == 12)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->addiction_name}} ,{{$contact->addiction_name}}, {{$contact->addiction_name}}">
                            <a href="{{ url('frontendaddiction/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('addiction.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->addiction_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 13)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->parlour_name}} ,{{$contact->parlour_name}}, {{$contact->parlour_name}}">
                            <a href="{{ url('frontendparlour/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('parlour.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->parlour_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 14)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->foreignmedical_name}} ,{{$contact->foreignmedical_name}}, {{$contact->foreignmedical_name}}">
                            <a href="{{ url('frontendforeignmedical/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('foreignmedical.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->foreignmedical_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 15)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->gym_name}} ,{{$contact->gym_name}}, {{$contact->gym_name}}">
                            <a href="{{ url('frontendgym/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('gym.PNG')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->gym_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 16)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->homeopathic_name}} ,{{$contact->homeopathic_name}}, {{$contact->homeopathic_name}}">
                            <a href="{{ url('frontendhomeopathic/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('homeopathic.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->homeopathic_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 17)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->optical_name}} ,{{$contact->optical_name}}, {{$contact->optical_name}}">
                            <a href="{{ url('frontendoptical/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('optical.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->optical_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 18)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->pharmacynew_name}} ,{{$contact->pharmacynew_name}}, {{$contact->pharmacynew_name}}">
                            <a href="{{ url('frontendpharmacynew/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('pharmacynew.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->pharmacynew_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 19)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->physiotherapy_name}} ,{{$contact->physiotherapy_name}}, {{$contact->physiotherapy_name}}">
                            <a href="{{ url('frontendphysiotherapy/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('physiotherapy.jpg')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->physiotherapy_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                @if($directoryType == 20)
                    @foreach($contacts as $contact)
                        <div data-uk-filter="{{$contact->yoga_name}} ,{{$contact->yoga_name}}, {{$contact->yoga_name}}">
                            <a href="{{ url('frontendyoga/view'.'/'.$contact->id.'/'.$contact->subdistrict_id)}}">
                                <div class="md-card md-card-hover">
                                    <div class="md-card-head">
                                        @if($contact->photo_path == '')
                                        <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{url('yoga.png')}}" alt=""/>
                                        </div> 
                                        @else
                                       <div class="uk-text-center">
                                            <img class="md-card-head-avatar" style = "border: 1px solid red;" src="{{ url($contact->photo_path) }}" alt=""/>
                                        </div> 
                                        @endif
                                        <h3 class="md-card-head-text uk-text-center" style = "color: black;">
                                            {{$contact->yoga_name}}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                <!-- New Modules Ends-->



            </div>

        </div>
    </div>
    @endif

    

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="{{url('assets/js/common.min.js')}}"></script>
    <!-- uikit functions -->
    <script src="{{url('assets/js/uikit_custom.min.js')}}"></script>
    <!-- altair common functions/helpers -->
    <script src="{{url('assets/js/altair_admin_common.min.js')}}"></script>

    <!-- page specific plugins -->

    <!--  contact list functions -->
    <script src="{{url('assets/js/pages/page_contact_list.min.js')}}"></script>
    
    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
    </script>

</body>
</html>