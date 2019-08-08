@extends('layouts.admin_master')

@section('title', 'Foreign Medical Information Center')

@section('angular')
    <script src="{{url('app/admin/foreignmedical/foreignmedical.module.js')}}"></script>
    <script src="{{url('app/admin/foreignmedical/foreignmedical.service_controller.js')}}"></script>
@endsection


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Foreign Medical Information Center</h3>
        @include('partials.flash_message')
        <div class="md-card" ng-controller="ForeignmedicalServiceController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('foreignmedical/edit/service/add', $foreignmedical_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-12">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="service_id" name="service_id">
                                                        <option selected disabled>Select Category</option>
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('service_id')?$errors->first('service_id'):'' }}</p>
                                            </div>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <label>Service</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="foreignmedical_service_description" name="foreignmedical_service_description" cols="10" rows="3" data-parsley-trigger="keyup" ></textarea>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('foreignmedical_service_description')?$errors->first('foreignmedical_service_description'):'' }}</p>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <label>সেবা</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="b_foreignmedical_service_description" name="b_foreignmedical_service_description" cols="10" rows="3" data-parsley-trigger="keyup" ></textarea>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('b_foreignmedical_service_description')?$errors->first('b_foreignmedical_service_description'):'' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-float-right">
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

@section('script')

<script type="text/javascript">
    CKEDITOR.replace('foreignmedical_service_description');
</script>

<script type="text/javascript">
    CKEDITOR.replace('b_foreignmedical_service_description');
</script>

@endsection