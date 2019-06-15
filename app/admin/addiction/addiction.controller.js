// blank controller
addiction.controller('AddictionController', AddictionController);

function AddictionController($scope, $http) {


    var addiction_id = document.getElementsByName('addiction_id')[0].value;

    $http
        .get(window.location.origin+"/district/api/addiction/get-selected-district/" + addiction_id, {
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
        .get(window.location.origin+"/district/api/addiction/get-selected-subdistrict/" + addiction_id, {
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


        $scope.addiction_phone_no = [];

        $scope.AppendPhone = function() {
            $scope.addiction_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.addiction_phone_no.splice(index, 1);
        }


        $scope.addiction_email_ad = [];

        $scope.AppendEmail = function() {
            $scope.addiction_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.addiction_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/addiction/api/phone/" + addiction_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.addiction_phone_no = response.data;
            $scope.addiction_phone = $scope.addiction_phone_no[0].addiction_phone_no;
            $scope.addiction_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/addiction/api/email/" + addiction_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.addiction_email_ad = response.data;
            $scope.addiction_email = $scope.addiction_email_ad[0].addiction_email_ad;
            $scope.addiction_email_ad.splice(0, 1);
        });












        $http
        .get(window.location.origin+"/service/api/addiction/get-selected-service/" + addiction_id, {
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
        .get(window.location.origin+"/service/api/addiction/get-selected-subservice/" + addiction_id, {
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