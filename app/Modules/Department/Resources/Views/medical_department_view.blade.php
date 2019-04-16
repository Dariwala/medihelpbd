@extends('layouts.admin_master')

@section('title', 'Department')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Department Details</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <!-- <div class="parsley-row uk-margin-bottom">
                    <p><strong>Id:</strong></p>
                    <p>{{ $department->id }}</p>
                </div> -->
                <div class="uk-grid" data-uk-grid-margin>
                    
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>Department Name</strong></p>
                                <p>{{ $department->department_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>বিভাগের নাম</strong></p>
                                <p>{{ $department->b_department_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <hr style="margin: 0 0 25px 0">
                    <p>
                        <span class="uk-margin-right"><strong>Created at:</strong></span><span>{{ $department->created_at}}</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="uk-margin-right"><strong>Updated at:</strong></span><span>{{ $department->updated_at}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection