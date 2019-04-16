@extends('layouts.admin_master')

@section('title', 'Service')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Edit Service</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('service/edit', $service->id), 'method' => 'POST', 'class' => 'ul-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="service_name">Service Name <span class="req">*</span></label>
                                        <input type="text" id="service_name" name="service_name" value="{{ $service->service_name}}" required class="md-input" /> 
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_service_name">সেবার নাম<span class="req">*</span></label>
                                        <input type="text" id="b_service_name" name="b_service_name" value="{{ $service->b_service_name}}" required class="md-input" /> 
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