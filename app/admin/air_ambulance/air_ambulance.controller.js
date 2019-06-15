air_ambulance.controller('AirAmbulanceController', AirAmbulanceController);

function AirAmbulanceController($scope, $http) {

	 var air_ambulance_id = document.getElementsByName('air_ambulance_id')[0].value;
    console.log(air_ambulance_id);

    $http
        .get(window.location.origin+"/district/api/air-ambulance/get-selected-district/" + air_ambulance_id, {
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
        .get(window.location.origin+"/district/api/air-ambulance/get-selected-subdistrict/" + air_ambulance_id, {
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
                console.log("ok");
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


        $scope.air_ambulance_phone_no = [];

        $scope.AppendPhone = function() {
            console.log("ok");
            $scope.air_ambulance_phone_no.push('');
        }

        $scope.RemovePhone = function(index) {
            $scope.air_ambulance_phone_no.splice(index, 1);
        }


        $scope.air_ambulance_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.air_ambulance_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.air_ambulance_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/air-ambulance/api/phone/" + air_ambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.air_ambulance_phone_no = response.data;
            $scope.air_ambulance_phone = $scope.air_ambulance_phone_no[0].air_ambulance_phone_no;
            $scope.air_ambulance_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/air-ambulance/api/email/" + air_ambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.air_ambulance_email_ad = response.data;
            $scope.air_ambulance_email = $scope.air_ambulance_email_ad[0].air_ambulance_email_ad;
            $scope.air_ambulance_email_ad.splice(0, 1);
        });




}