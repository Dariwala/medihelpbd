@extends('layouts.admin_master')

@section('title', 'Physiotherapy & Rehabilitation Center')

@section('angular')
    <script src="{{url('app/admin/physiotherapy/physiotherapy.module.js')}}"></script>
    <script src="{{url('app/admin/physiotherapy/physiotherapy.doctor_controller.js')}}"></script>
@endsection


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Physiotherapy & Rehabilitation Center</h3>
        @include('partials.flash_message')
        <div class="md-card"  ng-controller="PhysiotherapyDoctorController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('physiotherapy/edit/doctor/add', $physiotherapy_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-10">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="department_id" name="department_id" ng-model="department_id" ng-change="getDoctor()">
                                                        
                                                    </select>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('department_id')?$errors->first('department_id'):'' }}</p>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="medical_specialist_id" name="medical_specialist_id" ng-model="medical_specialist_id">
                                                        
                                                    </select>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('medical_specialist_id')?$errors->first('medical_specialist_id'):'' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-float-right uk-margin-top">
                                    <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection