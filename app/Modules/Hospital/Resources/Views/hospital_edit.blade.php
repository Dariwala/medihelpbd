@extends('layouts.admin_master')

@section('title', 'Health Care Center')

@section('angular')
    <script src="{{url('app/admin/hospital/hospital.module.js')}}"></script>
    <script src="{{url('app/admin/hospital/hospital.controller.js')}}"></script>
    <script src="{{url('app/admin/hospital/hospital.doctor_controller.js')}}"></script>
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
                                @if($hospital->photo_path == '')
                                <div class="thumbnail"><img alt="hospital"  src="{{asset('/hospital.PNG')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="hospital" src="{{ url($hospital->photo_path) }}">
                                </div>
                                @endif
                            </div>

                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$hospital->hospital_name}}</span>
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
                                    <a style="text-align:center" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Service</a>
                                </li>
                            </ul>


                            <ul   class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-app="app" ng-controller="HospitalController">
                                    {!! Form::open(['url' => array('hospital/edit/info', $hospital->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="hospital_id='asdfg'" value="{{$hospital_id}}" name="hospital_id" ng-model="hospital_id">


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
                                                    <label for="hospital_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="hospital_name" name="hospital_name" value="{{ $hospital->hospital_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_hospital_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_hospital_name" name="b_hospital_name" value="{{ $hospital->b_hospital_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="hospital_subname" name="hospital_subname" value="{{ $hospital->hospital_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_hospital_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_hospital_subname" name="b_hospital_subname" value="{{ $hospital->b_hospital_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Health Care Center Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="hospital_photo" name="hospital_photo" class="dropify"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-float-right uk-margin-top">
                                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li ng-controller="HospitalController">
                                    {!! Form::open(['url' => array('hospital/edit/about', $hospital->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid " data-uk-grid-margin>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <label for="hospital_description">Description</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="hospital_description" name="hospital_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $hospital->hospital_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="b_hospital_description">বর্ণনা</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_hospital_description" name="b_hospital_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $hospital->b_hospital_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_address">Address</label>
                                                    <textarea class="md-input" id="hospital_address" name="hospital_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$hospital->hospital_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_hospital_address">ঠিকানা</label>
                                                    <textarea class="md-input" id="b_hospital_address" name="b_hospital_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$hospital->b_hospital_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="hospital_phone_no">Phone</label>
                                                            <textarea class="md-input" id="hospital_phone_no" name="hospital_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$hospital->hospital_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="b_hospital_phone_no">ফোন</label>
                                                            <textarea class="md-input" type="text" id="b_hospital_phone_no" name="b_hospital_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$hospital->b_hospital_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="hospital_email_ad">Email</label>
                                                            <input type="text" id="hospital_email_ad" name="hospital_email_ad" value="{{ $hospital->hospital_email_ad }}" class="md-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_web_link">Website<span class="req"></span></label>
                                                    <input type="text" id="hospital_web_link" name="hospital_web_link" value="{{ $hospital->hospital_web_link}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="hospital_latitude" name="hospital_latitude" value="{{$hospital->hospital_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="hospital_longitude" name="hospital_longitude" value="{{$hospital->hospital_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            <!-- END   longitude latitude field -->
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_total_bed">General Info<span class="req"></span></label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="hospital_total_bed" name="hospital_total_bed" value="{{ $hospital->hospital_total_bed}}" class="md-input">{{ $hospital->hospital_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('hospital_total_bed')?$errors->first('hospital_total_bed'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_hospital_total_bed">সাধারণ তথ্য<span class="req"></span></label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="b_hospital_total_bed" name="b_hospital_total_bed" value="{{ $hospital->b_hospital_total_bed}}" class="md-input">{{ $hospital->b_hospital_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_hospital_total_bed')?$errors->first('b_hospital_total_bed'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_total_doctor">Total Doctor<span class="req"></span></label>
                                                    <input type="text" id="hospital_total_doctor" name="hospital_total_doctor" value="{{ $hospital->hospital_total_doctor}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('hospital_total_doctor')?$errors->first('hospital_total_doctor'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_hospital_total_doctor">মোট ডাক্তার<span class="req"></span></label>
                                                    <input type="text" id="b_hospital_total_doctor" name="b_hospital_total_doctor" value="{{ $hospital->b_hospital_total_doctor}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_hospital_total_doctor')?$errors->first('b_hospital_total_doctor'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="hospital_total_staff">Total Staff<span class="req"></span></label>
                                                    <input type="text" id="hospital_total_staff" name="hospital_total_staff" value="{{ $hospital->hospital_total_staff}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('hospital_total_staff')?$errors->first('hospital_total_staff'):'' }}</p>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_hospital_total_staff">মোট কর্মী<span class="req"></span></label>
                                                    <input type="text" id="b_hospital_total_staff" name="b_hospital_total_staff" value="{{ $hospital->b_hospital_total_staff}}" class="md-input" /> 
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_hospital_total_staff')?$errors->first('b_hospital_total_staff'):'' }}</p>
                                            </div>
                                        </div>
                                        <div class="uk-float-right">
                                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="hospital_id='asdfg'" value="{{$hospital_id}}" name="hospital_id" ng-model="hospital_id">
                                                    
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
                                                        @foreach($hospital_notices as $hospital_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $hospital_notice->created_at}}</td>
                                                                <td>{{ $hospital_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('hospital/edit/notice/edit'.'/'.$hospital_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                        <input class="confirm_id3" type="hidden" name="id3" value="{{$hospital_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($hospital_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('hospital/edit/notice/add'.'/'.$hospital_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('hospital/edit/doctor', $hospital->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="hospital_id='asdfg'" value="{{$hospital_id}}" name="hospital_id" ng-model="hospital_id">
                                                    
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
                                                        @foreach($hospital_doctors as $hospital_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $hospital_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $hospital_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $hospital_doctor->created_at}}</td>
                                                                <td>{{ $hospital_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('hospital/edit/doctor/edit'.'/'.$hospital_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                        <input class="confirm_id2" type="hidden" name="id2" value="{{$hospital_doctor->id}}">

                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('hospital/edit/doctor/add'.'/'.$hospital_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('hospital/edit/service', $hospital->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="hospital_id='asdfg'" value="{{$hospital_id}}" name="hospital_id" ng-model="hospital_id">
                                                    
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
                                                        @foreach($hospital_services as $hospital_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $hospital_service->service->service_name}}</td>
                                                                <td>{{ $hospital_service->created_at}}</td>
                                                                <td>{{ $hospital_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('hospital/edit/service/edit'.'/'.$hospital_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                        <input class="confirm_id1" type="hidden" name="id1" value="{{$hospital_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('hospital/edit/service/add'.'/'.$hospital_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('hospital_description');
    CKEDITOR.replace('hospital_total_bed');
    CKEDITOR.replace('b_hospital_total_bed');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_hospital_description');
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
            window.location.href = "/hospital/edit/service/delete/"+id1;
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
            window.location.href = "/hospital/edit/doctor/delete/"+id2;
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
            window.location.href = "/hospital/edit/notice/delete/"+id3;
        })
    });
</script>

@endsection