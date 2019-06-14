@extends('layouts.admin_master')

@section('title', 'Foreign Medical Information Center')

@section('angular')
    <script src="{{url('app/admin/foreignmedical/foreignmedical.module.js')}}"></script>
    <script src="{{url('app/admin/foreignmedical/foreignmedical.controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content" ng-controller="ForeignmedicalController">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($foreignmedical->photo_path == '')
                                <div class="thumbnail"><img alt="foreignmedical"  src="{{asset('/foreignmedical.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="foreignmedical" src="{{ url($foreignmedical->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$foreignmedical->foreignmedical_name}}</span>
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
                                    <a style="text-align:center" href="#">Service</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="ForeignmedicalController">
                                    {!! Form::open(['url' => array('foreignmedical/edit/info', $foreignmedical->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="foreignmedical_id='asdfg'" value="{{$foreignmedical_id}}" name="foreignmedical_id" ng-model="foreignmedical_id">


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
                                                    <label for="foreignmedical_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="foreignmedical_name" name="foreignmedical_name" value="{{ $foreignmedical->foreignmedical_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_foreignmedical_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_foreignmedical_name" name="b_foreignmedical_name" value="{{ $foreignmedical->b_foreignmedical_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="foreignmedical_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="foreignmedical_subname" name="foreignmedical_subname" value="{{ $foreignmedical->foreignmedical_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_foreignmedical_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_foreignmedical_subname" name="b_foreignmedical_subname" value="{{ $foreignmedical->b_foreignmedical_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Foreign Medical Information Center Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="foreignmedical_photo" name="foreignmedical_photo" class="dropify"/>
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
                                <li ng-controller="ForeignmedicalController">
                                    {!! Form::open(['url' => array('foreignmedical/edit/about', $foreignmedical->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="foreignmedical_description" name="foreignmedical_description" value="{{ $foreignmedical->foreignmedical_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $foreignmedical->foreignmedical_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_foreignmedical_description" name="b_foreignmedical_description" value="{{ $foreignmedical->b_foreignmedical_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $foreignmedical->b_foreignmedical_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="foreignmedical_address">Address</label>
                                                <textarea class="md-input" id="foreignmedical_address" name="foreignmedical_address" value="{{ $foreignmedical->foreignmedical_address}}" cols="10" rows="2" data-parsley-trigger="keyup" >{{ $foreignmedical->foreignmedical_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_foreignmedical_address">ঠিকানা</label>
                                                <textarea class="md-input" name="b_foreignmedical_address"  cols="10" rows="2"  value="{{ $foreignmedical->b_foreignmedical_address}}" >{{ $foreignmedical->b_foreignmedical_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="foreignmedical_phone_no">Phone</label>
                                                        <textarea class="md-input" id="foreignmedical_phone_no" name="foreignmedical_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$foreignmedical->foreignmedical_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_foreignmedical_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_foreignmedical_phone_no" name="b_foreignmedical_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$foreignmedical->b_foreignmedical_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="foreignmedical_email_ad">Email</label>
                                                        <input type="text" id="foreignmedical_email_ad" name="foreignmedical_email_ad" value="{{ $foreignmedical->foreignmedical_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="foreignmedical_web_link">Website<span class="req"></span></label>
                                                <input type="text" id="foreignmedical_web_link" name="foreignmedical_web_link" value="{{$foreignmedical->foreignmedical_web_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="foreignmedical_latitude">Latitude<span class="req"></span></label>
                                                <input type="text" id="foreignmedical_latitude" name="foreignmedical_latitude" value="{{$foreignmedical->foreignmedical_latitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="foreignmedical_longitude">Longitude<span class="req"></span></label>
                                                <input type="text" id="foreignmedical_longitude" name="foreignmedical_longitude" value="{{$foreignmedical->foreignmedical_longitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">General Info</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title" name="total_medicine" value="{{ $foreignmedical->total_medicine}}" required class="md-input">{{ $foreignmedical->total_medicine}}</textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">সাধারণ তথ্য</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title2" name="b_total_medicine" value="{{ $foreignmedical->b_total_medicine}}" required class="md-input">{{ $foreignmedical->b_total_medicine}}</textarea>
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

                                                    <input type="hidden" ng-init="foreignmedical_id='asdfg'" value="{{$foreignmedical_id}}" name="foreignmedical_id" ng-model="foreignmedical_id">
                                                    
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
                                                        @foreach($foreignmedical_notices as $foreignmedical_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $foreignmedical_notice->created_at}}</td>
                                                                <td>{{ $foreignmedical_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('foreignmedical/edit/notice/edit'.'/'.$foreignmedical_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                    <input class="confirm_id3" type="hidden" name="id3" value="{{$foreignmedical_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($foreignmedical_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('foreignmedical/edit/notice/add'.'/'.$foreignmedical_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    <div class="md-card">
                                        <div class="md-card-content">
                                            <div class="uk-overflow-container uk-margin-bottom">
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
                                                        @foreach($foreignmedical_services as $foreignmedical_service)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $foreignmedical_service->service->service_name }}</td>
                                                            <td>{{ $foreignmedical_service->created_at}}</td>
                                                            <td>{{ $foreignmedical_service->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('foreignmedical/edit/service/edit'.'/'.$foreignmedical_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                
                                                                <a class="confirm4">
                                                                    <input class="confirm_id4" type="hidden" name="id4" value="{{ $foreignmedical_service->id }}">
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
                                                <a id="add_Publication_name_button" href="{{ url('foreignmedical/edit/service/add'.'/'.$foreignmedical_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('foreignmedical_description');
    CKEDITOR.replace('add_publication_title');
    CKEDITOR.replace('add_publication_title2');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_foreignmedical_description');
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
            window.location.href = "/foreignmedical/edit/product/delete/"+id1;
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
            window.location.href = "/foreignmedical/edit/doctor/delete/"+id2;
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
            window.location.href = "/foreignmedical/edit/notice/delete/"+id3;
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
            window.location.href = "/foreignmedical/edit/service/delete/"+id4;
        })
    });
</script>
@endsection