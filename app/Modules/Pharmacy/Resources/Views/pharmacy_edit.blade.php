@extends('layouts.admin_master')

@section('title', '24 Hours Pharmacy')

@section('angular')
    <script src="{{url('app/admin/pharmacy/pharmacy.module.js')}}"></script>
    <script src="{{url('app/admin/pharmacy/pharmacy.controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content" ng-controller="PharmacyController">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar">
                                @if($pharmacy->photo_path == '')
                                <div class="thumbnail"><img alt="pharmacy"  src="{{asset('/pharmacy.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="pharmacy" src="{{ url($pharmacy->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$pharmacy->pharmacy_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            @include('partials.flash_message')
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align:left" href="#">Info</a>
                                </li>

                                <li class="">
                                    <a style="text-align:left" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align:left" href="#">Article</a>
                                </li>
                                <li>
                                    <a style="text-align:left" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align:left" href="#">Medicinal</a>
                                </li>
                                <li>
                                    <a style="text-align:left" href="#">Service</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="PharmacyController">
                                    {!! Form::open(['url' => array('pharmacy/edit/info', $pharmacy->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="pharmacy_id='asdfg'" value="{{$pharmacy_id}}" name="pharmacy_id" ng-model="pharmacy_id">


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
                                                    <label for="pharmacy_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="pharmacy_name" name="pharmacy_name" value="{{ $pharmacy->pharmacy_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_pharmacy_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_pharmacy_name" name="b_pharmacy_name" value="{{ $pharmacy->b_pharmacy_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="pharmacy_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="pharmacy_subname" name="pharmacy_subname" value="{{ $pharmacy->pharmacy_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_pharmacy_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_pharmacy_subname" name="b_pharmacy_subname" value="{{ $pharmacy->b_pharmacy_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">24 Hours Pharmacy Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="pharmacy_photo" name="pharmacy_photo" class="dropify"/>
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
                                <li ng-controller="PharmacyController">
                                    {!! Form::open(['url' => array('pharmacy/edit/about', $pharmacy->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="pharmacy_description" name="pharmacy_description" value="{{ $pharmacy->pharmacy_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $pharmacy->pharmacy_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_pharmacy_description" name="b_pharmacy_description" value="{{ $pharmacy->b_pharmacy_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $pharmacy->b_pharmacy_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="pharmacy_address">Address</label>
                                                <textarea class="md-input" id="pharmacy_address" name="pharmacy_address" value="{{ $pharmacy->pharmacy_address}}" cols="10" rows="2" data-parsley-trigger="keyup" >{{ $pharmacy->pharmacy_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_pharmacy_address">ঠিকানা</label>
                                                <textarea class="md-input" name="b_pharmacy_address"  cols="10" rows="2"  value="{{ $pharmacy->b_pharmacy_address}}" >{{ $pharmacy->b_pharmacy_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-8-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="pharmacy_phone_no">Phone<span class="req">*</span></label>
                                                        <textarea class="md-input" id="pharmacy_phone_no" name="pharmacy_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$pharmacy->pharmacy_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-8-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_pharmacy_phone_no">ফোন <span class="req">*</span></label>
                                                        <textarea class="md-input" type="text" id="b_pharmacy_phone_no" name="b_pharmacy_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$pharmacy->b_pharmacy_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-8-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="pharmacy_email_ad">Email<span class="req">*</span></label>
                                                        <input type="text" id="pharmacy_email_ad" name="pharmacy_email_ad" value="{{ $pharmacy->pharmacy_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="pharmacy_web_link">Website<span class="req"></span></label>
                                                <input type="text" id="pharmacy_web_link" name="pharmacy_web_link" value="{{$pharmacy->pharmacy_web_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="pharmacy_latitude">Latitude<span class="req"></span></label>
                                                <input type="text" id="pharmacy_latitude" name="pharmacy_latitude" value="{{$pharmacy->pharmacy_latitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="pharmacy_longitude">Longitude<span class="req"></span></label>
                                                <input type="text" id="pharmacy_longitude" name="pharmacy_longitude" value="{{$pharmacy->pharmacy_longitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">General Info<span class="req">*</span></label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title" name="total_medicine" value="{{ $pharmacy->total_medicine}}" required class="md-input">{{ $pharmacy->total_medicine}}</textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">সাধারণ তথ্য<span class="req">*</span></label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title2" name="b_total_medicine" value="{{ $pharmacy->b_total_medicine}}" required class="md-input">{{ $pharmacy->b_total_medicine}}</textarea>
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

                                                    <input type="hidden" ng-init="pharmacy_id='asdfg'" value="{{$pharmacy_id}}" name="pharmacy_id" ng-model="pharmacy_id">
                                                    
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
                                                        @foreach($pharmacy_notices as $pharmacy_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $pharmacy_notice->created_at}}</td>
                                                                <td>{{ $pharmacy_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('pharmacy/edit/notice/edit'.'/'.$pharmacy_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                    <input class="confirm_id3" type="hidden" name="id3" value="{{$pharmacy_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($pharmacy_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('pharmacy/edit/notice/add'.'/'.$pharmacy_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('pharmacy/edit/doctor', $pharmacy->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="pharmacy_id='asdfg'" value="{{$pharmacy_id}}" name="pharmacy_id" ng-model="pharmacy_id">
                                                    
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
                                                        @foreach($pharmacy_doctors as $pharmacy_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $pharmacy_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $pharmacy_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $pharmacy_doctor->created_at}}</td>
                                                                <td>{{ $pharmacy_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('pharmacy/edit/doctor/edit'.'/'.$pharmacy_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                    <input class="confirm_id2" type="hidden" name="id2" value="{{$pharmacy_doctor->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('pharmacy/edit/doctor/add'.'/'.$pharmacy_id) }}"  class="md-fab md-fab-accent Publication-create">
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
                                                        @foreach($pharmacy_products as $pharmacy_product)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $pharmacy_product->created_at}}</td>
                                                            <td>{{ $pharmacy_product->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('pharmacy/edit/product/edit'.'/'.$pharmacy_product->id.'/'.$pharmacy_id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                <a class="confirm1">
                                                                <input class="confirm_id1" type="hidden" name="id1" value="{{$pharmacy_product->id}}">
                                                                <i class="md-icon material-icons">&#xE872;</i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Add Publication plus sign -->
                                            @if(count($pharmacy_products)< 1)
                                            
                                            <div class="md-fab-wrapper Publication-create">
                                                <a id="add_Publication_name_button" href="{{ url('pharmacy/edit/product/add'.'/'.$pharmacy_id) }}"  class="md-fab md-fab-accent Publication-create">
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
                                                        @foreach($pharmacy_services as $pharmacy_service)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $pharmacy_service->service->service_name }}</td>
                                                            <td>{{ $pharmacy_service->created_at}}</td>
                                                            <td>{{ $pharmacy_service->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('pharmacy/edit/service/edit'.'/'.$pharmacy_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                
                                                                <a class="confirm4">
                                                                    <input class="confirm_id4" type="hidden" name="id4" value="{{ $pharmacy_service->id }}">
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
                                                <a id="add_Publication_name_button" href="{{ url('pharmacy/edit/service/add'.'/'.$pharmacy_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('pharmacy_description');
    CKEDITOR.replace('add_publication_title');
    CKEDITOR.replace('add_publication_title2');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_pharmacy_description');
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
            window.location.href = "/pharmacy/edit/product/delete/"+id1;
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
            window.location.href = "/pharmacy/edit/doctor/delete/"+id2;
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
            window.location.href = "/pharmacy/edit/notice/delete/"+id3;
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
            window.location.href = "/pharmacy/edit/service/delete/"+id4;
        })
    });
</script>
@endsection