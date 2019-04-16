@extends('layouts.admin_master')

@section('title', 'Images')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Add Image</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => route('notice_store'), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form', 'enctype'=>'multipart/form-data', 'files' => 'true']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="district_id">Select District <span class="req">*</span></label>
                                        <select id="district_id" name="district_id" required class="md-input" data-md-selectize>
                                                <option value="0">Select District Name</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>
                                        <p style="color:red;">{{ $errors -> first('district_id') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="sub_district_id">Select Sub District <span class="req">*</span></label>
                                        <select id="sub_district_id" name="sub_district_id" required class="md-input">
                                            
                                        </select>
                                        <p style="color:red;">{{ $errors -> first('district_id') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="service_provider">Service Provider <span class="req">*</span></label>
                                        <select id="service_provider" name="service_provider" required class="md-input" data-md-selectize>
                                           <option value="24 Hours Pharmacy">24 Hours Pharmacy</option>
                                           <option value="Addiction Rehabilitation Center">Addiction Rehabilitation Center</option>
                                           <option value="Air Ambulance">Air Ambulance</option>
                                           <option value="Ambulance">Ambulance</option>
                                           <option value="Beauty Parlour & Spa">Beauty Parlour & Spa</option>
                                           <option value="Blood Bank">Blood Bank</option>
                                           <option value="Blood Donor">Blood Donor</option>
                                           <option value="Doctors Panel">Doctors Panel</option>
                                           <option value="Eye Bank">Eye Bank</option>
                                           <option value="Foreign Medical Information Center">Foreign Medical Information Center</option>
                                           <option value="Gym">Gym</option>
                                           <option value="Health Care Center">Health Care Center</option>
                                           <option value="Herbal Medicine Center">Herbal Medicine Center</option>
                                           <option value="Homeopathic Medicine Center">Homeopathic Medicine Center</option>
                                           <option value="Optical Shop">Optical Shop</option>
                                           <option value="Pharmacy">Pharmacy</option>
                                           <option value="Physiotherapy & Rehabilitation Center">Physiotherapy & Rehabilitation Center</option>
                                           <option value="Skin Care & Laser Center">Skin Care & Laser Center</option>
                                           <option value="Vaccination Center">Vaccination Center</option>
                                           <option value="Yoga Center">Yoga Center</option>
                                        </select>
                                        <p style="color:red;">{{ $errors -> first('service_provider') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <input type="file" id="thumbnail" name="thumbnail" required class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('thumbnail') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="title">Title (En)<span class="req">*</span></label>
                                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('title') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_title">Title (Bn)<span class="req">*</span></label>
                                        <input type="text" id="b_title" name="b_title" value="{{ old('b_title') }}" class="md-input" /> 
                                        <p style="color:red;">{{ $errors -> first('b_title') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="details">Details (En)</label>
                                        <textarea id="details" id="details" name="details" class="md-input"></textarea>
                                        <p style="color:red;">{{ $errors -> first('details') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-medium-1-2 hidden">
                                <div class="uk-width-1-1 uk-margin-top">
                                    <div class="parsley-row">
                                        <label for="b_details">Details (Bn)</label>
                                        <textarea id="b_details" id="b_details" name="b_details" class="md-input"></textarea>
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
                $('#sub_district_id').append('<option value="0">Select</option>');
                
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