@extends('layouts.admin_master')

@section('title', 'Optical Shop')
@section('angular')
    <script src="{{url('app/admin/optical/optical.module.js')}}"></script>
    <script src="{{url('app/admin/optical/optical.product_category_controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Optical Shop</h3>
        @include('partials.flash_message')
        <div class="md-card"  ng-controller="OpticalProductCategoryController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                {!! Form::open(['url' => array('optical/edit/product/add', $optical_id), 'method' => 'post', 'class' => 'uk-form-stacked','files' => true]) !!}
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                <div class="uk-width-9-12">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <label>Medicinal</label>
                                            <div class="parsley-row">
                                                <textarea class="md-input" id="optical_product_description" name="optical_product_description" cols="10" rows="3" data-parsley-trigger="keyup" ></textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-1-2">
                                            <label>ঔষধ-সম্বন্ধীয়</label>
                                            <div class="parsley-row">
                                                <textarea class="md-input" id="b_optical_product_description" name="b_optical_product_description" cols="10" rows="3" data-parsley-trigger="keyup" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class=" uk-width-medium-1-1 ">
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

@section('script')
<script>
    $('#district_id').on('change',function(){
        var district_id = $('#district_id option:selected').val();
        var address = "/hospital/add/"+district_id;
        window.location=address;
    });
</script>

<script type="text/javascript">
    CKEDITOR.replace('optical_product_description');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_optical_product_description');
</script>
@endsection