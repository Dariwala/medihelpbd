@extends('layouts.admin_master')

@section('title', 'Blood Donor')

@section('angular')
    <script src="{{url('app/admin/blood_donor/blood_donor.module.js')}}"></script>
    <script src="{{url('app/admin/blood_donor/blood_donor.controller.js')}}"></script>
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
                                @if($blood_donor->photo_path == '')
                                <div class="thumbnail"><img alt="blood donor"  src="{{asset('/BloodDonor.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="blood donor" src="{{ url($blood_donor->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{ $blood_donor->blood_donor_name }}</span>
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
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="BloodDonorController">
                                    {!! Form::open(['url' => array('blood-donar/edit/info', $blood_donor->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="blood_donor_id='asdfg'" value="{{$blood_donor_id}}" name="blood_donor_id" ng-model="blood_donor_id">


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
                                                    <label for="blood_donor_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="blood_donor_name" name="blood_donor_name" value="{{ $blood_donor->blood_donor_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_blood_donor_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_blood_donor_name" name="b_blood_donor_name" value="{{ $blood_donor->b_blood_donor_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="blood_donor_subname"> Sub-Title<span class="req"> </span></label>
                                                    <input type="text" id="blood_donor_subname" name="blood_donor_subname" value="{{ $blood_donor->blood_donor_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_blood_donor_subname"> উপ-শিরোনাম<span class="req"> </span></label>
                                                    <input type="text" id="b_blood_donor_subname" name="b_blood_donor_subname" value="{{ $blood_donor->b_blood_donor_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Blood Donor Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="blood_donor_photo" name="blood_donor_photo" class="dropify"/>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="uk-float-right uk-margin-top">
                                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li ng-controller="BloodDonorController">
                                    {!! Form::open(['url' => array('blood-donar/edit/about', $blood_donor->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="blood_donor_description" name="blood_donor_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_donor->blood_donor_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_blood_donor_description" name="b_blood_donor_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_donor->b_blood_donor_description}}</textarea>
                                            </div>
                                        </div>
                                         <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_donor_address">Address</label>
                                                <textarea class="md-input" id="blood_donor_address" name="blood_donor_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_donor->blood_donor_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_blood_donor_address">ঠিকানা</label>
                                                <textarea class="md-input" id="b_blood_donor_address" name="b_blood_donor_address" cols="10" rows="3" data-parsley-trigger="keyup" >{{$blood_donor->b_blood_donor_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="blood_donor_phone_no">Phone</label>
                                                        <textarea class="md-input" id="blood_donor_phone_no" name="blood_donor_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$blood_donor->blood_donor_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_blood_donor_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_blood_donor_phone_no" name="b_blood_donor_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$blood_donor->b_blood_donor_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="blood_donor_email_ad">Email</label>
                                                        <input type="text" id="blood_donor_email_ad" name="blood_donor_email_ad" value="{{ $blood_donor->blood_donor_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_donor_fb_link">Facebook Link</label>
                                                <input type="text" id="blood_donor_fb_link" name="blood_donor_fb_link" value="{{$blood_donor->blood_donor_fb_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <!-- START longitude latitude field -->
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_donor_latitude">Latitude<span class="req"></span></label>
                                                <input type="text" id="blood_donor_latitude" name="blood_donor_latitude" value="{{$blood_donor->blood_donor_latitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="blood_donor_longitude">Longitude<span class="req"></span></label>
                                                <input type="text" id="blood_donor_longitude" name="blood_donor_longitude" value="{{$blood_donor->blood_donor_longitude}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <!-- END   longitude latitude field -->
                                        
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">General Info</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="blood_donor_general_info" name="blood_donor_general_info" value="{{$blood_donor->blood_donor_general_info}}"  class="md-input ">{{$blood_donor->blood_donor_general_info}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">সাধারণ তথ্য</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="b_blood_donor_general_info" name="b_blood_donor_general_info" value="{{$blood_donor->b_blood_donor_general_info}}"  class="md-input ">{{$blood_donor->b_blood_donor_general_info}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" uk-width-medium-1-1 ">
                                            <div class="uk-float-right uk-margin-top">
                                                <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                            </div>
                                    </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="blood_donor_id='asdfg'" value="{{$blood_donor_id}}" name="blood_donor_id" ng-model="blood_donor_id">
                                                    
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
                                                        @foreach($blood_donor_pricings as $blood_donor_pricing)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $blood_donor_pricing->created_at}}</td>
                                                                <td>{{ $blood_donor_pricing->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('blood-donar/edit/pricing/edit'.'/'.$blood_donor_pricing->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm1">
                                                                    <input class="confirm_id1" type="hidden" name="id1" value="{{$blood_donor_pricing->id}}">

                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($blood_donor_pricings)<1)

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('blood-donar/edit/pricing/add'.'/'.$blood_donor_id) }}"  class="md-fab md-fab-accent Publication-create">
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
    CKEDITOR.replace('blood_donor_description');
</script>

<script type="text/javascript">
    CKEDITOR.replace('b_blood_donor_description');
</script>
<script type="text/javascript">
   // CKEDITOR.replace('b_blood_donor_description');
    CKEDITOR.replace('blood_donor_general_info');
    CKEDITOR.replace('b_blood_donor_general_info');
</script>

@endsection