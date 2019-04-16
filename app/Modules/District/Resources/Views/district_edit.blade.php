@extends('layouts.admin_master')

@section('title', 'District')

@section('content')
	<div id="page_content">
	    <div id="page_content_inner">
	        <h3 class="heading_b uk-margin-bottom">Edit District</h3>
	        @include('partials.flash_message')
	        <div class="md-card">
	            <div class="md-card-content">
	                <div class="uk-overflow-container">
	                    {!! Form::open(['url' => array('district/edit', $district->id), 'method' => 'POST', 'class' => 'uk-form-stacked']) !!}
	                        <div class="uk-grid" data-uk-grid-margin>
	                            <div class="uk-width-medium-1-2">
	                                <div class="uk-width-1-1 uk-margin-top">
	                                    <div class="parsley-row">
	                                        <label for="district_name">District Name <span class="req">*</span></label>
	                                        <input type="text" id="district_name" name="district_name" value="{{ $district->district_name}}" required class="md-input" /> 
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="uk-width-medium-1-2">
	                                <div class="uk-width-1-1 uk-margin-top">
	                                    <div class="parsley-row">
	                                        <label for="b_district_name">জেলার নাম <span class="req">*</span></label>
	                                        <input type="text" id="b_district_name" name="b_district_name" value="{{ $district->b_district_name}}" required class="md-input" /> 
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