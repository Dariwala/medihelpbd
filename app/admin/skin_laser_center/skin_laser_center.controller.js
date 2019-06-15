// blank controller
skin_laser_center.controller('SkinLaserCenterController', SkinLaserCenterController);

function SkinLaserCenterController($scope, $http) {


    var skin_laser_center_id = document.getElementsByName('skin_laser_center_id')[0].value;

    $http
        .get(window.location.origin+"/district/api/skin-laser-center/get-selected-district/" + skin_laser_center_id, {
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
        .get(window.location.origin+"/district/api/skin-laser-center/get-selected-subdistrict/" + skin_laser_center_id, {
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


        $scope.skin_laser_center_phone_no = [];

        $scope.AppendPhone = function() {
            $scope.skin_laser_center_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.skin_laser_center_phone_no.splice(index, 1);
        }


        $scope.skin_laser_center_email_ad = [];

        $scope.AppendEmail = function() {
            $scope.skin_laser_center_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.skin_laser_center_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/skin-laser-center/api/phone/" + skin_laser_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.skin_laser_center_phone_no = response.data;
            $scope.skin_laser_center_phone = $scope.skin_laser_center_phone_no[0].skin_laser_center_phone_no;
            $scope.skin_laser_center_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/skin-laser-center/api/email/" + skin_laser_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.skin_laser_center_email_ad = response.data;
            $scope.skin_laser_center_email = $scope.skin_laser_center_email_ad[0].skin_laser_center_email_ad;
            $scope.skin_laser_center_email_ad.splice(0, 1);
        });












        $http
        .get(window.location.origin+"/service/api/skin-laser-center/get-selected-service/" + skin_laser_center_id, {
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
        .get(window.location.origin+"/service/api/skin-laser-center/get-selected-subservice/" + skin_laser_center_id, {
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