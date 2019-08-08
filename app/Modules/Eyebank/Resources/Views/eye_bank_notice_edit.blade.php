@extends('layouts.admin_master')

@section('title', 'Eye Bank')


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Eye Bank</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('eye-bank/edit/notice/edit', $eye_bank_notice_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="notice_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-12">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2 uk-margin-top">
                                                <label>Article</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="eye_bank_notice_description" name="eye_bank_notice_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $eye_bank_notice->eye_bank_notice_description }} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2 uk-margin-top">
                                                <label>প্রবন্ধ</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="b_eye_bank_notice_description" name="b_eye_bank_notice_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $eye_bank_notice->b_eye_bank_notice_description }} </textarea>
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

<script type="text/javascript">
    CKEDITOR.replace('eye_bank_notice_description');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_eye_bank_notice_description');
</script>

@endsection