<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"  ng-app="app"> <!--<![endif]-->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>
    
        <link rel="icon" type="image/png" href="{{url('vendor/img/logo1.png')}}" sizes="16x16">
    
        <title>@yield('title')</title>
    
    
        <!-- uikit -->
        <link rel="stylesheet" href="{{ url('assets/bower_components/uikit/css/uikit.almost-flat.min.css') }}" media="all">
    
        <!-- ckeditor -->
        <script type="text/javascript" src="{{url('assets/ckeditor/ckeditor.js')}}"></script>
    
        <!-- flag icons -->
        <link rel="stylesheet" href="{{ url('assets/assets/icons/flags/flags.min.css') }}" media="all">
    
        <!-- style switcher -->
        <link rel="stylesheet" href="{{ url('assets/assets/css/style_switcher.min.css') }}" media="all">
    
        <!-- altair admin -->
        <link rel="stylesheet" href="{{ url('assets/assets/css/main.min.css') }}" media="all">
    
        <!-- themes -->
        <link rel="stylesheet" href="{{ url('assets/assets/css/themes/themes_combined.min.css') }}" media="all">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
    
        <!-- kendo UI -->
        <link rel="stylesheet" href="{{url('assets/bower_components/kendo-ui/styles/kendo.common-material.min.css')}}"/>
        <link rel="stylesheet" href="{{url('assets/bower_components/kendo-ui/styles/kendo.material.min.css')}}" id="kendoCSS"/>
    
        <link href="{{url('assets/assets/css/custom_result.css')}}" media="all" rel="stylesheet">
    
           <!-- altair admin -->
        <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}" media="all">
        <style type="text/css">
            .hidden{
                display: none !important;
            }
            .home-link {
                color: white;
                font-weight: bold !important;
                font-size: 1.2em;
            }
            .home-link:hover {
                color: #dadada;
                text-decoration: none;
            }
            .resultText{
                text-align: center;
                padding-top: 25px;
                padding-right: 15px;
                font-size: 1.4em;
                color: white;
                font-weight: bold;
            }
        </style>
    
        <!-- matchMedia polyfill for testing media queries in JS -->
        <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="assets/css/ie.css" media="all">
        <![endif]-->
    
    </head>

    <body class=" sidebar_main_open sidebar_main_swipe">
        
        <!-- main header -->
        <header id="header_main">
            <div class="header_main_content">
                <nav class="uk-navbar">
        
                    <!-- main sidebar switch -->
                    <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                        <span class="sSwitchIcon"></span>
                    </a>
        
                    <!-- secondary sidebar switch -->
                    <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                        <span class="sSwitchIcon"></span>
                    </a>
                    
                    <div class="main_logo_top">
                        <a class = "home-link" href="{{'/'}}">Home</a>
                    </div>
        
                    <div class="uk-navbar-flip">
                        <ul class="uk-navbar-nav user_actions">
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a href="#" class="user_action_image"><img class="md-user-image" src="{{url('vendor/img/user.png')}}" alt=""/></a>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li>
                                            <a href="{{ route('change_password_index')}}">
                                                Change Password
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
        
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!--  -->
        </header><!-- main header end -->
        <!-- main sidebar -->
        <aside id="sidebar_main">
        
            <div class="sidebar_main_header">
                <div class="sidebar_main_header">
                    <h4 class="resultText">
                        <a href="{{ url('/home') }}">
                            <span class="resultText">Dashboard</span>
                        </a>
                    </h4>
                </div>
            </div>
                    
            <div class="menu_section">
                <ul>
                    
                    <li title="District">
                        <a href="{{ url('/district') }}">
                            <span class="menu_icon"><i class="material-icons">add_location</i></span>
                            <span class="menu_title">District</span>
                        </a>
                    </li>
                    <li title="Sub-District">
                        <a href="{{ url('/district/sub-district') }}">
                            <span class="menu_icon"><i class="material-icons">add_location</i></span>
                            <span class="menu_title">Sub-District</span>
                        </a>
                    </li>
                    
                    <!--<li title="Chats">-->
                    <!--    <a href="#">-->
                    <!--        <span class="menu_icon"><i class="material-icons">&#xE0B9;</i></span>-->
                    <!--        <span class="menu_title">Products</span>-->
                    <!--    </a>-->
                    <!--    <ul>-->
                    <!--        <li><a href="{{ url('/product-category') }}">Product Category</a></li>-->
                    <!--        <li><a href="{{ url('/product-category/sub-category') }}">Product Subcategory</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    
                    <li title="Department">
                        <a href="{{ url('/medical-department') }}">
                            <span class="menu_icon"><i class="material-icons">add_location</i></span>
                            <span class="menu_title">Department</span>
                        </a>
                    </li>
                    
                    <li title="Sertvices">
                        <a href="{{ url('/service') }}">
                            <span class="menu_icon"><i class="material-icons">add_location</i></span>
                            <span class="menu_title">Service</span>
                        </a>
                    </li>
                    
                    <li title="Images">
                        <a href="{{ route('notice_index') }}">
                            <span class="menu_icon"><i class="material-icons">view_list</i></span>
                            <span class="menu_title">Images</span>
                        </a>
                    </li>
                    
                    <li title="Modules">
                        <a href="{{ route('modules_index') }}">
                            <span class="menu_icon"><i class="material-icons">view_list</i></span>
                            <span class="menu_title">Modules</span>
                        </a>
                    </li>
                    
                    <li title="24 Hours Pharmacy">
                        <a href="{{ url('/pharmacy') }}">
                            
                            <span class="menu_title">24 Hours Pharmacy</span>
                        </a>
                    </li>
                    <li title="Addiction Rehabilitation Center">
                        <a href="{{ url('/addiction') }}">
                            
                            <span class="menu_title">Addiction Rehabilitation Center</span>
                        </a>
                    </li>
                    <li title="Air Ambulance">
                        <a href="{{ url('/air-ambulance') }}">
                            
                            <span class="menu_title">Air Ambulance</span>
                        </a>
                    </li>
                    <li title="Ambulance">
                        <a href="{{ url('/ambulance') }}">
                            
                            <span class="menu_title">Ambulance</span>
                        </a>
                    </li>
                    <li title="Beauty Parlour & Spa">
                        <a href="{{ url('/parlour') }}">
                            
                            <span class="menu_title">Beauty Parlour & Spa</span>
                        </a>
                    </li>
                    <li title="Blood Bank">
                        <a href="{{ url('/blood-bank') }}">
                            
                            <span class="menu_title">Blood Bank</span>
                        </a>
                    </li>
                    <li title="Blood Donor">
                        <a href="{{ url('/blood-donar') }}">
                            
                            <span class="menu_title">Blood Donor</span>
                        </a>
                    </li>
                    <li title="Doctors Panel">
                        <a href="{{ url('/medical-specialist') }}">
                            
                            <span class="menu_title">Doctors Panel</span>
                        </a>
                    </li>
                    <li title="Eye Bank">
                        <a href="{{ url('/eye-bank') }}">
                            
                            <span class="menu_title">Eye Bank</span>
                        </a>
                    </li>
                    <li title="Foreign Medical Information Center">
                        <a href="{{ url('/foreignmedical') }}">
                            
                            <span class="menu_title">Foreign Medical Information Center</span>
                        </a>
                    </li>
                    <li title="Gym">
                        <a href="{{ url('/gym') }}">
                            
                            <span class="menu_title">Gym</span>
                        </a>
                    </li>
                    <li title="Health Care Center">
                        <a href="{{ url('/hospital') }}">
                            
                            <span class="menu_title">Health Care Center</span>
                        </a>
                    </li>
                    <li title="Herbal Medicine Center">
                         <a href="{{ url('/herbal-center') }}">
                            
                            <span class="menu_title">Herbal Medicine Center</span>
                        </a>
                    </li>
                    <li title="Homeopathic Medicine Center">
                         <a href="{{ url('/homeopathic') }}">
                            
                            <span class="menu_title">Homeopathic Medicine Center</span>
                        </a>
                    </li>
                    <li title="Optical Shop">
                         <a href="{{ url('/optical') }}">
                            
                            <span class="menu_title">Optical Shop</span>
                        </a>
                    </li>
                    <li title="Pharmacy">
                         <a href="{{ url('/pharmacynew') }}">
                            
                            <span class="menu_title">Pharmacy</span>
                        </a>
                    </li>
                    <li title="Physiotherapy & Rehabilitation Center">
                         <a href="{{ url('/physiotherapy') }}">
                            
                            <span class="menu_title">Physiotherapy & Rehabilitation Center</span>
                        </a>
                    </li>
                    <li title="Skin Care & Laser Center">
                         <a href="{{ url('/skin-laser-center') }}">
                            
                            <span class="menu_title">Skin Care & Laser Center</span>
                        </a>
                    </li>
                    <li title="Vaccination Center">
                         <a href="{{ url('/vaccine-point') }}">
                            
                            <span class="menu_title">Vaccination Center</span>
                        </a>
                    </li>
                    <li title="Yoga Center">
                         <a href="{{ url('/yoga') }}">
                            
                            <span class="menu_title">Yoga Center</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </aside><!-- main sidebar end -->
        
        @yield('content')
        
            <!-- google web fonts -->
            
            
            
            <!-- common functions -->
            <script src="{{ url('assets/assets/js/common.min.js')}}"></script>
            <!-- uikit functions -->
            <script src="{{ url('assets/assets/js/uikit_custom.min.js')}}"></script>
            <!-- altair common functions/helpers -->
            <script src="{{ url('assets/assets/js/altair_admin_common.min.js')}}"></script>

            <!-- page specific plugins -->
            <!-- datatables -->
            <script src="{{ url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
            <!-- datatables buttons-->
            <script src="{{ url('assets/bower_components/datatables-buttons/js/dataTables.buttons.js')}}"></script>
            <script src="{{ url('assets/assets/js/custom/datatables/buttons.uikit.js')}}"></script>
            <script src="{{ url('assets/bower_components/jszip/dist/jszip.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/pdfmake/build/pdfmake.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/pdfmake/build/vfs_fonts.js')}}"></script>
            <script src="{{ url('assets/bower_components/datatables-buttons/js/buttons.colVis.js')}}"></script>
            <script src="{{ url('assets/bower_components/datatables-buttons/js/buttons.html5.js')}}"></script>
            <script src="{{ url('assets/bower_components/datatables-buttons/js/buttons.print.js')}}"></script>
            <!-- datatables custom integration -->
            <script src="{{ url('assets/assets/js/custom/datatables/datatables.uikit.min.js')}}"></script>
            <!--  datatables functions -->
            <script src="{{ url('assets/assets/js/pages/plugins_datatables.min.js')}}"></script>
            

            <!-- tablesorter -->
            <script src="{{ url('assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/tablesorter/dist/js/widgets/widget-columnSelector.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/tablesorter/dist/js/widgets/widget-print.min.js')}}"></script>
            <script src="{{ url('assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js')}}"></script>
            

            <!-- ionrangeslider -->
            <script src="{{ url('assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js')}}"></script>
            <!--  tablesorter functions -->

            
            <!--  forms advanced functions -->
            <script src="{{ url('assets/assets/js/pages/forms_advanced.min.js')}}"></script>
            <script src="{{ url('assets/assets/js/kendoui_custom.min.js')}}"></script>
            <!--  kendoui functions -->
            <script src="{{ url('assets/assets/js/pages/kendoui.min.js')}}"></script>
            
            <!--for high desity-->
            <script>
                
            </script>
            
            <script>
                $('.multi-select').kendoMultiSelect();
                $('.single-select').kendoComboBox();
            </script>
            <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.js"></script>
            
            @yield('script')

            <script src="{{url('angular/angular.min.js')}}"></script>

            @yield('angular')
        
    </body>

</html>
