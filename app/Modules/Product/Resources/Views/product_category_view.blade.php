@extends('layouts.admin_master')

@section('title', 'Product Category')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Product Category Details</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <!-- <div class="parsley-row uk-margin-bottom">
                    <p><strong>Id:</strong></p>
                    <p>{{$product->id}}</p>
                </div> -->
                <div class="uk-grid" data-uk-grid-margin>
                    
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>Category Name</strong></p>
                                <p>{{$product->product_category_name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>শ্রেণী নাম</strong></p>
                                <p>{{$product->b_product_category_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <hr style="margin: 0 0 25px 0">
                    <p>
                        <span class="uk-margin-right"><strong>Created at:</strong></span><span>{{$product->created_at}}</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="uk-margin-right"><strong>Updated at:</strong></span><span>{{$product->updated_at}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection