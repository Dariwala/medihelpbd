@extends('layouts.admin_master')

@section('title', 'Product Category')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Add New Product Category</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => 'product-category/add', 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="product_category_name">Product Category Name <span class="req">*</span></label>
                                        <input type="text" id="product_category_name" name="product_category_name" value="{{ old('product_category_name') }}" required class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('product_category_name') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_product_category_name">পণ্য শ্রেণী নাম <span class="req">*</span></label>
                                        <input type="text" id="b_product_category_name" name="b_product_category_name" value="{{ old('b_product_category_name') }}" required class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('b_product_category_name') }}</p>
                                    </div>
                                </div>
                            </div>
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