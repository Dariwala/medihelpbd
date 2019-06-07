@extends('layouts.admin_master')

@section('title', 'Herbal Medicine Center')

@section('angular')
    <script src="{{url('app/admin/herbal_center/herbal_center.module.js')}}"></script>
    <script src="{{url('app/admin/herbal_center/herbal_center.controller.js')}}"></script>
    <script src="{{url('app/admin/herbal_center/herbal_center.doctor_controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($herbal_center->photo_path == '')
                                <div class="thumbnail"><img alt="herbal center"  src="{{asset('/herbalcenter.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="herbal center" src="{{ url($herbal_center->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$herbal_center->herbal_center_name}}</span>
                                </h2>
                            </div>
                        </div>

 
                        <div class="user_content">
                        @include('partials.flash_message')
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a  style="text-align: center"  href="#">Info</a>
                                </li>
                                <li>
                                    <a  style="text-align: center"  href="#">About</a>
                                </li>
                                <li>
                                    <a  style="text-align: center"  href="#">Article</a>
                                </li>
                                <li>
                                    <a  style="text-align: center"  href="#">Doctor</a>
                                </li>
                                <li>
                                    <a  style="text-align: center"  href="#">Medicinal</a>
                                </li>
                                <li>
                                    <a  style="text-align: center"  href="#">Service</a>
                                </li>
                               
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="HerbalCenterController">
                                    {!! Form::open(['url' => array('herbal-center/edit/info', $herbal_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="herbal_center_id='asdfg'" value="{{$herbal_center_id}}" name="herbal_center_id" ng-model="herbal_center_id">


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
                                                    <label for="herbal_center_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="herbal_center_name" name="herbal_center_name" value="{{ $herbal_center->herbal_center_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_herbal_center_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_herbal_center_name" name="b_herbal_center_name" value="{{ $herbal_center->b_herbal_center_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="herbal_center_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="herbal_center_subname" name="herbal_center_subname" value="{{ $herbal_center->herbal_center_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_herbal_center_subname"> উপ শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_herbal_center_subname" name="b_herbal_center_subname" value="{{ $herbal_center->b_herbal_center_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Herbal Medicine Center Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="herbal_center_photo" name="herbal_center_photo" class="dropify"/>
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
                                <li ng-controller="HerbalCenterController">
                                    {!! Form::open(['url' => array('herbal-center/edit/about', $herbal_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid " data-uk-grid-margin>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <label for="herbal_center_description">Description</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="herbal_center_description" name="herbal_center_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $herbal_center->herbal_center_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="b_herbal_center_description">বর্ণনা</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_herbal_center_description" name="b_herbal_center_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $herbal_center->b_herbal_center_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="add_course_description">Address</label>
                                                    <textarea class="md-input" id="herbal_center_address" name="herbal_center_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$herbal_center->herbal_center_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="add_course_description">ঠিকানা</label>
                                                    <textarea class="md-input" id="b_herbal_center_address" name="b_herbal_center_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$herbal_center->b_herbal_center_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="herbal_center_phone_no">Phone</label>
                                                            <textarea class="md-input" id="herbal_center_phone_no" name="herbal_center_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$herbal_center->herbal_center_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="b_herbal_center_phone_no">ফোন</label>
                                                            <textarea class="md-input" type="text" id="b_herbal_center_phone_no" name="b_herbal_center_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$herbal_center->b_herbal_center_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="herbal_center_email_ad">Email</label>
                                                            <input type="text" id="herbal_center_email_ad" name="herbal_center_email_ad" value="{{ $herbal_center->herbal_center_email_ad }}" class="md-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top ">
                                                    <label for="herbal_center_web_link">Website</label>
                                                    <input type="text" id="herbal_center_web_link" name="herbal_center_web_link" value="{{ $herbal_center->herbal_center_web_link}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="herbal_center_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="herbal_center_latitude" name="herbal_center_latitude" value="{{$herbal_center->herbal_center_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="herbal_center_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="herbal_center_longitude" name="herbal_center_longitude" value="{{$herbal_center->herbal_center_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            <!-- END   longitude latitude field -->
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="herbal_center_total_bed">General Info</label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="herbal_center_total_bed" name="herbal_center_total_bed" value="{{ $herbal_center->herbal_center_total_bed}}" class="md-input">{{ $herbal_center->herbal_center_total_bed}}</textarea> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_herbal_center_total_bed">সাধারণ তথ্য</label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="b_herbal_center_total_bed" name="b_herbal_center_total_bed" value="{{ $herbal_center->b_herbal_center_total_bed}}" class="md-input">{{ $herbal_center->b_herbal_center_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="herbal_center_total_doctor">Total Doctor</label>
                                                    <input type="text" id="herbal_center_total_doctor" name="herbal_center_total_doctor" value="{{ $herbal_center->herbal_center_total_doctor}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_herbal_center_total_doctor">মোট ডাক্তার</label>
                                                    <input type="text" id="b_herbal_center_total_doctor" name="b_herbal_center_total_doctor" value="{{ $herbal_center->b_herbal_center_total_doctor}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="herbal_center_total_staff">Total Staff</label>
                                                    <input type="text" id="herbal_center_total_staff" name="herbal_center_total_staff" value="{{ $herbal_center->herbal_center_total_staff}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2 hidden">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_herbal_center_total_staff">মোট কর্মী</label>
                                                    <input type="text" id="b_herbal_center_total_staff" name="b_herbal_center_total_staff" value="{{ $herbal_center->b_herbal_center_total_staff}}" class="md-input" /> 
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

                                                    <input type="hidden" ng-init="herbal_center_id='asdfg'" value="{{$herbal_center_id}}" name="herbal_center_id" ng-model="herbal_center_id">
                                                    
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
                                                        <?php  $i=1; ?>
                                                        @foreach($herbal_center_notices as $herbal_center_notice)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $herbal_center_notice->created_at}}</td>
                                                                <td>{{ $herbal_center_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('herbal-center/edit/notice/edit'.'/'.$herbal_center_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                        <input class="confirm_id3" type="hidden" name="id3" value="{{$herbal_center_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($herbal_center_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('herbal-center/edit/notice/add'.'/'.$herbal_center_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('herbal-center/edit/doctor', $herbal_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="herbal_center_id='asdfg'" value="{{$herbal_center_id}}" name="herbal_center_id" ng-model="herbal_center_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="dt_tableExport">
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
                                                        @foreach($herbal_center_doctors as $herbal_center_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $herbal_center_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $herbal_center_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $herbal_center_doctor->created_at}}</td>
                                                                <td>{{ $herbal_center_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('herbal-center/edit/doctor/edit'.'/'.$herbal_center_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                        <input class="confirm_id2" type="hidden" name="id2" value="{{$herbal_center_doctor->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('herbal-center/edit/doctor/add'.'/'.$herbal_center_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <div class="md-card">
                                        <div class="md-card-content">
                                            <div class="uk-overflow-container uk-margin-bottom">
                                                <input type="hidden" ng-init="herbal_center_id='asdfg'" value="{{$herbal_center_id}}" name="herbal_center_id" ng-model="herbal_center_id">
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
                                                        @foreach($herbal_center_products as $herbal_center_product)
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{ $herbal_center_product->created_at}}</td>
                                                            <td>{{ $herbal_center_product->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('herbal-center/edit/product/edit'.'/'.$herbal_center_product->id.'/'.$herbal_center_id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                <a class="confirm0">
                                                                <input class="confirm_id0" type="hidden" name="id0" value="{{$herbal_center_product->id}}">
                                                                <i class="md-icon material-icons">&#xE872;</i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Add Publication plus sign -->
                                            @if(count($herbal_center_products)<1)
                                            <div class="md-fab-wrapper Publication-create">
                                                <a id="add_Publication_name_button" href="{{ url('herbal-center/edit/product/add'.'/'.$herbal_center_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                    <i class="material-icons">&#xE145;</i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('herbal-center/edit/service', $herbal_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="herbal_center_id='asdfg'" value="{{$herbal_center_id}}" name="herbal_center_id" ng-model="herbal_center_id">
                                                    
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
                                                                <th>name</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php  $i=1; ?>
                                                        @foreach($herbal_center_services as $herbal_center_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $herbal_center_service->service->service_name}}</td>
                                                                <td>{{ $herbal_center_service->created_at}}</td>
                                                                <td>{{ $herbal_center_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('herbal-center/edit/service/edit'.'/'.$herbal_center_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                        <input class="confirm_id1" type="hidden" name="id1" value="{{$herbal_center_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('herbal-center/edit/service/add'.'/'.$herbal_center_id) }}"  class="md-fab md-fab-accent Publication-create">
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
 CKEDITOR.replace('herbal_center_description')  ; 
 CKEDITOR.replace('b_herbal_center_description')  ; 
 CKEDITOR.replace('herbal_center_total_bed')  ; 
 CKEDITOR.replace('b_herbal_center_total_bed')  ; 
</script>

<script type="text/javascript">
    $('.confirm0').click(function(){
        var id0 = $('.confirm_id0', $(this)).val();
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/herbal-center/edit/product/delete/"+id0;
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
            window.location.href = "/herbal-center/edit/service/delete/"+id1;
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
            window.location.href = "/herbal-center/edit/doctor/delete/"+id2;
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
            window.location.href = "/herbal-center/edit/notice/delete/"+id3;
        })
    });
</script>
@endsection