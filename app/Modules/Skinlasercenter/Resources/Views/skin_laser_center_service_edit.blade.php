@extends('layouts.admin_master')

@section('title', 'Skin Care & Laser Center')

@section('angular')
    <script src="{{url('app/admin/skin_laser_center/skin_laser_center.module.js')}}"></script>
    <script src="{{url('app/admin/skin_laser_center/skin_laser_center.service_edit_controller.js')}}"></script>
@endsection


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Skin Care & Laser Center</h3>
        @include('partials.flash_message')
        <div class="md-card"  ng-controller="SkinLaserCenterServiceEditController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('skin-laser-center/edit/service/edit', $skin_laser_center_service_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>

                        	<input type="hidden" ng-init="skin_laser_center_service_id='asdfg'" value="{{$skin_laser_center_service_id}}" name="skin_laser_center_service_id" ng-model="skin_laser_center_service_id">

                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-12">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                @foreach($service_name as $name)
                                                <div class="uk-margin-top">
                                                    <span class="uk-margin-right"><?php echo $name->service_name; ?></span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <label>Service</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="skin_laser_center_service_description" name="skin_laser_center_service_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $skin_laser_center_service->skin_laser_center_service_description }} </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <label>সেবা</label>
                                                <div class="parsley-row">
                                                    <textarea class="md-input" id="b_skin_laser_center_service_description" name="b_skin_laser_center_service_description" cols="10" rows="3" data-parsley-trigger="keyup" > {{ $skin_laser_center_service->b_skin_laser_center_service_description }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-float-right uk-margin-top">
                                        <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
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
    CKEDITOR.replace('skin_laser_center_service_description');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_skin_laser_center_service_description');
</script>
@endsection