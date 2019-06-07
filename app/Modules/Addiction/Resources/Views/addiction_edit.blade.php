@extends('layouts.admin_master')

@section('title', 'Addiction Rehabilitation Center')

@section('angular')
    <script src="{{url('app/admin/addiction/addiction.module.js')}}"></script>
    <script src="{{url('app/admin/addiction/addiction.controller.js')}}"></script>
    <script src="{{url('app/admin/addiction/addiction.doctor_controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($addiction->photo_path == '')
                                <div class="thumbnail"><img alt="addiction"  src="{{asset('/addiction.PNG')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="addiction" src="{{ url($addiction->photo_path) }}">
                                </div>
                                @endif
                            </div>

                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$addiction->addiction_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                        @include('partials.flash_message')
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
                                    <a style="text-align:center" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Service</a>
                                </li>
                            </ul>


                            <ul   class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-app="app" ng-controller="AddictionController">
                                    {!! Form::open(['url' => array('addiction/edit/info', $addiction->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="addiction_id='asdfg'" value="{{$addiction_id}}" name="addiction_id" ng-model="addiction_id">


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
                                                    <label for="addiction_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="addiction_name" name="addiction_name" value="{{ $addiction->addiction_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_addiction_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_addiction_name" name="b_addiction_name" value="{{ $addiction->b_addiction_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="addiction_subname" name="addiction_subname" value="{{ $addiction->addiction_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_addiction_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_addiction_subname" name="b_addiction_subname" value="{{ $addiction->b_addiction_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Addiction Rehabilitation Center Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="addiction_photo" name="addiction_photo" class="dropify"/>
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
                                <li ng-controller="AddictionController">
                                    {!! Form::open(['url' => array('addiction/edit/about', $addiction->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid " data-uk-grid-margin>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <label for="addiction_description">Description</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="addiction_description" name="addiction_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $addiction->addiction_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="b_addiction_description">বর্ণনা</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_addiction_description" name="b_addiction_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $addiction->b_addiction_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_address">Address</label>
                                                    <textarea class="md-input" id="addiction_address" name="addiction_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$addiction->addiction_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_addiction_address">ঠিকানা</label>
                                                    <textarea class="md-input" id="b_addiction_address" name="b_addiction_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$addiction->b_addiction_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="addiction_phone_no">Phone</label>
                                                            <textarea class="md-input" id="addiction_phone_no" name="addiction_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$addiction->addiction_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="b_addiction_phone_no">ফোন</label>
                                                            <textarea class="md-input" type="text" id="b_addiction_phone_no" name="b_addiction_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$addiction->b_addiction_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="addiction_email_ad">Email</label>
                                                            <input type="text" id="addiction_email_ad" name="addiction_email_ad" value="{{ $addiction->addiction_email_ad }}" class="md-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_web_link">Website<span class="req"></span></label>
                                                    <input type="text" id="addiction_web_link" name="addiction_web_link" value="{{ $addiction->addiction_web_link}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="addiction_latitude" name="addiction_latitude" value="{{$addiction->addiction_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="addiction_longitude" name="addiction_longitude" value="{{$addiction->addiction_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            <!-- END   longitude latitude field -->
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_total_bed">General Info<span class="req"></span></label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="addiction_total_bed" name="addiction_total_bed" value="{{ $addiction->addiction_total_bed}}" class="md-input">{{ $addiction->addiction_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('addiction_total_bed')?$errors->first('addiction_total_bed'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_addiction_total_bed">সাধারণ তথ্য<span class="req"></span></label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="b_addiction_total_bed" name="b_addiction_total_bed" value="{{ $addiction->b_addiction_total_bed}}" class="md-input">{{ $addiction->b_addiction_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_addiction_total_bed')?$errors->first('b_addiction_total_bed'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_total_doctor">Total Doctor<span class="req"></span></label>
                                                    <input type="text" id="addiction_total_doctor" name="addiction_total_doctor" value="{{ $addiction->addiction_total_doctor}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('addiction_total_doctor')?$errors->first('addiction_total_doctor'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_addiction_total_doctor">মোট ডাক্তার<span class="req"></span></label>
                                                    <input type="text" id="b_addiction_total_doctor" name="b_addiction_total_doctor" value="{{ $addiction->b_addiction_total_doctor}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_addiction_total_doctor')?$errors->first('b_addiction_total_doctor'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="addiction_total_staff">Total Staff<span class="req"></span></label>
                                                    <input type="text" id="addiction_total_staff" name="addiction_total_staff" value="{{ $addiction->addiction_total_staff}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('addiction_total_staff')?$errors->first('addiction_total_staff'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_addiction_total_staff">মোট কর্মী<span class="req"></span></label>
                                                    <input type="text" id="b_addiction_total_staff" name="b_addiction_total_staff" value="{{ $addiction->b_addiction_total_staff}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_addiction_total_staff')?$errors->first('b_addiction_total_staff'):'' }}</p>
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

                                                    <input type="hidden" ng-init="addiction_id='asdfg'" value="{{$addiction_id}}" name="addiction_id" ng-model="addiction_id">
                                                    
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
                                                        @foreach($addiction_notices as $addiction_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $addiction_notice->created_at}}</td>
                                                                <td>{{ $addiction_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('addiction/edit/notice/edit'.'/'.$addiction_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                        <input class="confirm_id3" type="hidden" name="id3" value="{{$addiction_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($addiction_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('addiction/edit/notice/add'.'/'.$addiction_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('addiction/edit/doctor', $addiction->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="addiction_id='asdfg'" value="{{$addiction_id}}" name="addiction_id" ng-model="addiction_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
                                                        <thead>
                                                            <tr>
                                                                <th data-priority="critical">Id</th>
                                                                <th data-priority="critical">Name</th>
                                                                <th data-priority="critical">Speciality</th>
                                                                <th data-priority="2">Created at</th>
                                                                <th data-priority="2">Updated at</th>
                                                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Speciality</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php  $i=1; ?>
                                                        @foreach($addiction_doctors as $addiction_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $addiction_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $addiction_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $addiction_doctor->created_at}}</td>
                                                                <td>{{ $addiction_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('addiction/edit/doctor/edit'.'/'.$addiction_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                        <input class="confirm_id2" type="hidden" name="id2" value="{{$addiction_doctor->id}}">

                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('addiction/edit/doctor/add'.'/'.$addiction_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('addiction/edit/service', $addiction->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="addiction_id='asdfg'" value="{{$addiction_id}}" name="addiction_id" ng-model="addiction_id">
                                                    
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
                                                        @foreach($addiction_services as $addiction_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $addiction_service->service->service_name}}</td>
                                                                <td>{{ $addiction_service->created_at}}</td>
                                                                <td>{{ $addiction_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('addiction/edit/service/edit'.'/'.$addiction_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                        <input class="confirm_id1" type="hidden" name="id1" value="{{$addiction_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('addiction/edit/service/add'.'/'.$addiction_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('addiction_description');
    CKEDITOR.replace('addiction_total_bed');
    CKEDITOR.replace('b_addiction_total_bed');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_addiction_description');
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
            window.location.href = "/addiction/edit/service/delete/"+id1;
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
            window.location.href = "/addiction/edit/doctor/delete/"+id2;
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
            window.location.href = "/addiction/edit/notice/delete/"+id3;
        })
    });
</script>

@endsection