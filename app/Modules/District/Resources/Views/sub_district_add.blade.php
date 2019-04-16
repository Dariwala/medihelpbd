@extends('layouts.admin_master')

@section('title', "Sub-District")

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Add Sub-District</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => 'district/sub-district/add', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>

                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
		                            <div class="parsley-row uk-margin-top">
                                        <select id="select_demo_4" data-md-selectize name="district_id">
                                            <option value="">Select District</option>
                                            @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p style="color:red;">{{ $errors->has('district_id')?$errors->first('district_id'):'' }}</p>
                                    
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    
                                    
                                </div>
                            </div>

                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row uk-margin-top">
                                        <label for="sub_district_name">Sub-District Name <span class="req">*</span></label>
                                        <input type="text" id="sub_district_name" name="sub_district_name" value="{{ old('sub_district_name') }}" required class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('sub_district_name') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    
                                    <div class="parsley-row uk-margin-top">
                                        <label for="b_sub_district_name">উপজেলার নাম <span class="req">*</span></label>
                                        <input type="text" id="b_sub_district_name" name="b_sub_district_name" value="{{ old('b_sub_district_name') }}" required class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('b_sub_district_name') }}</p>
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