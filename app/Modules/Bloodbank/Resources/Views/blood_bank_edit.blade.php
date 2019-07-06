@extends('layouts.admin_master')

@section('title', 'Blood Bank')

@section('angular')
    <script src="{{url('app/admin/blood_bank/blood_bank.module.js')}}"></script>
    <script src="{{url('app/admin/blood_bank/blood_bank.controller.js')}}"></script>
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
                                @if($blood_bank->photo_path == '')
                                <div class="thumbnail"><img alt="blood bank"  src="{{asset('/BloodBank.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="blood bank" src="{{ url($blood_bank->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$blood_bank->blood_bank_name}}</span>
                                </h2>
                            </div>
                        </div>
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
                                    <a style="text-align: center;" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align: center;" href="#">Service</a>
                                </li>
                                
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="BloodBankController">
                                    {!! Form::open(['url' => array('blood-bank/edit/info', $blood_bank->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="blood_bank_id='asdfg'" value="{{$blood_bank_id}}" name="blood_bank_id" ng-model="blood_bank_id">


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
                                                    <label for="blood_bank_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="blood_bank_name" name="blood_bank_name" value="{{ $blood_bank->blood_bank_name}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_blood_bank_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_blood_bank_name" name="b_blood_bank_name" value="{{ $blood_bank->b_blood_bank_name}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="blood_bank_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="blood_bank_subname" name="blood_bank_subname" value="{{ $blood_bank->blood_bank_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_blood_bank_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_blood_bank_subname" name="b_blood_bank_subname" value="{{ $blood_bank->b_blood_bank_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Blood Bank Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="blood_bank_photo" name="blood_bank_photo" class="dropify"/>
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
                                <li ng-controller="BloodBankController">
                                    {!! Form::open(['url' => array('blood-bank/edit/about', $blood_bank->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="blood_bank_description" name="blood_bank_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_bank->blood_bank_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_blood_bank_description" name="b_blood_bank_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_bank->b_blood_bank_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_bank_address">Address</label>
                                                <textarea class="md-input" id="blood_bank_address" name="blood_bank_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_bank->blood_bank_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_blood_bank_address">ঠিকানা</label>
                                                <textarea class="md-input" id="b_blood_bank_address" name="b_blood_bank_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_bank->b_blood_bank_address}}</textarea>
                                            </div>
                                        </div>
                                         <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="blood_bank_phone_no">Phone</label>
                                                        <textarea class="md-input" id="blood_bank_phone_no" name="blood_bank_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$blood_bank->blood_bank_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_blood_bank_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_blood_bank_phone_no" name="b_blood_bank_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$blood_bank->b_blood_bank_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="blood_bank_email_ad">Email</label>
                                                        <input type="text" id="blood_bank_email_ad" name="blood_bank_email_ad" value="{{ $blood_bank->blood_bank_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_bank_fb_link">Website</label>
                                                <input type="text" id="blood_bank_fb_link" name="blood_bank_fb_link" value="{{$blood_bank->blood_bank_fb_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_bank_latitude">Latitude<span class="req"></span></label>
                                                <input type="text" id="blood_bank_latitude" name="blood_bank_latitude" value="{{$blood_bank->blood_bank_latitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_bank_longitude">Longitude<span class="req"></span></label>
                                                <input type="text" id="blood_bank_longitude" name="blood_bank_longitude" value="{{$blood_bank->blood_bank_longitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">General Info</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="blood_group_details" name="blood_group_details" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_bank->blood_group_details}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">সাধারণ তথ্য</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_blood_group_details" name="b_blood_group_details" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_bank->b_blood_group_details}}</textarea>
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

                                                    <input type="hidden" ng-init="blood_bank_id='asdfg'" value="{{$blood_bank_id}}" name="blood_bank_id" ng-model="blood_bank_id">
                                                    
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
                                                        @foreach($blood_bank_notices as $blood_bank_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $blood_bank_notice->created_at}}</td>
                                                                <td>{{ $blood_bank_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('blood-bank/edit/notice/edit'.'/'.$blood_bank_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2" >
                                                                        <input class="confirm_id2" type="hidden" name="id2" value="{{$blood_bank_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($blood_bank_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('blood-bank/edit/notice/add'.'/'.$blood_bank_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('blood-bank/edit/doctor', $blood_bank->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="blood_bank_id='asdfg'" value="{{$blood_bank_id}}" name="blood_bank_id" ng-model="blood_bank_id">
                                                    
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
                                                        @foreach($blood_bank_doctors as $blood_bank_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $blood_bank_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $blood_bank_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $blood_bank_doctor->created_at}}</td>
                                                                <td>{{ $blood_bank_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('blood-bank/edit/doctor/edit'.'/'.$blood_bank_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                        <input class="confirm_id3" type="hidden" name="id3" value="{{$blood_bank_doctor->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('blood-bank/edit/doctor/add'.'/'.$blood_bank_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    {!! Form::open(['url' => array('blood-bank/edit/service', $blood_bank->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="blood_bank_id='asdfg'" value="{{$blood_bank_id}}" name="blood_bank_id" ng-model="blood_bank_id">
                                                    
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
                                                        @foreach($blood_bank_services as $blood_bank_service)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $blood_bank_service->service->service_name}}</td>
                                                                <td>{{ $blood_bank_service->created_at}}</td>
                                                                <td>{{ $blood_bank_service->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('blood-bank/edit/service/edit'.'/'.$blood_bank_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1" >
                                                                        <input class="confirm_id1" type="hidden" name="id2" value="{{$blood_bank_service->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('blood-bank/edit/service/add'.'/'.$blood_bank_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('blood_bank_description');
</script>

<script type="text/javascript">
    CKEDITOR.replace('b_blood_bank_description');
</script>

<script type="text/javascript">
    CKEDITOR.replace('blood_group_details');
</script>

<script type="text/javascript">
    CKEDITOR.replace('b_blood_group_details');
    CKEDITOR.replace('total_blood_bag');
    CKEDITOR.replace('b_total_blood_bag');
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
            window.location.href = "/blood-bank/edit/service/delete/"+id1;
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
            window.location.href = "/blood-bank/edit/notice/delete/"+id2;
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
            window.location.href = "/blood-bank/edit/doctor/delete/"+id3;
        })
    });
</script>

@endsection