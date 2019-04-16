@extends('layouts.admin_master')

@section('title', 'Doctors Panel')


@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Doctor's Panel</h3>
            @include('partials.flash_message')
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                        {!! Form::open(['url' => array('medical-specialist/edit/appointment/update', $appointment_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">Chamber Name</label>
                                        <div class="parsley-row uk-margin-top">
                                            <input type="text" class="md-input" id="chamber_name" name="chamber_name" value="{{ $appointment->chamber_name }}" required>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">চেম্বার নাম</label>
                                        <div class="parsley-row uk-margin-top">
                                            <input type="text" class="md-input" id="chamber_name_bn" name="chamber_name_bn" value="{{ $appointment->chamber_name_bn }}">
                                        </div>
                                    </div>
                                
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Description</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="details" id="details" class="md-input">{{ $appointment->details }}</textarea>
                                        </div>
                                    </div>
                                
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">বর্ণনা</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="details_bn" id="details_bn" class="md-input">{{ $appointment->details_bn }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <h2>Serial Time Limit</h2>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <label for="uk_tp_1">Select Start time</label>
                                        <input class="md-input" type="text" id="start_time" name="start_time" value="{{ $appointment->start_time }}" data-uk-timepicker>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <label for="uk_tp_1">Select End time</label>
                                        <input class="md-input" type="text" id="end_time" name="end_time" value="{{ $appointment->end_time }}" data-uk-timepicker>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_number">Maximum Serial Limit</label>
                                        <input type="number" class="md-input" id="max_serial_limit" name="max_serial_limit" value="{{ $appointment->max_serial_limit }}">
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Serial Time</label>
                                            <input type="text" class="md-input" id="serial_time_en" name="serial_time_en" value="{{ $appointment->serial_time_en }}">
                                    </div>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">সিরিয়ালের সময়</label>
                                        <input type="text" class="md-input" id="serial_time_bn" name="serial_time_bn" value="{{ $appointment->serial_time_bn }}">
                                    </div>
                                    <!-- <div class="uk-width-medium-2-5">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="md-input"></textarea>
                                    </div> -->
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Maximum Serial Limit Notice</label>
                                            <input type="text" class="md-input" id="max_serial_limit_en" name="max_serial_limit_en" value="{{ $appointment->max_serial_limit_en }}">
                                    </div>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">সর্বোচ্চ সিরিয়াল নোটিশ</label>
                                        <input type="text" class="md-input" id="max_serial_limit_bn" name="max_serial_limit_bn" value="{{ $appointment->max_serial_limit_bn }}">
                                    </div>
                                    <!-- <div class="uk-width-medium-2-5">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="md-input"></textarea>
                                    </div> -->
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Notice</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="notice" id="notice" class="md-input">{{ $appointment->notice }}</textarea>
                                        </div>
                                    </div>
                                
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">নোটিশ</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="notice_bn" id="notice_bn" class="md-input">{{ $appointment->notice_bn }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-grid uk-ma" data-uk-grid-margin>
                                    <div class="uk-width-1-1">
                                        <button style="float: right" type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <!-- <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button> -->
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