@extends('layouts.admin_master')

@section('title', 'Images')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Update Image</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => route('notice_update',$notice->id), 'method' => 'POST', 'class' => 'ul-form-stacked', 'enctype'=>'multipart/form-data', 'files' => true ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            
                            <div class="uk-width-medium-1-2" style = "margin-bottom:20px;">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="district_id">Select District <span class="req">*</span></label>
                                        <select id="district_id" name="district_id" required class="md-input">
                                        <option style="display:none"></option>
                                                <option value="0" disabled>Select District</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" @if( $district->id == $notice->district_id ) selected @endif>{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>
                                        <p style="color:red;">{{ $errors -> first('district_id') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                            </div>
                            
                            <div class="uk-width-medium-1-2" style = "margin-bottom:20px;">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="sub_district_id">Select Sub-District <span class="req">*</span></label>
                                        <select id="sub_district_id" name="sub_district_id" required class="md-input">
                                        <option style="display:none"></option>
                                        <option value="0" disabled>Select Sub-District</option>
                                            @foreach($subdistricts as $subdistrict)
                                                <option value="{{ $subdistrict->id }}" @if( $subdistrict->id == $notice->sub_district_id ) selected @endif>{{ $subdistrict->sub_district_name }}</option>
                                            @endforeach
                                        </select>
                                        <p style="color:red;">{{ $errors -> first('district_id') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-medium-1-2">
                            </div>
                            
                            <div class="uk-width-medium-1-2" style = "margin-bottom:40px;">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="service_provider">Select Service Provider <span class="req">*</span></label>
                                        <select id="service_provider" name="service_provider" required class="md-input">
                                            <option style="display:none"></option>
                                            <option value="0" disabled>Select Service Provider</option>
                                           <option  @if($notice->service_provider == "24 Hours Pharmacy" ) selected @endif value="24 Hours Pharmacy">24 Hours Pharmacy</option>
                                           <option  @if($notice->service_provider == "Addiction Rehabilitation Center" ) selected @endif value="Addiction Rehabilitation Center">Addiction Rehabilitation Center</option>
                                           <option  @if($notice->service_provider == "Air Ambulance" ) selected @endif value="Air Ambulance">Air Ambulance</option>
                                           <option  @if($notice->service_provider == "Ambulance" ) selected @endif value="Ambulance">Ambulance</option>
                                           <option  @if($notice->service_provider == "Beauty Parlour & Spa" ) selected @endif value="Beauty Parlour & Spa">Beauty Parlour & Spa</option>
                                           <option  @if($notice->service_provider == "Blood Bank" ) selected @endif value="Blood Bank">Blood Bank</option>
                                           <option  @if($notice->service_provider == "Blood Donor" ) selected @endif value="Blood Donor">Blood Donor</option>
                                           <option  @if($notice->service_provider == "Doctors Panel" ) selected @endif value="Doctors Panel">Doctors Panel</option>
                                           <option  @if($notice->service_provider == "Eye Bank" ) selected @endif value="Eye Bank">Eye Bank</option>
                                           <option  @if($notice->service_provider == "Foreign Medical Information" ) selected @endif value="Foreign Medical Information Center">Foreign Medical Information Center</option>
                                           <option  @if($notice->service_provider == "Gym" ) selected @endif value="Gym">Gym</option>
                                           <option  @if($notice->service_provider == "Health Care Center" ) selected @endif value="Health Care Center">Health Care Center</option>
                                           <option  @if($notice->service_provider == "Herbal Medicine Center" ) selected @endif value="Herbal Medicine Center">Herbal Medicine Center</option>
                                           <option  @if($notice->service_provider == "Homeopathic Medicine Center" ) selected @endif value="Homeopathic Medicine Center">Homeopathic Medicine Center</option>
                                           <option  @if($notice->service_provider == "Optical Shop" ) selected @endif value="Optical Shop">Optical Shop</option>
                                           <option  @if($notice->service_provider == "Pharmacy" ) selected @endif value="Pharmacy">Pharmacy</option>
                                           <option  @if($notice->service_provider == "Physiotherapy & Rehabilitation Center" ) selected @endif value="Physiotherapy & Rehabilitation Center">Physiotherapy & Rehabilitation Center</option>
                                           <option  @if($notice->service_provider == "Skin Care & Laser Center" ) selected @endif value="Skin Care & Laser Center">Skin Care & Laser Center</option>
                                           <option  @if($notice->service_provider == "Vaccination Center" ) selected @endif value="Vaccination Center">Vaccination Center</option>
                                           <option  @if($notice->service_provider == "Yoga Center" ) selected @endif value="Yoga Center">Yoga Center</option>
                                        </select>
                                        <p style="color:red;">{{ $errors -> first('service_provider') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-medium-1-2">
                            </div>
                            
                            <div class="uk-width-medium-1-2">
                                
                                    <div class="parsley-row">
                                        <img src="{{ asset($notice->thumbnail) }}" style="width:100px; height:80px;"/>
                                        <input type="file" id="thumbnail" name="thumbnail" class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('thumbnail') }}</p>
                                    </div>
                                
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="title">Title (En)<span class="req">*</span></label>
                                        <input type="text" id="title" name="title" value="{{ $notice->title }}" class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('title') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_title">Title (Bn)<span class="req">*</span></label>
                                        <input type="text" id="b_title" name="b_title" value="{{ $notice->b_title }}" class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('b_title') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="details">Details (En)</label>
                                        <textarea id="details" id="details" name="details" class="md-input">{{ $notice->details }}</textarea>
                                        <p style="color:red;">{{ $errors -> first('details') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_details">Details (Bn)</label>
                                        <textarea id="b_details" id="b_details" name="b_details" class="md-input">{{ $notice->b_details }}</textarea>
                                        <p style="color:red;">{{ $errors -> first('b_details') }}</p>
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


@section('script')
<script type="text/javascript">

    $('#district_id').change(function() {
        
        var district_id = $("#district_id option:selected").val();
        
        if(district_id){
            $.get('/notice/ajax-sub-district/'+ district_id, function(data){
            
                $('#sub_district_id').empty();
                
                $('#sub_district_id').append('<option style="display:none"></option>');
                $('#sub_district_id').append('<option value="0" disabled>Select Sub-District</option>');
                
                for(var i = 0; i< data.length; i++){
                    $('#sub_district_id').append( ' <option value="'+data[i].id+'">  ' + data[i].sub_district_name + '   </option> ' );
                }
                
            });
        }

    });

    CKEDITOR.replace('details');
    CKEDITOR.replace('b_details');
    
</script>
@endsection