@extends('layouts.admin_master')

@section('title', 'Product Subcategory')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Add New Product Subcategory</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => 'product-category/sub-category/add', 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <select id="select_demo_4" name="product_category_id" data-md-selectize>
                                    <option value="">Select Product Category</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_category_name }}</option>
                                    @endforeach
                                </select>
                                <p style="color:red;">{{ $errors->has('product_category_id')?$errors->first('product_category_id'):'' }}</p>
                            </div>
                            <div class="uk-width-medium-1-2">
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="product_subcategory_name">Product Subcategory Name <span class="req">*</span></label>
                                        <input type="text" id="product_subcategory_name" name="product_subcategory_name" required class="md-input" /> 
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_product_subcategory_name">পণ্য উপশ্রেণী নাম <span class="req">*</span></label>
                                        <input type="text" id="b_product_subcategory_name" name="b_product_subcategory_name" required class="md-input" /> 
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