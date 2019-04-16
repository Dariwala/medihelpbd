@extends('layouts.admin_master')

@section('title', "Sub-District")

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Edit Sub-District</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('district/sub-district/edit', $sub_district->id), 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
		                            <select id="select_demo_4" name="district_id" data-md-selectize>
		                                <option value="">Select District</option>
                                        @foreach($districts as $district)
                                        <option value="{{ $district->id}}" {{ $selected_district == $district->id ? 'selected="selected"' : '' }}>{{ $district->district_name }}</option> 
                                        @endforeach
		                            </select>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="sub_district_name">Sub-District Name <span class="req">*</span></label>
                                    <input type="text" id="sub_district_name" name="sub_district_name" value="{{$sub_district->sub_district_name}}" required class="md-input" /> 
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row uk-margin-top">
                                        <label for="b_sub_district_name">উপজেলার নাম <span class="req">*</span></label>
                                        <input type="text" id="b_sub_district_name" name="b_sub_district_name" value="{{$sub_district->b_sub_district_name}}" required class="md-input" /> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-float-right uk-margin-top">
                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection