@extends('layouts.admin_master')

@section('title', 'Blood Bank')


@section('angular')
    <script src="{{url('app/admin/blood_bank/blood_bank.module.js')}}"></script>
@endsection


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Blood Bank</h3>
        @include('partials.flash_message')
        <div class="md-card"  ng-controller="BloodBankDoctorEditController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('blood-bank/edit/doctor/edit', $blood_bank_doctor_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>

                            <input type="hidden" ng-init="blood_bank_doctor_id='asdfg'" value="{{$blood_bank_doctor_id}}" name="blood_bank_doctor_id" ng-model="blood_bank_doctor_id">

                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-10">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="department_id" name="department_id" ng-model="department_id" ng-change="getDoctor()" required="">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="medical_specialist_id" name="medical_specialist_id" ng-model="medical_specialist_id" required>
                                                        
                                                    </select>
                                                </div>
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
  <!-- Angular Code  -->
    <script> 
    // blank controller
        blood_bank.controller('BloodBankDoctorEditController', BloodBankDoctorEditController);

        function BloodBankDoctorEditController($scope, $http) {

            var blood_bank_doctor_id = document.getElementsByName('blood_bank_doctor_id')[0].value;

            console.log("hello");

            $http
                .get(window.location.origin+"/medical-department/api/blood-bank/get-selected-department/" + blood_bank_doctor_id, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined, 'Process-Data': false}
                })
                .then(function(response){
                    data = response.data.departments;
                    selected_department = response.data.selected_department;

                    $('#department_id').kendoDropDownList({
                        optionLabel   : "Select Department",
                        dataTextField: "text",
                        dataValueField: "value",
                        dataSource: data,
                        dataType: "jsonp",
                        index: 0
                    });

                    var dropdownlist = $("#department_id").data("kendoDropDownList");
                        dropdownlist.value(selected_department);

                });


                $http
                .get(window.location.origin+"/medical-specialist/api/blood-bank/get-selected-medical-specialist/" + blood_bank_doctor_id, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined, 'Process-Data': false}
                })
                .then(function(response){
                    selected_Medical_specialist = response.data.selected_Medical_specialist;
                    data = response.data.medical_specialists;
                    $('#medical_specialist_id').kendoDropDownList({
                        optionLabel   : "Select Doctor",
                        dataTextField: "text",
                        dataValueField: "value",
                        dataSource: data,
                        dataType: "jsonp",
                        index: 0
                    });

                    var dropdownlist = $("#medical_specialist_id").data("kendoDropDownList");
                        dropdownlist.value(selected_Medical_specialist);

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
@endsection