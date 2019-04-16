@extends('layouts.admin_master')

@section('title', "Sub-District")

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Sub-District Details</h3>
        <div class="md-card">
            <div class="md-card-content">
<!--                 <div class="parsley-row uk-margin-bottom">
                    <p><strong>Id:</strong></p>
                    <p>{{ $sub_district->id }}</p>
                </div> -->
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>District Name</strong></p>
                                <p>{{ $district->district_name}}</p>
                            </div>
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>Sub-District Name</strong></p>
                                <p>{{ $sub_district->sub_district_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-width-1-1 uk-margin-top">
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>জেলার নাম</strong></p>
                                <p>{{ $district->b_district_name}}</p>
                            </div>
                            <div class="parsley-row uk-margin-bottom">
                                <p><strong>উপজেলার নাম</strong></p>
                                <p>{{ $sub_district->b_sub_district_name }}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="">
                    <hr style="margin: 0 0 25px 0">
                    <p>
                        <span class="uk-margin-right"><strong>Created at:</strong></span><span>{{ $sub_district->created_at }}</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="uk-margin-right"><strong>Updated at:</strong></span><span>{{ $sub_district->updated_at }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection