@extends('layouts.admin_master')

@section('title', 'Service')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Subservice Details</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <!-- <div class="parsley-row uk-margin-bottom">
                    <p><strong>Id:</strong></p>
                    <p>{{ $sub_service->id}}</p>
                </div> -->
                <div class="uk-grid" data-uk-grid-margin>
                    
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>Service Name</strong></p>
                                <p>{{ $service->service_name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>সেবা নাম</strong></p>
                                <p>{{$service->b_service_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>Sub Service Name</strong></p>
                                <p>{{ $sub_service->sub_service_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>উপসেবা  নাম</strong></p>
                                <p>{{ $sub_service->b_sub_service_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <hr style="margin: 0 0 25px 0">
                    <p>
                        <span class="uk-margin-right"><strong>Created at:</strong></span><span>{{ $sub_service->created_at}}</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="uk-margin-right"><strong>Updated at:</strong></span><span>{{ $sub_service->updated_at}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection