@extends('layouts.admin_master')

@section('title', 'Doctors Panel')


@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Doctor’s Appointment Summary</h3>
            @include('partials.flash_message')
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                        {!! Form::open(['url' => array('medical-specialist/edit/appointment/notice/store', $medical_specialist_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="notice_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-12">
                                        <div class="uk-grid">
                                            
                                            <div class="uk-width-1-2 uk-margin-top">
                                                <label>Summary</label>
                                                <div class="parsley-row">
                                                    <textarea class="ckeditor" name="notice" id="notice" class="md-input"></textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2 uk-margin-top">
                                                <label>সারাংশ</label>
                                                <div class="parsley-row">
                                                    <textarea class="ckeditor" name="notice_bn" id="notice_bn" class="md-input"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-float-right uk-margin-top">
                                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                        </div>
                                    </div>
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

@section('script')
    <script src="{{ asset('assets/js/pages/components_notifications.min.js') }} "></script>
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }} "></script>

@endsection