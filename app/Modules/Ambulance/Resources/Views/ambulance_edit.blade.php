@extends('layouts.admin_master')

@section('title', 'Ambulance')

@section('angular')
    <script src="{{url('app/admin/ambulance/ambulance.module.js')}}"></script>
    <script src="{{url('app/admin/ambulance/ambulance.controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($ambulance->photo_path == '')
                                <div class="thumbnail"><img alt="Ambulance"  src="{{asset('ambulance.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="Ambulance" src="{{ url($ambulance->photo_path) }}">
                                </div>
                                @endif
                            </div>
                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{ $ambulance->ambulance_name}}</span>
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
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="AmbulanceController">
                                    {!! Form::open(['url' => array('ambulance/edit/info', $ambulance->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="ambulance_id='asdfg'" value="{{$ambulance_id}}" name="ambulance_id" ng-model="ambulance_id">


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
                                                    <label for="ambulance_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="ambulance_name" name="ambulance_name" value="{{ $ambulance->ambulance_name}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_ambulance_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_ambulance_name" name="b_ambulance_name" value="{{ $ambulance->b_ambulance_name}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="ambulance_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="ambulance_subname" name="ambulance_subname" value="{{ $ambulance->ambulance_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_ambulance_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_ambulance_subname" name="b_ambulance_subname" value="{{ $ambulance->b_ambulance_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Ambulance Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="ambulance_photo" name="ambulance_photo" class="dropify"/>
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
                                <li ng-controller="AmbulanceController">
                                {!! Form::open(['url' => array('ambulance/edit/about', $ambulance->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="ambulance_description" name="ambulance_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$ambulance->ambulance_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_ambulance_description" name="b_ambulance_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$ambulance->b_ambulance_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_course_description">Address</label>
                                                <textarea class="md-input" id="ambulance_address" name="ambulance_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$ambulance->ambulance_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_course_description">ঠিকানা</label>
                                                <textarea class="md-input" id="b_ambulance_address" name="b_ambulance_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$ambulance->b_ambulance_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="ambulance_phone_no">Phone</label>
                                                        <textarea class="md-input" id="ambulance_phone" name="ambulance_phone" cols="10" rows="3" data-parsley-trigger="keyup">{{$ambulance->ambulance_phone}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="ambulance_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_ambulance_phone" name="b_ambulance_phone" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$ambulance->b_ambulance_phone}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="ambulance_email_ad">Email</label>
                                                        <input type="text" id="ambulance_email_ad" name="ambulance_email" value="{{ $ambulance->ambulance_email }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="air_ambulance_fb_link">Website</label>
                                                <input type="text" id="ambulance_fb_link" name="ambulance_fb_link" value="{{$ambulance->ambulance_fb_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="ambulance_latitude">Latitude<span class="req"></span></label>
                                                <input type="text" id="ambulance_latitude" name="ambulance_latitude" value="{{$ambulance->ambulance_latitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="ambulance_longitude">Longitude<span class="req"></span></label>
                                                <input type="text" id="ambulance_longitude" name="ambulance_longitude" value="{{$ambulance->ambulance_longitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">General Info</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="total_ambulance" name="total_ambulance" value="{{$ambulance->total_ambulance}}"  class="md-input ">{{$ambulance->total_ambulance}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">সাধারন তথ্য</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="b_total_ambulance" name="b_total_ambulance" value="{{$ambulance->b_total_ambulance}}"  class="md-input ">{{$ambulance->b_total_ambulance}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-float-right uk-margin-top">
                                                <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="ambulance_id='asdfg'" value="{{$ambulance_id}}" name="ambulance_id" ng-model="ambulance_id">
                                                    
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
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach($ambulance_notices as $ambulance_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $ambulance_notice->created_at}}</td>
                                                                <td>{{ $ambulance_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('ambulance/edit/notice/edit'.'/'.$ambulance_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                        <input class="confirm_id2" type="hidden" name="id2" value="{{$ambulance_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($ambulance_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('ambulance/edit/notice/add'.'/'.$ambulance_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
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
     CKEDITOR.replace('ambulance_description');
</script>
<script type="text/javascript">
     CKEDITOR.replace('b_ambulance_description');
     CKEDITOR.replace('total_ambulance');
     CKEDITOR.replace('b_total_ambulance');
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
            window.location.href = "/ambulance/edit/pricing/delete/"+id1;
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
            window.location.href = "/ambulance/edit/notice/delete/"+id2;
        })
    });
</script>
@endsection