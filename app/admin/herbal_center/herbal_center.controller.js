// blank controller
herbal_center.controller('HerbalCenterController', HerbalCenterController);

function HerbalCenterController($scope, $http) {


    var herbal_center_id = document.getElementsByName('herbal_center_id')[0].value;

    $http
        .get(window.location.origin+"/district/api/herbal-center/get-selected-district/" + herbal_center_id, {
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
        .get(window.location.origin+"/district/api/herbal-center/get-selected-subdistrict/" + herbal_center_id, {
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


        $scope.herbal_center_phone_no = [];

        $scope.AppendPhone = function() {
            $scope.herbal_center_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.herbal_center_phone_no.splice(index, 1);
        }


        $scope.herbal_center_email_ad = [];

        $scope.AppendEmail = function() {
            $scope.herbal_center_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.herbal_center_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/herbal-center/api/phone/" + herbal_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.herbal_center_phone_no = response.data;
            $scope.herbal_center_phone = $scope.herbal_center_phone_no[0].herbal_center_phone_no;
            $scope.herbal_center_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/herbal-center/api/email/" + herbal_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.herbal_center_email_ad = response.data;
            $scope.herbal_center_email = $scope.herbal_center_email_ad[0].herbal_center_email_ad;
            $scope.herbal_center_email_ad.splice(0, 1);
        });












        $http
        .get(window.location.origin+"/service/api/herbal-center/get-selected-service/" + herbal_center_id, {
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
        .get(window.location.origin+"/service/api/herbal-center/get-selected-subservice/" + herbal_center_id, {
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