ambulance.controller('AmbulanceController', AmbulanceController);

function AmbulanceController($scope, $http) {

	 var ambulance_id = document.getElementsByName('ambulance_id')[0].value;
    console.log(ambulance_id);

    $http
        .get(window.location.origin+"/district/api/ambulance/get-selected-district/" + ambulance_id, {
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
        .get(window.location.origin+"/district/api/ambulance/get-selected-subdistrict/" + ambulance_id, {
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


        $scope.ambulance_phone_no = [];

        $scope.AppendPhone = function() {
            console.log("ok");
            $scope.ambulance_phone_no.push('');
        }

        $scope.RemovePhone = function(index) {
            $scope.ambulance_phone_no.splice(index, 1);
        }


        $scope.ambulance_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.ambulance_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.ambulance_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/ambulance/api/phone/" + ambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.ambulance_phone_no = response.data;
            $scope.ambulance_phone = $scope.ambulance_phone_no[0].ambulance_phone_no;
            $scope.ambulance_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/ambulance/api/email/" + ambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.ambulance_email_ad = response.data;
            $scope.ambulance_email = $scope.ambulance_email_ad[0].ambulance_email_ad;
            $scope.ambulance_email_ad.splice(0, 1);
        });




}