@extends('layouts.admin_master')

@section('title', 'Doctors Panel')

@section('angular')
    <script src="{{url('app/admin/medical_specialist/medical_specialist.module.js')}}"></script>
    <script src="{{url('app/admin/medical_specialist/medical_specialist.controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content" ng-controller="MedicalSpecialistController">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($medical_specialist->photo_path == '')
                                <div class="thumbnail"><img alt=" specialist"  src="{{asset('/medicalspecialist.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt=" specialist" src="{{ url($medical_specialist->photo_path) }}">
                                </div>
                                @endif
                            </div>
                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{ $medical_specialist->medical_specialist_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                        @include('partials.flash_message')
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
                                    <a style="text-align: center;" href="#">Speciality</a>
                                </li>
                                <li>
                                    <a style="text-align: center;" href="#">Chamber</a>
                                </li>
                                <li>
                                    <a style="text-align: center;" href="#">Appointment Chamber</a>
                                </li>
                                <li>
                                    <a style="text-align: center;" href="#">Summary</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="MedicalSpecialistController">
                                    {!! Form::open(['url' => array('medical-specialist/edit/info', $medical_specialist->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">


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
                                                    <label for="medical_specialist_name"> Name<span class="req">*</span></label>
                                                    <input type="text" id="medical_specialist_name" name="medical_specialist_name" value="{{ $medical_specialist->medical_specialist_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_medical_specialist_name"> নাম<span class="req">*</span></label>
                                                    <input type="text" id="b_medical_specialist_name" name="b_medical_specialist_name" value="{{ $medical_specialist->b_medical_specialist_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="medical_specialist_subname"> Sub-Name<span class="req"></span></label>
                                                    <input type="text" id="medical_specialist_subname" name="medical_specialist_subname" value="{{ $medical_specialist->medical_specialist_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_medical_specialist_subname">উপ নাম <span class="req"></span></label>
                                                    <input type="text" id="b_medical_specialist_subname" name="b_medical_specialist_subname" value="{{ $medical_specialist->b_medical_specialist_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Doctor Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="medical_specialist_photo" name="medical_specialist_photo" class="dropify"/>
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
                                    {!! Form::open(['url' => array('medical-specialist/edit/about', $medical_specialist->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <select id="select_demo_4" data-md-selectize name="department_id">
                                                <option style="text-align: left; float: left;" value="">Department Name</option>
                                                @foreach($departments as $department)
                                                @if($medical_specialist->department_id == $department->id)
                                                <option   value="{{$department->id}}" selected="">{{$department->department_name}}</option>
                                                @else
                                                <option   value="{{$department->id}}">{{$department->department_name}}</option>
                                                @endif
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="medical_specialist_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="medical_specialist_description" name="medical_specialist_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->medical_specialist_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="b_medical_specialist_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_medical_specialist_description" name="b_medical_specialist_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->b_medical_specialist_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="medical_specialist_address">Address</label>
                                                <textarea class="md-input" id="medical_specialist_address" name="medical_specialist_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->medical_specialist_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_medical_specialist_address">ঠিকানা</label>
                                                <textarea class="md-input" id="b_medical_specialist_address" name="b_medical_specialist_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->b_medical_specialist_address}}</textarea>
                                            </div>
                                        </div>
                                         <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="medical_specialist_phone_no">Phone</label>
                                                        <textarea class="md-input" id="medical_specialist_phone_no" name="medical_specialist_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$medical_specialist->medical_specialist_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_medical_specialist_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_medical_specialist_phone_no" name="b_medical_specialist_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$medical_specialist->b_medical_specialist_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="medical_specialist_email_ad">Email</label>
                                                        <input type="text" id="medical_specialist_email_ad" name="medical_specialist_email_ad" value="{{ $medical_specialist->medical_specialist_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="medical_specialist_web_link">Website<span class="req"></span></label>
                                                <input type="text" id="medical_specialist_web_link" name="medical_specialist_web_link" value="{{$medical_specialist->medical_specialist_web_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="medical_specialist_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="medical_specialist_latitude" name="medical_specialist_latitude" value="{{$medical_specialist->medical_specialist_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="medical_specialist_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="medical_specialist_longitude" name="medical_specialist_longitude" value="{{$medical_specialist->medical_specialist_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_publication_title">General Info<span class="req"></span>
                                            <div class="">
                                                <div>
                                                    <div class="parsley-row uk-margin-top">
                                                        <label class="hidden">New</label>
                                                        <textarea type="text" cols="10" rows="3" name="fee_new" id="fee_new" value="{{$medical_specialist->fee_new}}" class="md-input"><?php echo $medical_specialist->fee_new; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_publication_title">সাধারণ তথ্য<span class="req"></span>
                                            <div class="">
                                                <div>
                                                    <div class="parsley-row uk-margin-top">
                                                        <label class="hidden">নতুন</label>
                                                        <textarea type="text" cols="10" rows="3" id="b_fee_new" name="b_fee_new" value="{{$medical_specialist->b_fee_new}}"  class="md-input"><?php echo $medical_specialist->b_fee_new; ?></textarea>
                                                    </div>
                                                </div>
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

                                                    <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">
                                                    
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
                                                        @foreach($medical_specialist_notices as $medical_specialist_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $medical_specialist_notice->created_at}}</td>
                                                                <td>{{ $medical_specialist_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('medical-specialist/edit/notice/edit'.'/'.$medical_specialist_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                    <input class="confirm_id2" type="hidden" name="id2" value="{{$medical_specialist_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @if(count($medical_specialist_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('medical-specialist/edit/notice/add'.'/'.$medical_specialist_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li ng-controller="MedicalSpecialistController">
                                    {!! Form::open(['url' => array('medical-specialist/edit/info', $medical_specialist->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">
                                        <input type="hidden" value="1" name="medical_specialist_speciality_form">
                                        
                                            <div class="uk-width-medium-1-2">
                                                <label for="specialty">Speciality</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="specialty" name="specialty" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->specialty}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="b_specialty">বিশেষত্ব</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_specialty" name="b_specialty" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->b_specialty}}</textarea>
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

                                                    <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">
                                                    
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
                                                        @foreach($medical_specialist_chambers as $medical_specialist_chamber)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $medical_specialist_chamber->created_at}}</td>
                                                                <td>{{ $medical_specialist_chamber->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('medical-specialist/edit/chamber/edit'.'/'.$medical_specialist_chamber->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                    <input class="confirm_id1" type="hidden" name="id1" value="{{$medical_specialist_chamber->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                                
                                                @if(count($medical_specialist_chambers)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('medical-specialist/edit/chamber/add'.'/'.$medical_specialist_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">

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
                                                                <th data-priority="2">Name</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach($medical_specialist_appointments as $key=>$appointment)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $appointment->chamber_name}}</td>
                                                                <td>{{ $appointment->created_at}}</td>
                                                                <td>{{ $appointment->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('medical-specialist/edit/appointment/edit'.'/'.$appointment->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                    <input class="confirm_id1" type="hidden" name="id1" value="{{$appointment->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('medical-specialist/edit/appointment/add'.'/'.$medical_specialist_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">

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
                                                                <th data-priority="2">Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach($medical_specialist_appointments_notice as $key=>$appointment_notice)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $appointment_notice->created_at }}</td>
                                                                <td>{{ $appointment_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('medical-specialist/edit/appointment/notice/edit'.'/'.$appointment_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                    <input class="confirm_id1" type="hidden" name="id1" value="{{$appointment_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                @if(count($medical_specialist_appointments_notice) < 1)
                                                    <div class="md-fab-wrapper Publication-create">
                                                        <a id="add_Publication_name_button" href="{{ url('medical-specialist/edit/appointment/notice/add'.'/'.$medical_specialist_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('medical_specialist_description');
    CKEDITOR.replace('specialty');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_medical_specialist_description');
    CKEDITOR.replace('b_specialty');
    CKEDITOR.replace('b_fee_new');
    CKEDITOR.replace('fee_new');
</script>

<script type="text/javascript">
    CKEDITOR.replace('medical_specialist_details');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_medical_specialist_details');
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
            window.location.href = "/medical-specialist/edit/chamber/delete/"+id1;
        })
    });
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
            window.location.href = "/medical-specialist/edit/appointment/delete/"+id1;
        })
    });
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
            window.location.href = "/medical-specialist/edit/appointment/notice/delete/"+id1;
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
            window.location.href = "/medical-specialist/edit/notice/delete/"+id2;
        })
    });
</script>
@endsection