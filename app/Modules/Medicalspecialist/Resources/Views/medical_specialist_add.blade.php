@extends('layouts.admin_master')

@section('title', 'Doctors Panel')


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Doctors Panel</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => 'medical-specialist/add', 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            
                            @if($district_id == 0 )
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <select id="district_id" name="district_id" data-md-selectize>
                                        <option value="">Select District</option>
                                        @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p style="color:red;">{{ $errors->has('district_id')?$errors->first('district_id'):'' }}</p>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <select id="select_demo_4" ng-model="name" name="subdistrict_id" data-md-selectize>
                                        <option value="">Select Sub-District</option>
                                    </select>
                                </div>
                                <p style="color:red;">{{ $errors->has('subdistrict_id')?$errors->first('subdistrict_id'):'' }}</p>
                            </div>
                            @else
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <select id="district_id" name="district_id" data-md-selectize>
                                        <option value="">Select District</option>
                                        @foreach($districts as $district)
                                        <option value="{{ $district->id}}" {{ $district_id == $district->id ? 'selected="selected"' : '' }}>{{ $district->district_name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <p style="color:red;">{{ $errors->has('district_id')?$errors->first('district_id'):'' }}</p>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <select id="select_demo_4" ng-model="name" name="subdistrict_id" data-md-selectize>
                                        <option value="">Select Sub-District</option>
                                        @foreach($subdistricts as $subdistrict)
                                        <option value="{{ $subdistrict->id }}">{{ $subdistrict->sub_district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p style="color:red;">{{ $errors->has('subdistrict_id')?$errors->first('subdistrict_id'):'' }}</p>
                            </div>
                            @endif

                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <div class="parsley-row">
                                    <label for="medical_specialist_name">Name<span class="req">*</span></label>
                                    <input type="text" id="medical_specialist_name" name="medical_specialist_name" required class="md-input" /> 
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2 uk-margin-top">
                                <div class="parsley-row">
                                    <label for="b_medical_specialist_name">নাম<span class="req">*</span></label>
                                    <input type="text" id="b_medical_specialist_name" name="b_medical_specialist_name" required class="md-input" /> 
                                </div>
                            </div>


                        </div>
                        <div class="uk-float-right uk-margin-top">
                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
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
        var address = "/medical-specialist/add/"+district_id;
        window.location=address;
    });
</script>
@endsection