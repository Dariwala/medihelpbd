@extends('layouts.admin_master')

@section('title', 'Physiotherapy & Rehabilitation Center')

@section('angular')
    <script src="{{url('app/admin/physiotherapy/physiotherapy.module.js')}}"></script>
    <script src="{{url('app/admin/physiotherapy/physiotherapy.controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content" ng-controller="PhysiotherapyController">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($physiotherapy->photo_path == '')
                                <div class="thumbnail"><img alt="physiotherapy"  src="{{asset('/physiotherapy.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="physiotherapy" src="{{ url($physiotherapy->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$physiotherapy->physiotherapy_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            @include('partials.flash_message')
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align:center" href="#">Info</a>
                                </li>

                                <li class="">
                                    <a style="text-align:center" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Article</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Medicinal</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Service</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="PhysiotherapyController">
                                    {!! Form::open(['url' => array('physiotherapy/edit/info', $physiotherapy->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="physiotherapy_id='asdfg'" value="{{$physiotherapy_id}}" name="physiotherapy_id" ng-model="physiotherapy_id">


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
                                                    <label for="physiotherapy_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="physiotherapy_name" name="physiotherapy_name" value="{{ $physiotherapy->physiotherapy_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_physiotherapy_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_physiotherapy_name" name="b_physiotherapy_name" value="{{ $physiotherapy->b_physiotherapy_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="physiotherapy_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="physiotherapy_subname" name="physiotherapy_subname" value="{{ $physiotherapy->physiotherapy_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_physiotherapy_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_physiotherapy_subname" name="b_physiotherapy_subname" value="{{ $physiotherapy->b_physiotherapy_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Physiotherapy & Rehabilitation Center Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="physiotherapy_photo" name="physiotherapy_photo" class="dropify"/>
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
                                <li ng-controller="PhysiotherapyController">
                                    {!! Form::open(['url' => array('physiotherapy/edit/about', $physiotherapy->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="physiotherapy_description" name="physiotherapy_description" value="{{ $physiotherapy->physiotherapy_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $physiotherapy->physiotherapy_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_physiotherapy_description" name="b_physiotherapy_description" value="{{ $physiotherapy->b_physiotherapy_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $physiotherapy->b_physiotherapy_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="physiotherapy_address">Address</label>
                                                <textarea class="md-input" id="physiotherapy_address" name="physiotherapy_address" value="{{ $physiotherapy->physiotherapy_address}}" cols="10" rows="2" data-parsley-trigger="keyup" >{{ $physiotherapy->physiotherapy_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_physiotherapy_address">ঠিকানা</label>
                                                <textarea class="md-input" name="b_physiotherapy_address"  cols="10" rows="2"  value="{{ $physiotherapy->b_physiotherapy_address}}" >{{ $physiotherapy->b_physiotherapy_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="physiotherapy_phone_no">Phone</label>
                                                        <textarea class="md-input" id="physiotherapy_phone_no" name="physiotherapy_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$physiotherapy->physiotherapy_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_physiotherapy_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_physiotherapy_phone_no" name="b_physiotherapy_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$physiotherapy->b_physiotherapy_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="physiotherapy_email_ad">Email</label>
                                                        <input type="text" id="physiotherapy_email_ad" name="physiotherapy_email_ad" value="{{ $physiotherapy->physiotherapy_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="physiotherapy_web_link">Website<span class="req"></span></label>
                                                <input type="text" id="physiotherapy_web_link" name="physiotherapy_web_link" value="{{$physiotherapy->physiotherapy_web_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="physiotherapy_latitude">Latitude<span class="req"></span></label>
                                                <input type="text" id="physiotherapy_latitude" name="physiotherapy_latitude" value="{{$physiotherapy->physiotherapy_latitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="physiotherapy_longitude">Longitude<span class="req"></span></label>
                                                <input type="text" id="physiotherapy_longitude" name="physiotherapy_longitude" value="{{$physiotherapy->physiotherapy_longitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">General Info</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title" name="total_medicine" value="{{ $physiotherapy->total_medicine}}" required class="md-input">{{ $physiotherapy->total_medicine}}</textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">সাধারণ তথ্য</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title2" name="b_total_medicine" value="{{ $physiotherapy->b_total_medicine}}" required class="md-input">{{ $physiotherapy->b_total_medicine}}</textarea>
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

                                                    <input type="hidden" ng-init="physiotherapy_id='asdfg'" value="{{$physiotherapy_id}}" name="physiotherapy_id" ng-model="physiotherapy_id">
                                                    
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
                                                        @foreach($physiotherapy_notices as $physiotherapy_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $physiotherapy_notice->created_at}}</td>
                                                                <td>{{ $physiotherapy_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('physiotherapy/edit/notice/edit'.'/'.$physiotherapy_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                    <input class="confirm_id3" type="hidden" name="id3" value="{{$physiotherapy_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($physiotherapy_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('physiotherapy/edit/notice/add'.'/'.$physiotherapy_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('physiotherapy/edit/doctor', $physiotherapy->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="physiotherapy_id='asdfg'" value="{{$physiotherapy_id}}" name="physiotherapy_id" ng-model="physiotherapy_id">
                                                    
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
                                                        @foreach($physiotherapy_doctors as $physiotherapy_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $physiotherapy_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $physiotherapy_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $physiotherapy_doctor->created_at}}</td>
                                                                <td>{{ $physiotherapy_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('physiotherapy/edit/doctor/edit'.'/'.$physiotherapy_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                    <input class="confirm_id2" type="hidden" name="id2" value="{{$physiotherapy_doctor->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('physiotherapy/edit/doctor/add'.'/'.$physiotherapy_id) }}"  class="md-fab md-fab-accent Publication-create">
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
                                                        @foreach($physiotherapy_products as $physiotherapy_product)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $physiotherapy_product->created_at}}</td>
                                                            <td>{{ $physiotherapy_product->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('physiotherapy/edit/product/edit'.'/'.$physiotherapy_product->id.'/'.$physiotherapy_id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                <a class="confirm1">
                                                                <input class="confirm_id1" type="hidden" name="id1" value="{{$physiotherapy_product->id}}">
                                                                <i class="md-icon material-icons">&#xE872;</i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Add Publication plus sign -->
                                            @if(count($physiotherapy_products)< 1)
                                            
                                            <div class="md-fab-wrapper Publication-create">
                                                <a id="add_Publication_name_button" href="{{ url('physiotherapy/edit/product/add'.'/'.$physiotherapy_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                    <i class="material-icons">&#xE145;</i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-card">
                                        <div class="md-card-content">
                                            <div class="uk-overflow-container uk-margin-bottom">
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
                                                        @foreach($physiotherapy_services as $physiotherapy_service)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $physiotherapy_service->service->service_name }}</td>
                                                            <td>{{ $physiotherapy_service->created_at}}</td>
                                                            <td>{{ $physiotherapy_service->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('physiotherapy/edit/service/edit'.'/'.$physiotherapy_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                
                                                                <a class="confirm4">
                                                                    <input class="confirm_id4" type="hidden" name="id4" value="{{ $physiotherapy_service->id }}">
                                                                    <i class="md-icon material-icons">&#xE872;</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Add Publication plus sign -->
                                            <div class="md-fab-wrapper Publication-create">
                                                <a id="add_Publication_name_button" href="{{ url('physiotherapy/edit/service/add'.'/'.$physiotherapy_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                    <i class="material-icons">&#xE145;</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
    CKEDITOR.replace('physiotherapy_description');
    CKEDITOR.replace('add_publication_title');
    CKEDITOR.replace('add_publication_title2');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_physiotherapy_description');
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
            window.location.href = "/physiotherapy/edit/product/delete/"+id1;
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
            window.location.href = "/physiotherapy/edit/doctor/delete/"+id2;
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
            window.location.href = "/physiotherapy/edit/notice/delete/"+id3;
        })
    });
</script>
<script type="text/javascript">
    $('.confirm4').click(function(){
        var id4 = $('.confirm_id4', $(this)).val();
        alert
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/physiotherapy/edit/service/delete/"+id4;
        })
    });
</script>
@endsection