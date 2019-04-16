@extends('layouts.admin_master')

@section('title' , 'Change Password')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Change Password</h3>
            @include('partials.flash_message')
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                        {{ Form::open(array('route' => array('change_password' , $user) , 'method' => 'POST')) }}
                            <div class="row uk-width-medium-1-2">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group parsley-row">
                                        <label class="font-weight-normal">Old Password<span class="required">*</span></label>
                                        <input type="password" id="old_password" name="old_password" value="{{ old('old_password') }}" class="form-control md-input">
                                        @if ($errors->has('old_password'))
                                            <span class="help-block text-danger" style="color:red !important">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                        @endif

                                        @if ($errors->has('error'))
                                            <span class="help-block text-danger" style="color:red !important">
                                                <strong>{{ $errors->first('error') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 uk-margin-top">
                                    <div class="form-group parsley-row">
                                        <label class="font-weight-normal">New Password<span class="required">*</span></label>
                                        <input type="password" id="new_password" name="new_password" class="form-control md-input">
                                        @if ($errors->has('new_password'))
                                            <span class="help-block text-danger" style="color:red !important">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 uk-margin-top">
                                    <div class="form-group parsley-row">
                                        <label class="font-weight-normal">Confirm Password<span class="required">*</span></label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control md-input">
                                        @if ($errors->has('confirm_password'))
                                            <span class="help-block text-danger" style="color:red !important">
                                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                            <div class="uk-float-right uk-margin-top">
                                <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                            </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection