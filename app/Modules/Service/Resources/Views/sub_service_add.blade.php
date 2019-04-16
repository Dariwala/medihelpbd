@extends('layouts.admin_master')

@section('title', 'Service')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Add New Subservice</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => 'service/sub-service/add', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <select id="select_demo_4" name="service_id" data-md-selectize>
                                    <option value="">Select Subservice</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                                <p style="color:red;">{{ $errors->has('service_id')?$errors->first('service_id'):'' }}</p>
                            </div>


                            <div class="uk-width-medium-1-2">
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="sub_service_name">Subservice Name <span class="req">*</span></label>
                                        <input type="text" id="sub_service_name" name="sub_service_name" required class="md-input" /> 
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_sub_service_name">উপসেবা নাম <span class="req">*</span></label>
                                        <input type="text" id="b_sub_service_name" name="b_sub_service_name" required class="md-input" /> 
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