@extends('layouts.admin_master')

@section('title', 'Blood Bank')

@section('angular')
    <script src="{{url('app/admin/blood_bank/blood_bank.module.js')}}"></script>
    <script src="{{url('app/admin/blood_bank/blood_bank.doctor_controller.js')}}"></script>
@endsection

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Blood Bank</h3>
        @include('partials.flash_message')
        <div class="md-card"  ng-controller="BloodBankDoctorController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('blood-bank/edit/doctor/add', $blood_bank_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-12">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="department_id" name="department_id" ng-model="department_id" ng-change="getDoctor()">
                                                        
                                                    </select>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('department_id')?$errors->first('department_id'):'' }}</p>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="medical_specialist_id" name="medical_specialist_id" ng-model="medical_specialist_id">
                                                        
                                                    </select>
                                                </div>
                                                <p style="color:red;">{{ $errors->has('medical_specialist_id')?$errors->first('medical_specialist_id'):'' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-float-right uk-margin-top">
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



@endsection

@section('script')
    <!-- Angular Code-->
        <script>
        // blank controller
        blood_bank.controller('BloodBankDoctorController', BloodBankDoctorController);

        function BloodBankDoctorController($scope, $http) {


            // var hospital_id = document.getElementsByName('hospital_id')[0].value;
            // console.log(hospital_id);

            
                $http
                .get(window.location.origin+"/medical-department/api/list", {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined, 'Process-Data': false}
                })
                .then(function(response){
                    data = response.data;
                    data2=[];
                    $('#department_id').kendoDropDownList({
                        optionLabel   : "Select Department",
                        dataTextField: "text",
                        dataValueField: "value",
                        dataSource: data,
                        dataType: "jsonp",
                        index: 0
                    });

                    $('#medical_specialist_id').kendoDropDownList({
                        optionLabel   : "Select Doctor",
                        dataTextField: "text",
                        dataValueField: "value",
                        dataSource: data2,
                        dataType: "jsonp",
                        index: 0
                    });

                    // var dropdownlist = $("#service_id").data("kendoDropDownList");
                    //     dropdownlist.value(selected_service);
                });


                $scope.getDoctor = function() 
                {
                    var value = $("#department_id").data("kendoDropDownList").value();

                    $http
                    .get(window.location.origin+"/medical-specialist/api/list/" + value, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        console.log(data);
                        $('#medical_specialist_id').kendoDropDownList({
                            optionLabel   : "Select Doctor",
                            dataTextField: "text",
                            dataValueField: "value",
                            dataSource: data,
                            dataType: "jsonp",
                            index: 0
                        });

                    });  
                }

        }
        </script>
    <!-- Angular Code Ends -->
@endsection