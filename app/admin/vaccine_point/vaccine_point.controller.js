// blank controller
vaccine_point.controller('VaccinePointController', VaccinePointController);

function VaccinePointController($scope, $http) {


    var vaccine_point_id = document.getElementsByName('vaccine_point_id')[0].value;

    $http
        .get(window.location.origin+"/district/api/vaccine-point/get-selected-district/" + vaccine_point_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            selected_district = response.data.selected_district;
            $('#district_id').kendoDropDownList({
                optionLabel   : "Select District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#district_id").data("kendoDropDownList");
                dropdownlist.value(selected_district);

        });


        $http
        .get(window.location.origin+"/district/api/vaccine-point/get-selected-subdistrict/" + vaccine_point_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.subdistricts;
            selected_subdistrict = response.data.selected_subdistrict;
            $('#subdistrict_id').kendoDropDownList({
                optionLabel   : "Select Sub-District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#subdistrict_id").data("kendoDropDownList");
                dropdownlist.value(selected_subdistrict);

        });


        $scope.getSubdistrict = function() 
        {
            var value = $("#district_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/district/sub-district/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                $('#subdistrict_id').kendoDropDownList({
                    optionLabel   : "Select Sub-District",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };


        $scope.vaccine_point_phone_no = [];

        $scope.AppendPhone = function() {
            $scope.vaccine_point_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.vaccine_point_phone_no.splice(index, 1);
        }


        $scope.vaccine_point_email_ad = [];

        $scope.AppendEmail = function() {
            $scope.vaccine_point_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.vaccine_point_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/vaccine-point/api/phone/" + vaccine_point_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.vaccine_point_phone_no = response.data;
            $scope.vaccine_point_phone = $scope.vaccine_point_phone_no[0].vaccine_point_phone_no;
            $scope.vaccine_point_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/vaccine-point/api/email/" + vaccine_point_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.vaccine_point_email_ad = response.data;
            $scope.vaccine_point_email    = $scope.vaccine_point_email_ad[0].vaccine_point_email_ad;
            $scope.vaccine_point_email_ad.splice(0, 1);
        });












        $http
        .get(window.location.origin+"/service/api/vaccine-point/get-selected-service/" + vaccine_point_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.services;
            selected_district = response.data.selected_service;
            console.log("ok");
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#service_id").data("kendoDropDownList");
                dropdownlist.value(selected_service);

        });


        $http
        .get(window.location.origin+"/service/api/vaccine-point/get-selected-subservice/" + vaccine_point_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.subservices;
            selected_subdistrict = response.data.selected_subservice;
            $('#subservice_id').kendoDropDownList({
                optionLabel   : "Select Sub-Service",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#subservice_id").data("kendoDropDownList");
                dropdownlist.value(selected_subservice);

        });

        
}