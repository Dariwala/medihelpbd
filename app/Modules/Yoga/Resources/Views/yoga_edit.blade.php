@extends('layouts.admin_master')

@section('title', 'Yoga')

@section('angular')
    <script src="{{url('app/admin/yoga/yoga.module.js')}}"></script>
    <script src="{{url('app/admin/yoga/yoga.controller.js')}}"></script>
    <script src="{{url('app/admin/yoga/yoga.doctor_controller.js')}}"></script>
@endsection

@section('content')
<style type="text/css">
    tr:nth-child(even) 
    {
        background-color: #f2f2f2;
    }
</style>
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                @include('partials.flash_message')
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($yoga->photo_path == '')
                                <div class="thumbnail"><img alt="yoga"  src="{{asset('/yoga.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="yoga" src="{{ url($yoga->photo_path) }}">
                                </div>
                                @endif
                            </div>

                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$yoga->yoga_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align:center" href="#">Info</a>
                                </li>

                                <li>
                                    <a style="text-align:center" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Article</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Service</a>
                                </li>
                            </ul>


                            <ul   class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-app="app" ng-controller="YogaController">
                                    {!! Form::open(['url' => array('yoga/edit/info', $yoga->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="yoga_id='asdfg'" value="{{$yoga_id}}" name="yoga_id" ng-model="yoga_id">


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
                                                    <label for="yoga_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="yoga_name" name="yoga_name" value="{{ $yoga->yoga_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_yoga_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_yoga_name" name="b_yoga_name" value="{{ $yoga->b_yoga_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="yoga_subname" name="yoga_subname" value="{{ $yoga->yoga_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_yoga_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_yoga_subname" name="b_yoga_subname" value="{{ $yoga->b_yoga_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Yoga  Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="yoga_photo" name="yoga_photo" class="dropify"/>
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
                                <li ng-controller="YogaController">
                                    {!! Form::open(['url' => array('yoga/edit/about', $yoga->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid " data-uk-grid-margin>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <label for="yoga_description">Description</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="yoga_description" name="yoga_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $yoga->yoga_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="b_yoga_description">বর্ণনা</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_yoga_description" name="b_yoga_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $yoga->b_yoga_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_address">Address</label>
                                                    <textarea class="md-input" id="yoga_address" name="yoga_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$yoga->yoga_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_yoga_address">ঠিকানা</label>
                                                    <textarea class="md-input" id="b_yoga_address" name="b_yoga_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$yoga->b_yoga_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="yoga_phone_no">Phone</label>
                                                            <textarea class="md-input" id="yoga_phone_no" name="yoga_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$yoga->yoga_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="b_yoga_phone_no">ফোন</label>
                                                            <textarea class="md-input" type="text" id="b_yoga_phone_no" name="b_yoga_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$yoga->b_yoga_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="yoga_email_ad">Email</label>
                                                            <input type="text" id="yoga_email_ad" name="yoga_email_ad" value="{{ $yoga->yoga_email_ad }}" class="md-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_web_link">Website<span class="req"></span></label>
                                                    <input type="text" id="yoga_web_link" name="yoga_web_link" value="{{ $yoga->yoga_web_link}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="yoga_latitude" name="yoga_latitude" value="{{$yoga->yoga_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="yoga_longitude" name="yoga_longitude" value="{{$yoga->yoga_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                        <!-- END   longitude latitude field -->
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_total_bed">General Info<span class="req"></span></label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="yoga_total_bed" name="yoga_total_bed" value="{{ $yoga->yoga_total_bed}}" class="md-input">{{ $yoga->yoga_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('yoga_total_bed')?$errors->first('yoga_total_bed'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_yoga_total_bed">সাধারণ তথ্য<span class="req"></span></label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="b_yoga_total_bed" name="b_yoga_total_bed" value="{{ $yoga->b_yoga_total_bed}}" class="md-input">{{ $yoga->b_yoga_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_yoga_total_bed')?$errors->first('b_yoga_total_bed'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_total_doctor">Total Doctor<span class="req"></span></label>
                                                    <input type="text" id="yoga_total_doctor" name="yoga_total_doctor" value="{{ $yoga->yoga_total_doctor}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('yoga_total_doctor')?$errors->first('yoga_total_doctor'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_yoga_total_doctor">মোট ডাক্তার<span class="req"></span></label>
                                                    <input type="text" id="b_yoga_total_doctor" name="b_yoga_total_doctor" value="{{ $yoga->b_yoga_total_doctor}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_yoga_total_doctor')?$errors->first('b_yoga_total_doctor'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="yoga_total_staff">Total Staff<span class="req"></span></label>
                                                    <input type="text" id="yoga_total_staff" name="yoga_total_staff" value="{{ $yoga->yoga_total_staff}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('yoga_total_staff')?$errors->first('yoga_total_staff'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_yoga_total_staff">মোট কর্মী<span class="req"></span></label>
                                                    <input type="text" id="b_yoga_total_staff" name="b_yoga_total_staff" value="{{ $yoga->b_yoga_total_staff}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_yoga_total_staff')?$errors->first('b_yoga_total_staff'):'' }}</p>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-1">
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

                                                    <input type="hidden" ng-init="yoga_id='asdfg'" value="{{$yoga_id}}" name="yoga_id" ng-model="yoga_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
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
                                                        @foreach($yoga_notices as $yoga_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $yoga_notice->created_at}}</td>
                                                                <td>{{ $yoga_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('yoga/edit/notice/edit'.'/'.$yoga_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                        <input class="confirm_id3" type="hidden" name="id3" value="{{$yoga_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($yoga_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('yoga/edit/notice/add'.'/'.$yoga_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('yoga/edit/service', $yoga->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="yoga_id='asdfg'" value="{{$yoga_id}}" name="yoga_id" ng-model="yoga_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
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
                                                        @foreach($yoga_services as $yoga_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $yoga_service->service->service_name}}</td>
                                                                <td>{{ $yoga_service->created_at}}</td>
                                                                <td>{{ $yoga_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('yoga/edit/service/edit'.'/'.$yoga_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                        <input class="confirm_id1" type="hidden" name="id1" value="{{$yoga_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('yoga/edit/service/add'.'/'.$yoga_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('yoga_description');
    CKEDITOR.replace('yoga_total_bed');
    CKEDITOR.replace('b_yoga_total_bed');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_yoga_description');
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
            window.location.href = "/yoga/edit/service/delete/"+id1;
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
            window.location.href = "/yoga/edit/doctor/delete/"+id2;
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
            window.location.href = "/yoga/edit/notice/delete/"+id3;
        })
    });
</script>

@endsection