@extends('layouts.frontend_master_02')

@section('title', 'Notice Details')

@section('angular')
    <script src="{{url('app/frontend/frontend/pharmacy.view.js')}}"></script>
    <script src="{{url('app/frontend/frontend/pharmacy.b_view.js')}}"></script>
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

    @if(Session('language')=='bn')
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">মোট নোটিস <br/>{{BanglaConverter::en2bn($total_notice)}}</</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($notice_all as $data)
                        <li @if($data->id == $notice->id) class="selectedSidebar" @endif>
                            <a href="{{ route('notice_frontend', ['id'=>$data->id, 'sub_district_id'=>$data->sub_district_id ]) }}">
                                <span class="md-list-heading">{{ $notice->b_title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    @else
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">Total Notice<br/>{{ $total_notice }}</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($notice_all as $data)
                        <li @if($data->id == $notice->id) class="selectedSidebar" @endif>
                            <a href="{{ route('notice_frontend', ['id'=>$data->id, 'sub_district_id'=>$data->sub_district_id ]) }}">
                                <span class="md-list-heading">{{ $data->title}}</span>
                            </a>
                        </li>
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
                <div class="user_content">
                    <div class="uk-grid" data-uk-grid-margin>   
                        <div class="uk-width-medium-1-1">
                            <h2 style="text-align: center;"><strong>{{ $notice->b_title }}</strong></h2>
                            <p>@php echo $notice->b_details; @endphp</p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="uk-width-large-7-10">
            <div class="md-card">
                <div class="user_content">
                    <div class="uk-grid" data-uk-grid-margin>   
                        <div class="uk-width-medium-1-1">
                            <h2 style="text-align: center;"><strong>{{ $notice->title }}</strong></h2>
                            <p>@php echo $notice->details; @endphp</p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection