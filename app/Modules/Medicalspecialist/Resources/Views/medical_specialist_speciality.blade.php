@extends('layouts.admin_master')

@section('title', 'Doctors Panel')

@section('content')
<div id="page_content">
        <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Doctor’s Panel</h3>
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                @include('partials.flash_message')
                    <div class="md-card">
                        <!--<div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($medical_specialist->photo_path == '')
                                <div class="thumbnail"><img alt=" specialist"  src="{{asset('/medicalspecialist.jpg')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt=" specialist" src="{{ url($medical_specialist->photo_path) }}">
                                </div>
                                @endif
                            </div>
                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{ $medical_specialist->medical_specialist_name}}</span>
                                </h2>
                            </div>
                        </div>-->
                        <div id="user_content" style="margin-left:20px;margin-right:20px;">
                        <br>


                            {!! Form::open(['url' => array('medical-specialist/edit/info', $medical_specialist->id), 'method' => 'POST', 'files' => true]) !!}
                                <div class="uk-grid" data-uk-grid-margin>

                                <input type="hidden" ng-init="medical_specialist_id='asdfg'" value="{{$medical_specialist_id}}" name="medical_specialist_id" ng-model="medical_specialist_id">
                                <input type="hidden" value="1" name="medical_specialist_speciality_form">
                                
                                    <div class="uk-width-medium-1-2">
                                        <label for="specialty">Speciality</label>
                                        <div class="parsley-row uk-margin-top">
                                            <textarea class="md-input" id="specialty" name="specialty" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->specialty}}</textarea>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="b_specialty">বিশেষত্ব</label>
                                        <div class="parsley-row uk-margin-top">
                                            <textarea class="md-input" id="b_specialty" name="b_specialty" cols="10" rows="3" data-parsley-trigger="keyup" >{{$medical_specialist->b_specialty}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class=" uk-width-medium-1-1 ">
                                        <div class="uk-float-right uk-margin-top uk-margin-bottom">
                                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    CKEDITOR.replace('specialty');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_specialty');
</script>
@endsection