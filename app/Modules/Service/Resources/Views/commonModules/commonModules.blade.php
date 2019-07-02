@extends('layouts.admin_master')

@section('title', 'Modules')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Modules</h3>
        
        @if(isset($message))<h4 style="color: @if($message == "Data Updated Successfully.") green; @else red; @endif ">{{ $message }}</h4>@endif
        
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => 'service/modules', 'method' => 'POST', 'class' => 'ul-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            
                            <!-- About -->
                            <div class="uk-width-medium-1-2">
                                <label for="add_course_description">About</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="vision_description" name="vision_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->vision) ? $data->vision : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label for="add_course_description">সম্বন্ধে</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_vision_description" name="b_vision_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_vision) ? $data->b_vision : '' }}</textarea>
                                </div>
                            </div>
                            <!-- About Ends -->
                            
                            <!-- Appointment -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">Appointment</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="appointment_description" name="appointment_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->appointment) ? $data->appointment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">সাক্ষাৎ</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_appointment_description" name="b_appointment_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_appointment) ? $data->b_appointment : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Appointment Ends -->

                            <!-- Contact -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">Contact</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="contact_description" name="contact_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->contact) ? $data->contact : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">যোগাযোগ</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_contact_description" name="b_contact_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_contact) ? $data->b_contact : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Contact Ends -->
                            
                            <!-- Service Entry -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">Enlist Your Service</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="serviceEntry_description" name="serviceEntry_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->serviceEntry) ? $data->serviceEntry : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">আপনার সেবা যুক্ত করুন</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_serviceEntry_description" name="b_serviceEntry_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_serviceEntry) ? $data->b_serviceEntry : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Service Entry Ends -->
                            
                            <!-- FAQ -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">FAQs</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="faq_description" name="faq_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->faq) ? $data->faq : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">সাধারণ জিজ্ঞাসা</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_faq_description" name="b_faq_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_faq) ? $data->b_faq : '' }}</textarea>
                                </div>
                            </div>
                            <!-- FAQ Ends -->
                            
                            <!-- Service List -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">List of Services</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="serviceList_description" name="serviceList_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->serviceList) ? $data->serviceList : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">সেবাসমূহের তালিকা</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_serviceList_description" name="b_serviceList_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_serviceList) ? $data->b_serviceList : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Service List Ends -->
                            
                            <!-- Latest News List -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">Advertisement</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="latestNews_description" name="latestNews_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->latest_news) ? $data->latest_news : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">বিজ্ঞাপন</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_latestNews_description" name="b_latestNews_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_latest_news) ? $data->b_latest_news : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Latest News List Ends -->
                            
                            <!-- Notice List -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">Notice</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="notice_description" name="notice_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->notice) ? $data->notice : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">বিজ্ঞপ্তি</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_notice_description" name="b_notice_description" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_notice) ? $data->b_notice : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Notice Ends -->

                            <!-- Report Delivery List -->
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">Report Delivery</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="report_delivery" name="report_delivery" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->report_delivery) ? $data->report_delivery : '' }}</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <label for="add_course_description">রিপোর্ট ডেলিভারি</label>
                                <div class="parsley-row uk-margin-top">
                                    <textarea class="md-input" id="b_report_delivery" name="b_report_delivery" cols="10" rows="3" data-parsley-trigger="keyup" >{{ isset($data->b_report_delivery) ? $data->b_report_delivery : '' }}</textarea>
                                </div>
                            </div>
                            <!-- Report Delivery Ends -->
                            
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

@section('script')

<script type="text/javascript">
    CKEDITOR.replace('vision_description');
    CKEDITOR.replace('b_vision_description');
    
    CKEDITOR.replace('contact_description');
    CKEDITOR.replace('b_contact_description');
    
    CKEDITOR.replace('appointment_description');
    CKEDITOR.replace('b_appointment_description');
    
    CKEDITOR.replace('serviceEntry_description');
    CKEDITOR.replace('b_serviceEntry_description');
    
    CKEDITOR.replace('faq_description');
    CKEDITOR.replace('b_faq_description');
    
    CKEDITOR.replace('serviceList_description');
    CKEDITOR.replace('b_serviceList_description');
    
    CKEDITOR.replace('latestNews_description');
    CKEDITOR.replace('b_latestNews_description');
    
    CKEDITOR.replace('notice_description');
    CKEDITOR.replace('b_notice_description');

    CKEDITOR.replace('report_delivery');
    CKEDITOR.replace('b_report_delivery');
</script>

@endsection