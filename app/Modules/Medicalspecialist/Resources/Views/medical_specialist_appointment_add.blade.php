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
                        {!! Form::open(['url' => array('medical-specialist/edit/appointment/store', $medical_specialist_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}

                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">Chamber Name</label>
                                        <div class="parsley-row uk-margin-top">
                                            <input type="text" class="md-input" id="chamber_name" name="chamber_name" required>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">চেম্বার নাম</label>
                                        <div class="parsley-row uk-margin-top">
                                            <input type="text" class="md-input" id="chamber_name_bn" name="chamber_name_bn">
                                        </div>
                                    </div>
                                
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Description</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="details" id="details" class="md-input"></textarea>
                                        </div>
                                    </div>
                                
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">বর্ণনা</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="details_bn" id="details_bn" class="md-input"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!--<h2>Serial Time Limit</h2>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <label for="uk_tp_1">Select Start time</label>
                                        <input class="md-input" type="text" id="start_time" name="start_time" data-uk-timepicker>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <label for="uk_tp_1">Select End time</label>
                                        <input class="md-input" type="text" id="end_time" name="end_time" data-uk-timepicker>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_number">Maximum Serial Limit</label>
                                        <input type="number" class="md-input" id="max_serial_limit" name="max_serial_limit">
                                    </div>
                                </div>
                                
                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Serial Time</label>
                                            <input type="text" class="md-input" id="serial_time_en" name="serial_time_en" >
                                    </div>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">সিরিয়ালের সময়</label>
                                        <input type="text" class="md-input" id="serial_time_bn" name="serial_time_bn" >
                                    </div>
                                     <div class="uk-width-medium-2-5">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="md-input"></textarea>
                                    </div> 
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Maximum Serial Limit Notice</label>
                                            <input type="text" class="md-input" id="max_serial_limit_en" name="max_serial_limit_en">
                                    </div>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">সর্বোচ্চ সিরিয়াল নোটিশ</label>
                                        <input type="text" class="md-input" id="max_serial_limit_bn" name="max_serial_limit_bn">
                                    </div>
                                     <div class="uk-width-medium-2-5">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="md-input"></textarea>
                                    </div>
                                </div>-->

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="uk_tp_1">Serial Must be given Before days</label>
                                        <input class="md-input" type="number" id="serial_given_before_days_en" name="serial_given_before_days_en">
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="uk_tp_1">সিরিয়াল যতদিন আগে দিতে হবে</label>
                                        <input class="md-input" type="text" id="serial_given_before_days_bn" name="serial_given_before_days_bn">
                                    </div>
                                </div>

                                <h2>Morning Serial Details</h2>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">Maximum Serial Limit Morning New</label>
                                        <input type="text" class="md-input" id="max_serial_limit_morning_new_en" name="max_serial_limit_morning_new_en">
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">সর্বোচ্চ সিরিয়াল নোটিশ সকাল নতুন</label>
                                        <input type="text" class="md-input" id="max_serial_limit_morning_new_bn" name="max_serial_limit_morning_new_bn">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">Maximum Serial Limit Morning report</label>
                                        <input type="text" class="md-input" id="max_serial_limit_morning_report_en" name="max_serial_limit_morning_report_en">
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">সর্বোচ্চ সিরিয়াল নোটিশ সকাল রিপোর্ট</label>
                                        <input type="text" class="md-input" id="max_serial_limit_morning_report_bn" name="max_serial_limit_morning_report_bn">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Serial Time Morning</label>
                                            <input type="text" class="md-input" id="serial_time_morning_en" name="serial_time_morning_en">
                                    </div>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">সিরিয়ালের সময় সকাল</label>
                                        <input type="text" class="md-input" id="serial_time_morning_bn" name="serial_time_morning_bn">
                                    </div>
                                    <!-- <div class="uk-width-medium-2-5">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="md-input"></textarea>
                                    </div> -->
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="uk_tp_1">Select Start time Morning</label>
                                        <input class="md-input" type="text" id="start_time_morning" name="start_time_morning" data-uk-timepicker>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="uk_tp_1">Select End time Morning</label>
                                        <input class="md-input" type="text" id="end_time_morning" name="end_time_morning" data-uk-timepicker>
                                    </div>
                                </div>

                                <h2>Evening Serial Details</h2>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">Maximum Serial Limit Evening New</label>
                                        <input type="text" class="md-input" id="max_serial_limit_evening_new_en" name="max_serial_limit_evening_new_en">
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">সর্বোচ্চ সিরিয়াল নোটিশ বিকাল নতুন</label>
                                        <input type="text" class="md-input" id="max_serial_limit_evening_new_bn" name="max_serial_limit_evening_new_bn">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">Maximum Serial Limit Evening report</label>
                                        <input type="text" class="md-input" id="max_serial_limit_evening_report_en" name="max_serial_limit_evening_report_en">
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="invoice_number">সর্বোচ্চ সিরিয়াল নোটিশ বিকাল রিপোর্ট</label>
                                        <input type="text" class="md-input" id="max_serial_limit_evening_report_bn" name="max_serial_limit_evening_report_bn">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Serial Time Evening</label>
                                            <input type="text" class="md-input" id="serial_time_evening_en" name="serial_time_evening_en">
                                    </div>

                                    <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">সিরিয়ালের সময় বিকাল</label>
                                        <input type="text" class="md-input" id="serial_time_evening_bn" name="serial_time_evening_bn">
                                    </div>
                                    <!-- <div class="uk-width-medium-2-5">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="md-input"></textarea>
                                    </div> -->
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="uk_tp_1">Select Start time Evening</label>
                                        <input class="md-input" type="text" id="start_time_evening" name="start_time_evening" data-uk-timepicker>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="uk_tp_1">Select End time Evening</label>
                                        <input class="md-input" type="text" id="end_time_evening" name="end_time_evening" data-uk-timepicker>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">Notice</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="notice" id="notice" class="md-input"></textarea>
                                        </div>
                                    </div>
                                
                                   <div class="uk-width-medium-1-2 uk-margin-top">
                                        <label for="invoice_number">নোটিশ</label>
                                        <div class="parsley-row uk-margin-top">
                                             <textarea class="ckeditor" name="notice_bn" id="notice_bn" class="md-input"></textarea>
                                        </div>
                                    </div>
                                </div>

                                
                                    <div class="uk-width-1-1 uk-margin-top">
                                        <button style="float: right;background: #FD0100;color: #fff;" type="submit" class="md-btn md-btn-primary">Submit</button>
                                       <!--  <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button> -->
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