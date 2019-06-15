@extends('layouts.admin_master')

@section('title', 'Skin Care & Laser Center')

@section('angular')
    <script src="{{url('app/admin/skin_laser_center/skin_laser_center.module.js')}}"></script>
    <script src="{{url('app/admin/skin_laser_center/skin_laser_center.controller.js')}}"></script>
    <script src="{{url('app/admin/skin_laser_center/skin_laser_center.doctor_controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                @include('partials.flash_message')
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($skin_laser_center->photo_path == '')
                                <div class="thumbnail"><img alt="skin laser center"  src="{{asset('/skincare.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="skin laser center" src="{{ url($skin_laser_center->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{ $skin_laser_center->skin_laser_center_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align:center;" href="#">Info</a>
                                </li>

                                <li>
                                    <a style="text-align:center;" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align:center;" href="#">Article</a>
                                </li>
                                <li>
                                    <a style="text-align:center;" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align:center;" href="#">Service</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="SkinLaserCenterController">
                                    {!! Form::open(['url' => array('skin-laser-center/edit/info', $skin_laser_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="skin_laser_center_id='asdfg'" value="{{$skin_laser_center_id}}" name="skin_laser_center_id" ng-model="skin_laser_center_id">


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
                                                    <label for="skin_laser_center_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="skin_laser_center_name" name="skin_laser_center_name" value="{{ $skin_laser_center->skin_laser_center_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_skin_laser_center_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_skin_laser_center_name" name="b_skin_laser_center_name" value="{{ $skin_laser_center->b_skin_laser_center_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="skin_laser_center_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="skin_laser_center_subname" name="skin_laser_center_subname" value="{{ $skin_laser_center->skin_laser_center_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_skin_laser_center_subname"> উপ শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_skin_laser_center_subname" name="b_skin_laser_center_subname" value="{{ $skin_laser_center->b_skin_laser_center_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Skin Care & Laser Center Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="skin_laser_center_photo" name="skin_laser_center_photo" class="dropify"/>
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
                                <li ng-controller="SkinLaserCenterController">
                                    {!! Form::open(['url' => array('skin-laser-center/edit/about', $skin_laser_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid " data-uk-grid-margin>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <label for="skin_laser_center_description">Description</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="skin_laser_center_description" name="skin_laser_center_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $skin_laser_center->skin_laser_center_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="b_skin_laser_center_description"> বর্ণনা</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea class="md-input" id="b_skin_laser_center_description" name="b_skin_laser_center_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $skin_laser_center->b_skin_laser_center_description}} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="skin_laser_center_address">Address</label>
                                                    <textarea class="md-input" id="skin_laser_center_address" name="skin_laser_center_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$skin_laser_center->skin_laser_center_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_skin_laser_center_address">ঠিকানা</label>
                                                    <textarea class="md-input" id="b_skin_laser_center_address" name="b_skin_laser_center_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$skin_laser_center->b_skin_laser_center_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="skin_laser_center_phone_no">Phone</label>
                                                            <textarea class="md-input" id="skin_laser_center_phone_no" name="skin_laser_center_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$skin_laser_center->skin_laser_center_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="b_skin_laser_center_phone_no">ফোন</label>
                                                            <textarea class="md-input" type="text" id="b_skin_laser_center_phone_no" name="b_skin_laser_center_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$skin_laser_center->b_skin_laser_center_phone_no}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="uk-width-medium-1-2">
                                                <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                    <div class="uk-width-10-10">
                                                        <div class="parsley-row uk-margin-top">
                                                            <label for="skin_laser_center_email_ad">Email</label>
                                                            <input type="text" id="skin_laser_center_email_ad" name="skin_laser_center_email_ad" value="{{ $skin_laser_center->skin_laser_center_email_ad }}" class="md-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="skin_laser_center_web_link">Website</label>
                                                    <input type="text" id="skin_laser_center_web_link" name="skin_laser_center_web_link" value="{{ $skin_laser_center->skin_laser_center_web_link}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <!-- START longitude latitude field -->
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="skin_laser_center_latitude">Latitude<span class="req"></span></label>
                                                    <input type="text" id="skin_laser_center_latitude" name="skin_laser_center_latitude" value="{{$skin_laser_center->skin_laser_center_latitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="skin_laser_center_longitude">Longitude<span class="req"></span></label>
                                                    <input type="text" id="skin_laser_center_longitude" name="skin_laser_center_longitude" value="{{$skin_laser_center->skin_laser_center_longitude}}"  class="md-input" /> 
                                                </div>
                                            </div>
                                            <!-- END   longitude latitude field -->
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="skin_laser_center_total_bed">General Info</label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="skin_laser_center_total_bed" name="skin_laser_center_total_bed" value="{{ $skin_laser_center->skin_laser_center_total_bed}}" class="md-input">{{ $skin_laser_center->skin_laser_center_total_bed}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_skin_laser_center_total_bed">সাধারণ তথ্য</label>
                                                    <div class="parsley-row uk-margin-top">
                                                        <textarea type="text" id="b_skin_laser_center_total_bed" name="b_skin_laser_center_total_bed" value="{{ $skin_laser_center->b_skin_laser_center_total_bed}}" class="md-input">{{ $skin_laser_center->b_skin_laser_center_total_bed}}
                                                        </textarea>
                                                    </div>
                                                </div>
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

                                                    <input type="hidden" ng-init="skin_laser_center_id='asdfg'" value="{{$skin_laser_center_id}}" name="skin_laser_center_id" ng-model="skin_laser_center_id">
                                                    
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
                                                        @foreach($skin_laser_center_notices as $skin_laser_center_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $skin_laser_center_notice->created_at}}</td>
                                                                <td>{{ $skin_laser_center_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('skin-laser-center/edit/notice/edit'.'/'.$skin_laser_center_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                    <input class="confirm_id3" type="hidden" name="id3" value="{{$skin_laser_center_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($skin_laser_center_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('skin-laser-center/edit/notice/add'.'/'.$skin_laser_center_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('skin-laser-center/edit/doctor', $skin_laser_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="skin_laser_center_id='asdfg'" value="{{$skin_laser_center_id}}" name="skin_laser_center_id" ng-model="skin_laser_center_id">
                                                    
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
                                                        @foreach($skin_laser_center_doctors as $skin_laser_center_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $skin_laser_center_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $skin_laser_center_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $skin_laser_center_doctor->created_at}}</td>
                                                                <td>{{ $skin_laser_center_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('skin-laser-center/edit/doctor/edit'.'/'.$skin_laser_center_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                    <input class="confirm_id2" type="hidden" name="id2" value="{{$skin_laser_center_doctor->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('skin-laser-center/edit/doctor/add'.'/'.$skin_laser_center_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('skin-laser-center/edit/service', $skin_laser_center->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="skin_laser_center_id='asdfg'" value="{{$skin_laser_center_id}}" name="skin_laser_center_id" ng-model="skin_laser_center_id">
                                                    
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
                                                        @foreach($skin_laser_center_services as $skin_laser_center_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $skin_laser_center_service->service->service_name}}</td>
                                                                <td>{{ $skin_laser_center_service->created_at}}</td>
                                                                <td>{{ $skin_laser_center_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('skin-laser-center/edit/service/edit'.'/'.$skin_laser_center_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                    <input class="confirm_id1" type="hidden" name="id1" value="{{$skin_laser_center_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('skin-laser-center/edit/service/add'.'/'.$skin_laser_center_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('skin_laser_center_description');
    CKEDITOR.replace('skin_laser_center_total_bed');
    CKEDITOR.replace('b_skin_laser_center_total_bed');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_skin_laser_center_description');
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
            window.location.href = "/skin-laser-center/edit/service/delete/"+id1;
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
            window.location.href = "/skin-laser-center/edit/doctor/delete/"+id2;
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
            window.location.href = "/skin-laser-center/edit/notice/delete/"+id3;
        })
    });
</script>
@endsection