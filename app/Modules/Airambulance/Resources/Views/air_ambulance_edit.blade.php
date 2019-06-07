@extends('layouts.admin_master')

@section('title', 'Air Ambulance')

@section('angular')
    <script src="{{url('app/admin/air_ambulance/air_ambulance.module.js')}}"></script>
    <script src="{{url('app/admin/air_ambulance/air_ambulance.controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($air_ambulance->photo_path == '')
                                <div class="thumbnail"><img alt="Airmbulance"  src="{{asset('/logo1.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="Airmbulance" src="{{ url($air_ambulance->photo_path) }}">
                                </div>
                                @endif
                            </div>
                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$air_ambulance->air_ambulance_name}}</span>
                                </h2>
                            </div>
                        </div>

                        @include('partials.flash_message')

                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align: center;" href="#">Info</a>
                                </li>

                                <li class="">
                                    <a style="text-align: center;" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align: center;" href="#">Article</a>
                                </li>
                                <li>
                                    <a style="text-align: center;" href="#">Service</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="AirAmbulanceController">
                                    {!! Form::open(['url' => array('air-ambulance/edit/info', $air_ambulance->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="air_ambulance_id='asdfg'" value="{{$air_ambulance_id}}" name="air_ambulance_id" ng-model="air_ambulance_id">


                                            <div class="uk-width-medium-1-2">
                                                <select id="district_id" name="district_id" ng-model="district_id" ng-change="getSubdistrict()" required>
                                                </select>
                                            </div>
                                            <div class="uk-width-medium-1-2" >
                                                <select id="subdistrict_id" name="subdistrict_id" ng-model="subdistrict_id">
                                                </select>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="air_ambulance_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="air_ambulance_name" name="air_ambulance_name" value="{{ $air_ambulance->air_ambulance_name}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_air_ambulance_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_air_ambulance_name" name="b_air_ambulance_name" value="{{ $air_ambulance->b_air_ambulance_name}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="air_ambulance_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="air_ambulance_subname" name="air_ambulance_subname" value="{{ $air_ambulance->air_ambulance_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_air_ambulance_subname">উপ শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_air_ambulance_subname" name="b_air_ambulance_subname" value="{{ $air_ambulance->b_air_ambulance_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Air Ambulance Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="air_ambulance_photo" name="air_ambulance_photo" class="dropify"/>
                                                </div>
                                            </div>
                                            <div class=" uk-width-medium-1-1 ">
                                                <div class="uk-float-right uk-margin-top">
                                                    <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li ng-controller="AirAmbulanceController">
                                    {!! Form::open(['url' => array('air-ambulance/edit/about', $air_ambulance->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid " data-uk-grid-margin>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <label for="add_course_description">Description</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="air_ambulance_description" name="air_ambulance_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$air_ambulance->air_ambulance_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="add_course_description">বর্ণনা</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_air_ambulance_description" name="b_air_ambulance_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$air_ambulance->b_air_ambulance_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="add_course_description">Address</label>
                                                    <textarea class="md-input" id="air_ambulance_address" name="air_ambulance_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$air_ambulance->air_ambulance_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="add_course_description">ঠিকানা</label>
                                                    <textarea class="md-input" id="b_air_ambulance_address" name="b_air_ambulance_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$air_ambulance->b_air_ambulance_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="air_ambulance_phone_no">Phone</label>
                                                            <textarea class="md-input" id="air_ambulance_phone" name="air_ambulance_phone" cols="10" rows="3" data-parsley-trigger="keyup">{{$air_ambulance->air_ambulance_phone}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="air_ambulance_phone_no">ফোন</label>
                                                            <textarea class="md-input" type="text" id="b_air_ambulance_phone" name="b_air_ambulance_phone" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$air_ambulance->b_air_ambulance_phone}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="air_ambulance_email_ad">Email</label>
                                                            <input type="text" id="air_ambulance_email_ad" name="air_ambulance_email" value="{{ $air_ambulance->air_ambulance_email }}" class="md-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="air_ambulance_fb_link">Website</label>
                                                    <input type="text" id="air_ambulance_fb_link" name="air_ambulance_fb_link" value="{{$air_ambulance->air_ambulance_fb_link}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="air_ambulance_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="air_ambulance_latitude" name="air_ambulance_latitude" value="{{$air_ambulance->air_ambulance_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="air_ambulance_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="air_ambulance_longitude" name="air_ambulance_longitude" value="{{$air_ambulance->air_ambulance_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            <!-- END   longitude latitude field -->
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="add_publication_title">General Info</label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="total_air_ambulance" name="total_air_ambulance" value="{{$air_ambulance->total_air_ambulance}}"  class="md-input ">{{$air_ambulance->total_air_ambulance}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="add_publication_title">সাধারণ তথ্য</label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="b_total_air_ambulance" name="b_total_air_ambulance" value="{{$air_ambulance->b_total_air_ambulance}}"  class="md-input ">{{$air_ambulance->b_total_air_ambulance}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top hidden">
                                                    <label for="air_ambulance_web_link">Website</label>
                                                    <input type="text" id="air_ambulance_web_link" name="air_ambulance_web_link" value="{{$air_ambulance->air_ambulance_web_link}}"  class="md-input" />
                                                </div>
                                            </div>
                                            <div class=" uk-width-medium-1-1 ">
                                                <div class="uk-float-right uk-margin-top">
                                                    <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="air_ambulance_id='asdfg'" value="{{$air_ambulance_id}}" name="air_ambulance_id" ng-model="air_ambulance_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="dt_tableExport">
                                                        <thead>
                                                            <tr>
                                                                <th data-priority="critical">Id</th>
                                                                <th data-priority="2">Created at</th>
                                                                <th data-priority="2">Updated at</th>
                                                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach($air_ambulance_notices as $air_ambulance_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $air_ambulance_notice->created_at}}</td>
                                                                <td>{{ $air_ambulance_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('air-ambulance/edit/notice/edit'.'/'.$air_ambulance_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                    <input class="confirm_id2" type="hidden" name="id2" value="{{$air_ambulance_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($air_ambulance_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('air-ambulance/edit/notice/add'.'/'.$air_ambulance_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('air-ambulance/edit/service', $air_ambulance->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="air_ambulance_id='asdfg'" value="{{$air_ambulance_id}}" name="air_ambulance_id" ng-model="air_ambulance_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="dt_tableExport">
                                                        <thead>
                                                            <tr>
                                                                <th data-priority="critical">Id</th>
                                                                <th data-priority="2">Name</th>
                                                                <th data-priority="2">Created at</th>
                                                                <th data-priority="2">Updated at</th>
                                                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php  $i=1; ?>
                                                        @foreach($air_ambulance_services as $air_ambulance_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $air_ambulance_service->service->service_name}}</td>
                                                                <td>{{ $air_ambulance_service->created_at}}</td>
                                                                <td>{{ $air_ambulance_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('air-ambulance/edit/service/edit'.'/'.$air_ambulance_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3" >
                                                                        <input class="confirm_id3" type="hidden" name="id3" value="{{$air_ambulance_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('air-ambulance/edit/service/add'.'/'.$air_ambulance_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script type="text/javascript">
    CKEDITOR.replace('air_ambulance_description');
</script>

<script type="text/javascript">
    CKEDITOR.replace('b_air_ambulance_description');
</script>

<script type="text/javascript">
   // CKEDITOR.replace('blood_donor_description');
</script>

<script type="text/javascript">
   // CKEDITOR.replace('b_blood_donor_description');
    CKEDITOR.replace('total_air_ambulance');
    CKEDITOR.replace('b_total_air_ambulance');
</script>

<script type="text/javascript">
$('.confirm1').click(function(){
    var id1 = $('.confirm_id1', $(this)).val();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        window.location.href = "/air-ambulance/edit/pricing/delete/"+id1;
    })
});
</script>
<script type="text/javascript">
$('.confirm2').click(function(){
    var id2 = $('.confirm_id2', $(this)).val();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        window.location.href = "/air-ambulance/edit/notice/delete/"+id2;
    })
});
</script>
<script type="text/javascript">
$('.confirm3').click(function(){
    var id3 = $('.confirm_id3', $(this)).val();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        window.location.href = "/air-ambulance/edit/service/delete/"+id3;
    })
});
</script>

@endsection