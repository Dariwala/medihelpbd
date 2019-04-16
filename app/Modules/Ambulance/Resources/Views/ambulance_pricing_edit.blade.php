@extends('layouts.admin_master')

@section('title', 'Ambulance')


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Ambulance</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('ambulance/edit/pricing/edit', $ambulance_pricing_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="pricing_form_section" data-uk-grid-match>
                                    <div class="uk-width-12">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2 uk-margin-top">
                                                <label>Details</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="package_details" name="package_details" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $ambulance_pricing->package_details }} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2 uk-margin-top">
                                                <label>বিস্তারিত</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="b_package_details" name="b_package_details" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $ambulance_pricing->b_package_details }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="uk-float-right uk-margin-top">
                                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
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
         CKEDITOR.replace('package_details');
    </script>
    <script type="text/javascript">
         CKEDITOR.replace('b_package_details');
    </script>

@endsection